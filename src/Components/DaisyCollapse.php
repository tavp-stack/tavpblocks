<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyCollapse - DaisyUI collapse component.
 * Uses semantic classes: collapse, collapse-arrow, etc.
 */
class DaisyCollapse extends DaisyComponent
{
    public function __construct(
        private string $title = '',
        private string $content = '',
        private string $icon = '',
        private bool $open = false,
        private bool $arrow = false,
        private bool $plus = false,
    ) {
    }

    public function render(): string
    {
        $classes = ['collapse'];

        if ($this->arrow) {
            $classes[] = 'collapse-arrow';
        }
        if ($this->plus) {
            $classes[] = 'collapse-plus';
        }

        $openClass = $this->open ? ' collapse-open' : '';
        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="' . $classStr . $openClass . '">';
        $html .= '<input type="checkbox"' . ($this->open ? ' checked' : '') . ' />';
        $html .= '<div class="collapse-title text-xl font-medium">';

        if ($this->icon !== '') {
            $html .= $this->icon . ' ';
        }

        $html .= htmlspecialchars($this->title);
        $html .= '</div>';
        $html .= '<div class="collapse-content"><p>' . $this->content . '</p></div>';
        $html .= '</div>';

        return $html;
    }
}
