<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyTable - DaisyUI table component.
 * Uses semantic classes: table, table-zebra, table-pin-rows, etc.
 */
class DaisyTable extends DaisyComponent
{
    private array $columns = [];
    private array $rows = [];

    public function __construct(
        private string $size = 'md',
        private bool $zebra = false,
        private bool $pinRows = false,
        private bool $pinCols = false,
    ) {
    }

    public function addColumn(string $key, string $label, string $align = 'left'): self
    {
        $this->columns[] = [
            'key' => $key,
            'label' => $label,
            'align' => $align,
        ];
        return $this;
    }

    public function addRow(array $data): self
    {
        $this->rows[] = $data;
        return $this;
    }

    public function setRows(array $rows): self
    {
        $this->rows = $rows;
        return $this;
    }

    public function render(): string
    {
        $classes = ['table'];

        $sizeMap = [
            'xs' => 'table-xs',
            'sm' => 'table-sm',
            'md' => '',
            'lg' => 'table-lg',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);

        if ($this->zebra) {
            $classes[] = 'table-zebra';
        }
        if ($this->pinRows) {
            $classes[] = 'table-pin-rows';
        }
        if ($this->pinCols) {
            $classes[] = 'table-pin-cols';
        }

        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="overflow-x-auto">';
        $html .= '<table class="' . $classStr . '">';

        // Header
        $html .= '<thead><tr>';
        foreach ($this->columns as $column) {
            $align = match($column['align']) {
                'center' => 'text-center',
                'right' => 'text-right',
                default => '',
            };
            $html .= '<th class="' . $align . '">' . htmlspecialchars($column['label']) . '</th>';
        }
        $html .= '</tr></thead>';

        // Body
        $html .= '<tbody>';
        foreach ($this->rows as $row) {
            $html .= '<tr>';
            foreach ($this->columns as $column) {
                $value = $row[$column['key']] ?? '';
                $html .= '<td>' . $value . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';

        $html .= '</table>';
        $html .= '</div>';

        return $html;
    }
}
