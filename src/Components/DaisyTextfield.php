<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyTextfield - DaisyUI text input component.
 * Uses semantic classes: input, input-bordered, etc.
 */
class DaisyTextfield extends DaisyComponent
{
    public function __construct(
        private string $name = '',
        private string $label = '',
        private string $placeholder = '',
        private string $value = '',
        private string $type = 'text',
        private string $size = 'md',
        private string $variant = 'default',
        private bool $disabled = false,
        private bool $bordered = true,
        private string $helperText = '',
        private string $errorText = '',
    ) {
    }

    public function render(): string
    {
        $classes = ['input'];

        $sizeMap = [
            'xs' => 'input-xs',
            'sm' => 'input-sm',
            'md' => '',
            'lg' => 'input-lg',
        ];

        $variantMap = [
            'primary' => 'input-primary',
            'secondary' => 'input-secondary',
            'accent' => 'input-accent',
            'info' => 'input-info',
            'success' => 'input-success',
            'warning' => 'input-warning',
            'error' => 'input-error',
            'ghost' => 'input-ghost',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->bordered) {
            $classes[] = 'input-bordered';
        }
        if ($this->disabled) {
            $classes[] = 'input-disabled';
        }
        if ($this->errorText !== '') {
            $classes[] = 'input-error';
        }

        $classStr = implode(' ', array_filter($classes));
        $disabledAttr = $this->disabled ? ' disabled' : '';

        $html = '';

        if ($this->label !== '') {
            $html .= '<label class="form-control w-full">';
            $html .= '<div class="label"><span class="label-text">' . htmlspecialchars($this->label) . '</span></div>';
        }

        $html .= '<input type="' . htmlspecialchars($this->type) . '" name="' . htmlspecialchars($this->name) . '" placeholder="' . htmlspecialchars($this->placeholder) . '" value="' . htmlspecialchars($this->value) . '" class="' . $classStr . '"' . $disabledAttr . ' />';

        if ($this->helperText !== '') {
            $html .= '<div class="label"><span class="label-text-alt">' . htmlspecialchars($this->helperText) . '</span></div>';
        }

        if ($this->errorText !== '') {
            $html .= '<div class="label"><span class="label-text-alt text-error">' . htmlspecialchars($this->errorText) . '</span></div>';
        }

        if ($this->label !== '') {
            $html .= '</label>';
        }

        return $html;
    }
}
