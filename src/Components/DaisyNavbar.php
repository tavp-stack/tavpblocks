<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyNavbar - DaisyUI navbar component.
 * Uses semantic classes: navbar, navbar-start, navbar-center, navbar-end, etc.
 */
class DaisyNavbar extends DaisyComponent
{
    private array $startItems = [];
    private array $centerItems = [];
    private array $endItems = [];

    public function __construct(
        private string $title = '',
        private string $href = '/',
        private string $variant = 'default',
    ) {
    }

    public function addStartItem(string $html): self
    {
        $this->startItems[] = $html;
        return $this;
    }

    public function addCenterItem(string $html): self
    {
        $this->centerItems[] = $html;
        return $this;
    }

    public function addEndItem(string $html): self
    {
        $this->endItems[] = $html;
        return $this;
    }

    public function render(): string
    {
        $classes = ['navbar'];

        $variantMap = [
            'primary' => 'bg-primary text-primary-content',
            'secondary' => 'bg-secondary text-secondary-content',
            'accent' => 'bg-accent text-accent-content',
            'neutral' => 'bg-neutral text-neutral-content',
            'default' => 'bg-base-100',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="' . $classStr . ' shadow-xl">';

        // Start section
        $html .= '<div class="navbar-start">';
        if ($this->title !== '') {
            $html .= '<a class="btn btn-ghost text-xl" href="' . htmlspecialchars($this->href) . '">' . htmlspecialchars($this->title) . '</a>';
        }
        foreach ($this->startItems as $item) {
            $html .= $item;
        }
        $html .= '</div>';

        // Center section
        if (!empty($this->centerItems)) {
            $html .= '<div class="navbar-center hidden lg:flex">';
            foreach ($this->centerItems as $item) {
                $html .= $item;
            }
            $html .= '</div>';
        }

        // End section
        $html .= '<div class="navbar-end">';
        foreach ($this->endItems as $item) {
            $html .= $item;
        }
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }
}
