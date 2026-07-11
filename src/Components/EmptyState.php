<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class EmptyState extends Component
{
    public function __construct(
        private string $title = 'No data',
        private string $description = '',
        private string $actionLabel = '',
        private string $actionUrl = '',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="text-center py-12">';
        $html .= '<svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>';
        $html .= '<h3 class="mt-2 text-sm font-medium text-gray-900">' . htmlspecialchars($this->title) . '</h3>';

        if ($this->description !== '') {
            $html .= '<p class="mt-1 text-sm text-gray-500">' . htmlspecialchars($this->description) . '</p>';
        }

        if ($this->actionLabel !== '' && $this->actionUrl !== '') {
            $html .= '<div class="mt-6">';
            $html .= '<a href="' . htmlspecialchars($this->actionUrl) . '" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">' . htmlspecialchars($this->actionLabel) . '</a>';
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
