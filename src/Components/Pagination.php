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
        $html .= '<div class="text-sm text-gray-500 dark:text-gray-400">Page ' . $this->currentPage . ' of ' . $this->totalPages . '</div>';
        $html .= '<div class="flex gap-1">';

        if ($this->currentPage > 1) {
            $html .= $this->link($this->baseUrl . '?page=' . ($this->currentPage - 1), 'Prev');
        }

        for ($i = 1; $i <= $this->totalPages; $i++) {
            if ($i === $this->currentPage) {
                $html .= '<span class="rounded-lg bg-brand-600 px-3 py-1 text-sm text-white">' . $i . '</span>';
            } else {
                $html .= $this->link($this->baseUrl . '?page=' . $i, (string) $i);
            }
        }

        if ($this->currentPage < $this->totalPages) {
            $html .= $this->link($this->baseUrl . '?page=' . ($this->currentPage + 1), 'Next');
        }

        $html .= '</div></nav>';

        return $html;
    }

    private function link(string $url, string $label): string
    {
        return '<a href="' . $url . '" class="rounded-lg border border-gray-300 px-3 py-1 text-sm text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">' . $label . '</a>';
    }
}
