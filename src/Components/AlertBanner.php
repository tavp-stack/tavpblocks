<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class AlertBanner extends Component
{
    public function __construct(
        private string $message = '',
        private string $type = 'info',
        private bool $dismissible = true,
    ) {
    }

    public function render(): string
    {
        $colors = match ($this->type) {
            'success' => 'bg-green-900/50 border-green-700 text-green-200',
            'error' => 'bg-red-900/50 border-red-700 text-red-200',
            'warning' => 'bg-yellow-900/50 border-yellow-700 text-yellow-200',
            default => 'bg-blue-900/50 border-blue-700 text-blue-200',
        };

        $dismiss = $this->dismissible
            ? '<button onclick="this.parentElement.remove()" class="ml-4 text-current opacity-50 hover:opacity-100">&times;</button>'
            : '';

        return '<div class="flex items-center justify-between px-4 py-3 rounded-lg border ' . $colors . '">' .
            '<span>' . htmlspecialchars($this->message) . '</span>' . $dismiss . '</div>';
    }
}
