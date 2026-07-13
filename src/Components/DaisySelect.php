<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisySelect - DaisyUI select component.
 * Uses semantic classes: select, select-bordered, etc.
 */
class DaisySelect extends DaisyComponent
{
    private array $options = [];

    public function __construct(
        private string $name = '',
        private string $label = '',
        private string $placeholder = 'Select an option',
        private string $value = '',
        private string $size = 'md',
        private string $variant = 'default',
        private bool $disabled = false,
        private bool $bordered = true,
    ) {
    }

    public function addOption(string $value, string $label): self
    {
        $this->options[] = [
            'value' => $value,
            'label' => $label,
        ];
        return $this;
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function render(): string
    {
        $classes = ['select'];

        $sizeMap = [
            'xs' => 'select-xs',
            'sm' => 'select-sm',
            'md' => '',
            'lg' => 'select-lg',
        ];

        $variantMap = [
            'primary' => 'select-primary',
            'secondary' => 'select-secondary',
            'accent' => 'select-accent',
            'info' => 'select-info',
            'success' => 'select-success',
            'warning' => 'select-warning',
            'error' => 'select-error',
            'ghost' => 'select-ghost',
            'default' => '',
        ];

        $classes[] = self::sizeClass($this->size, $sizeMap);
        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->bordered) {
            $classes[] = 'select-bordered';
        }
        if ($this->disabled) {
            $classes[] = 'select-disabled';
        }

        $classStr = implode(' ', array_filter($classes));
        $disabledAttr = $this->disabled ? ' disabled' : '';

        $html = '';

        if ($this->label !== '') {
            $html .= '<label class="label"><span class="label-text">' . htmlspecialchars($this->label) . '</span></label>';
        }

        $html .= '<select name="' . htmlspecialchars($this->name) . '" class="' . $classStr . '"' . $disabledAttr . '>';

        if ($this->placeholder !== '') {
            $html .= '<option disabled' . ($this->value === '' ? ' selected' : '') . '>' . htmlspecialchars($this->placeholder) . '</option>';
        }

        foreach ($this->options as $option) {
            $selected = $option['value'] === $this->value ? ' selected' : '';
            $html .= '<option value="' . htmlspecialchars($option['value']) . '"' . $selected . '>' . htmlspecialchars($option['label']) . '</option>';
        }

        $html .= '</select>';

        return $html;
    }
}
