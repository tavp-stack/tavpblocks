<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Card extends Component
{
    public function __construct(
        private string $title = '',
        private string $body = '',
        private string $footer = '',
        private bool $bordered = true,
    ) {
    }

    public function render(): string
    {
        $border = $this->bordered ? 'border border-gray-200' : '';
        $html = "<div class=\"rounded-lg bg-white shadow-sm {$border} overflow-hidden\">";

        if ($this->title !== '') {
            $html .= '<div class="px-6 py-4 border-b border-gray-200">';
            $html .= '<h3 class="text-lg font-semibold">' . htmlspecialchars($this->title) . '</h3>';
            $html .= '</div>';
        }

        $html .= '<div class="px-6 py-4">' . $this->body . '</div>';

        if ($this->footer !== '') {
            $html .= '<div class="px-6 py-4 border-t border-gray-200 bg-gray-50">' . $this->footer . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
