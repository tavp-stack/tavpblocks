<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyButton - DaisyUI button component.
 * Uses semantic classes: btn, btn-primary, btn-secondary, etc.
 */
class DaisyButton extends DaisyComponent
{
    public function __construct(
        private string $label = 'Button',
        private string $variant = 'primary',
        private string $size = 'md',
        private string $href = '',
        private bool $disabled = false,
        private bool $outline = false,
        private bool $wide = false,
        private bool $block = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['btn'];

        $variantMap = [
            'primary' => 'btn-primary',
            'secondary' => 'btn-secondary',
            'accent' => 'btn-accent',
            'info' => 'btn-info',
            'success' => 'btn-success',
            'warning' => 'btn-warning',
            'error' => 'btn-error',
            'ghost' => 'btn-ghost',
            'link' => 'btn-link',
            'default' => '',
        ];

        $sizeMap = [
            'xs' => 'btn-xs',
            'sm' => 'btn-sm',
            'md' => '',
            'lg' => 'btn-lg',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classes[] = self::sizeClass($this->size, $sizeMap);

        if ($this->outline) {
            $classes[] = 'btn-outline';
        }
        if ($this->wide) {
            $classes[] = 'btn-wide';
        }
        if ($this->block) {
            $classes[] = 'btn-block';
        }
        if ($this->disabled) {
            $classes[] = 'btn-disabled';
        }

        $classStr = implode(' ', array_filter($classes));
        $disabledAttr = $this->disabled ? ' disabled' : '';

        if ($this->href !== '' && !$this->disabled) {
            return '<a href="' . htmlspecialchars($this->href) . '" class="' . $classStr . '">' . htmlspecialchars($this->label) . '</a>';
        }

        return '<button class="' . $classStr . '"' . $disabledAttr . '>' . htmlspecialchars($this->label) . '</button>';
    }
}
