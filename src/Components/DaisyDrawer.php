<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyDrawer - DaisyUI drawer component.
 * Uses semantic classes: drawer, drawer-content, drawer-side, etc.
 */
class DaisyDrawer extends DaisyComponent
{
    public function __construct(
        private string $id = '',
        private string $content = '',
        private string $sideContent = '',
        private bool $open = false,
        private bool $end = false,
    ) {
        if ($this->id === '') {
            $this->id = 'drawer_' . uniqid();
        }
    }

    public function render(): string
    {
        $openClass = $this->open ? ' drawer-open' : '';
        $endClass = $this->end ? ' drawer-end' : '';

        $html = '<div class="drawer' . $openClass . $endClass . '">';
        $html .= '<input id="' . $this->id . '" type="checkbox" class="drawer-toggle"' . ($this->open ? ' checked' : '') . ' />';
        $html .= '<div class="drawer-content">' . $this->content . '</div>';
        $html .= '<div class="drawer-side">';
        $html .= '<label for="' . $this->id . '" aria-label="close sidebar" class="drawer-overlay"></label>';
        $html .= $this->sideContent;
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    public function getToggle(): string
    {
        return '<label for="' . $this->id . '" class="btn btn-square btn-ghost"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></label>';
    }
}
