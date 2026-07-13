<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyHero - DaisyUI hero component.
 * Uses semantic classes: hero, hero-content, etc.
 */
class DaisyHero extends DaisyComponent
{
    public function __construct(
        private string $title = '',
        private string $subtitle = '',
        private string $content = '',
        private string $actions = '',
        private string $overlay = '',
        private string $minHeight = 'min-h-screen',
    ) {
    }

    public function render(): string
    {
        $html = '<div class="hero ' . $this->minHeight . '">';

        if ($this->overlay !== '') {
            $html .= '<div class="hero-overlay">' . $this->overlay . '</div>';
        }

        $html .= '<div class="hero-content text-center">';
        $html .= '<div class="max-w-md">';

        if ($this->title !== '') {
            $html .= '<h1 class="text-5xl font-bold">' . htmlspecialchars($this->title) . '</h1>';
        }

        if ($this->subtitle !== '') {
            $html .= '<p class="py-6">' . htmlspecialchars($this->subtitle) . '</p>';
        }

        if ($this->content !== '') {
            $html .= $this->content;
        }

        if ($this->actions !== '') {
            $html .= '<div class="flex gap-4 justify-center">' . $this->actions . '</div>';
        }

        $html .= '</div></div></div>';

        return $html;
    }
}
