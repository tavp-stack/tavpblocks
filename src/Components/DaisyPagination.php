<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyPagination - DaisyUI pagination component.
 * Uses semantic classes: join, btn, etc.
 */
class DaisyPagination extends DaisyComponent
{
    public function __construct(
        private int $currentPage = 1,
        private int $totalPages = 1,
        private string $baseUrl = '',
        private string $size = 'md',
    ) {
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'btn-xs',
            'sm' => 'btn-sm',
            'md' => '',
            'lg' => 'btn-lg',
        ];

        $sizeClass = $sizeMap[$this->size] ?? '';

        $html = '<div class="join">';

        // Previous button
        $prevDisabled = $this->currentPage <= 1 ? ' btn-disabled' : '';
        $prevUrl = $this->currentPage > 1 ? $this->baseUrl . '?page=' . ($this->currentPage - 1) : '#';
        $html .= '<a href="' . $prevUrl . '" class="join-item btn ' . $sizeClass . $prevDisabled . '">«</a>';

        // Page numbers
        $start = max(1, $this->currentPage - 2);
        $end = min($this->totalPages, $this->currentPage + 2);

        if ($start > 1) {
            $html .= '<a href="' . $this->baseUrl . '?page=1" class="join-item btn ' . $sizeClass . '">1</a>';
            if ($start > 2) {
                $html .= '<button class="join-item btn btn-disabled ' . $sizeClass . '">...</button>';
            }
        }

        for ($i = $start; $i <= $end; $i++) {
            $activeClass = $i === $this->currentPage ? ' btn-active' : '';
            $html .= '<a href="' . $this->baseUrl . '?page=' . $i . '" class="join-item btn ' . $sizeClass . $activeClass . '">' . $i . '</a>';
        }

        if ($end < $this->totalPages) {
            if ($end < $this->totalPages - 1) {
                $html .= '<button class="join-item btn btn-disabled ' . $sizeClass . '">...</button>';
            }
            $html .= '<a href="' . $this->baseUrl . '?page=' . $this->totalPages . '" class="join-item btn ' . $sizeClass . '">' . $this->totalPages . '</a>';
        }

        // Next button
        $nextDisabled = $this->currentPage >= $this->totalPages ? ' btn-disabled' : '';
        $nextUrl = $this->currentPage < $this->totalPages ? $this->baseUrl . '?page=' . ($this->currentPage + 1) : '#';
        $html .= '<a href="' . $nextUrl . '" class="join-item btn ' . $sizeClass . $nextDisabled . '">»</a>';

        $html .= '</div>';

        return $html;
    }
}
