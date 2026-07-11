<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Datatable extends Component
{
    /** @var array<int, array{field: string, label: string}> */
    private array $columns = [];

    /** @var array<int, array<string, mixed>> */
    private array $rows = [];

    public function __construct(
        private bool $searchable = true,
        private bool $pagination = true,
    ) {
    }

    public function addColumn(string $field, string $label): self
    {
        $this->columns[] = ['field' => $field, 'label' => $label];
        return $this;
    }

    public function addRow(array $row): self
    {
        $this->rows[] = $row;
        return $this;
    }

    public function render(): string
    {
        $html = '<div class="bg-white border border-gray-200 rounded-lg overflow-hidden">';

        if ($this->searchable) {
            $html .= '<div class="px-4 py-3 border-b border-gray-200">';
            $html .= '<input type="text" placeholder="Search..." class="w-full rounded-md border-gray-300 text-sm">';
            $html .= '</div>';
        }

        $html .= '<table class="min-w-full divide-y divide-gray-200">';
        $html .= '<thead class="bg-gray-50"><tr>';

        foreach ($this->columns as $col) {
            $html .= '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">' . htmlspecialchars($col['label']) . '</th>';
        }

        $html .= '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>';
        $html .= '</tr></thead><tbody class="divide-y divide-gray-200">';

        foreach ($this->rows as $row) {
            $html .= '<tr class="hover:bg-gray-50">';
            foreach ($this->columns as $col) {
                $value = $row[$col['field']] ?? '';
                $html .= '<td class="px-6 py-4 text-sm text-gray-900">' . htmlspecialchars((string) $value) . '</td>';
            }
            $html .= '<td class="px-6 py-4 text-sm"><a href="#" class="text-blue-600 hover:underline">Edit</a></td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
        $html .= '</div>';

        return $html;
    }
}
