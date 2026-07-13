<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Button extends Component
{
    public function __construct(
        private string $label = 'Button',
        private string $variant = 'primary',
        private string $size = 'md',
        private string $href = '',
        private bool $disabled = false,
    ) {
    }

    public function render(): string
    {
        $classes = match ($this->variant) {
            'primary' => 'bg-brand-600 text-white hover:bg-brand-700',
            'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600',
            'danger' => 'bg-red-600 text-white hover:bg-red-700',
            'ghost' => 'bg-transparent text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800',
            default => 'bg-brand-600 text-white hover:bg-brand-700',
        };

        $sizeClass = match ($this->size) {
            'sm' => 'px-3 py-1.5 text-sm',
            'lg' => 'px-6 py-3 text-lg',
            default => 'px-4 py-2 text-sm',
        };

        $disabled = $this->disabled ? ' disabled' : '';
        $tag = $this->href !== '' ? 'a' : 'button';
        $href = $this->href !== '' ? " href=\"{$this->href}\"" : '';

        return "<{$tag} class=\"rounded-lg {$classes} {$sizeClass} font-medium transition-colors\"{$href}{$disabled}>" . htmlspecialchars($this->label) . "</{$tag}>";
    }
}
