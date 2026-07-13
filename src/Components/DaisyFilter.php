<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyFilter - DaisyUI filter component.
 * Uses semantic classes: filter, etc.
 */
class DaisyFilter extends DaisyComponent
{
    private array $options = [];

    public function __construct(
        private string $name = '',
        private string $defaultValue = '',
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

    public function render(): string
    {
        $html = '<div class="filter">';

        foreach ($this->options as $option) {
            $checked = $option['value'] === $this->defaultValue ? ' checked' : '';
            $html .= '<input class="btn filter-reset" type="radio" name="' . htmlspecialchars($this->name) . '" value="' . htmlspecialchars($option['value']) . '" aria-label="' . htmlspecialchars($option['label']) . '"' . $checked . ' />';
        }

        $html .= '</div>';

        return $html;
    }
}
