<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyTextarea - DaisyUI textarea component.
 * Uses semantic classes: textarea, textarea-bordered, etc.
 */
class DaisyTextarea extends DaisyComponent
{
    public function __construct(
        private string $name = '',
        private string $label = '',
        private string $placeholder = '',
        private string $value = '',
        private string $size = 'md',
        private string $variant = 'default',
        private bool $disabled = false,
        private bool $bordered = true,
        private int $rows = 4,
    ) {
    }

    public function render(): string
    {
        $classes = ['textarea'];

        $sizeMap = [
            'xs' => 'textarea-xs',
            'sm' => 'textarea-sm',
            'md' => '',
            'lg' => 'textarea-lg',
        ];

        $variantMap = [
            'primary' => 'textarea-primary',
            'secondary' => 'textarea-secondary',
            'accent' => 'textarea-accent',
            'info' => 'textarea-info',
            'success' => 'textarea-success',
            'warning' => 'textarea-warning',
            'error' => 'textarea-error',
            'ghost' => 'textarea-ghost',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->bordered) {
            $classes[] = 'textarea-bordered';
        }
        if ($this->disabled) {
            $classes[] = 'textarea-disabled';
        }

        $classStr = implode(' ', array_filter($classes));
        $disabledAttr = $this->disabled ? ' disabled' : '';

        $html = '';

        if ($this->label !== '') {
            $html .= '<label class="form-control">';
            $html .= '<div class="label"><span class="label-text">' . htmlspecialchars($this->label) . '</span></div>';
        }

        $html .= '<textarea name="' . htmlspecialchars($this->name) . '" placeholder="' . htmlspecialchars($this->placeholder) . '" class="' . $classStr . '" rows="' . $this->rows . '"' . $disabledAttr . '>' . htmlspecialchars($this->value) . '</textarea>';

        if ($this->label !== '') {
            $html .= '</label>';
        }

        return $html;
    }
}
