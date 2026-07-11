<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Pagination extends Component
{
    public function __construct(
        private int $currentPage = 1,
        private int $totalPages = 1,
        private string $baseUrl = '/',
    ) {
    }

    public function render(): string
    {
        if ($this->totalPages <= 1) {
            return '';
        }

        $html = '<nav class="flex items-center justify-between">';
        $html .= '<div class="text-sm text-gray-500">Page ' . $this->currentPage . ' of ' . $this->totalPages . '</div>';
        $html .= '<div class="flex gap-1">';

        // Previous
        if ($this->currentPage > 1) {
            $html .= '<a href="' . $this->baseUrl . '?page=' . ($this->currentPage - 1) . '" class="px-3 py-1 text-sm border rounded hover:bg-gray-50">Prev</a>';
        }

        // Page numbers
        for ($i = 1; $i <= $this->totalPages; $i++) {
            if ($i === $this->currentPage) {
                $html .= '<span class="px-3 py-1 text-sm bg-blue-600 text-white rounded">' . $i . '</span>';
            } else {
                $html .= '<a href="' . $this->baseUrl . '?page=' . $i . '" class="px-3 py-1 text-sm border rounded hover:bg-gray-50">' . $i . '</a>';
            }
        }

        // Next
        if ($this->currentPage < $this->totalPages) {
            $html .= '<a href="' . $this->baseUrl . '?page=' . ($this->currentPage + 1) . '" class="px-3 py-1 text-sm border rounded hover:bg-gray-50">Next</a>';
        }

        $html .= '</div></nav>';

        return $html;
    }
}
