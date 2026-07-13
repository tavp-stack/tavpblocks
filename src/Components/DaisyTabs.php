<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyTabs - DaisyUI tabs component.
 * Uses semantic classes: tabs, tab, tab-active, etc.
 */
class DaisyTabs extends DaisyComponent
{
    private array $tabs = [];

    public function __construct(
        private string $variant = 'default',
        private string $size = 'md',
        private bool $boxed = false,
        private bool $lifted = false,
    ) {
    }

    public function addTab(string $id, string $label, bool $active = false, string $content = ''): self
    {
        $this->tabs[] = [
            'id' => $id,
            'label' => $label,
            'active' => $active,
            'content' => $content,
        ];
        return $this;
    }

    public function render(): string
    {
        $classes = ['tabs'];

        $variantMap = [
            'bordered' => 'tabs-bordered',
            'lifted' => 'tabs-lifted',
            'boxed' => 'tabs-boxed',
            'default' => '',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);

        if ($this->boxed) {
            $classes[] = 'tabs-boxed';
        }
        if ($this->lifted) {
            $classes[] = 'tabs-lifted';
        }

        $classStr = implode(' ', array_filter($classes));

        $html = '<div role="tablist" class="' . $classStr . '">';

        foreach ($this->tabs as $tab) {
            $activeClass = $tab['active'] ? ' tab-active' : '';
            $html .= '<a role="tab" class="tab' . $activeClass . '" href="#' . $tab['id'] . '">' . htmlspecialchars($tab['label']) . '</a>';
        }

        $html .= '</div>';

        foreach ($this->tabs as $tab) {
            $html .= '<div id="' . $tab['id'] . '" class="hidden p-4">';
            $html .= $tab['content'];
            $html .= '</div>';
        }

        return $html;
    }
}
