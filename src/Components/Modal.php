<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Modal extends Component
{
    public function __construct(
        private string $id = 'modal',
        private string $title = '',
        private string $body = '',
        private string $confirmLabel = 'Confirm',
        private string $cancelLabel = 'Cancel',
    ) {
    }

    public function render(): string
    {
        $html = '<div id="' . $this->id . '" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-modal="true">';
        $html .= '<div class="flex min-h-screen items-center justify-center p-4">';
        $html .= '<div class="fixed inset-0 bg-black/50" onclick="document.getElementById(\'' . $this->id . '\').classList.add(\'hidden\')"></div>';
        $html .= '<div class="relative w-full max-w-md rounded-lg bg-white shadow-xl">';
        $html .= '<div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">';
        $html .= '<h3 class="text-lg font-semibold">' . htmlspecialchars($this->title) . '</h3>';
        $html .= '<button onclick="document.getElementById(\'' . $this->id . '\').classList.add(\'hidden\')" class="text-gray-400 hover:text-gray-600">&times;</button>';
        $html .= '</div>';
        $html .= '<div class="px-6 py-4">' . $this->body . '</div>';
        $html .= '<div class="flex justify-end gap-3 border-t border-gray-200 px-6 py-4">';
        $html .= '<button onclick="document.getElementById(\'' . $this->id . '\').classList.add(\'hidden\')" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium hover:bg-gray-50">' . htmlspecialchars($this->cancelLabel) . '</button>';
        $html .= '<button class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">' . htmlspecialchars($this->confirmLabel) . '</button>';
        $html .= '</div></div></div></div>';

        return $html;
    }
}
