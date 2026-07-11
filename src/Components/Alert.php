<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Alert extends Component
{
    public function __construct(
        private string $message = '',
        private string $type = 'info',
    ) {
    }

    public function render(): string
    {
        $classes = match ($this->type) {
            'success' => 'bg-green-50 border-green-200 text-green-800',
            'error' => 'bg-red-50 border-red-200 text-red-800',
            'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
            default => 'bg-blue-50 border-blue-200 text-blue-800',
        };

        return "<div class=\"rounded-lg border p-4 {$classes}\">" . htmlspecialchars($this->message) . "</div>";
    }
}
