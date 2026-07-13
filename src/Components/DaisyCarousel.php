<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyCarousel - DaisyUI carousel component.
 * Uses semantic classes: carousel, carousel-item, etc.
 */
class DaisyCarousel extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $width = 'w-full',
        private bool $vertical = false,
    ) {
    }

    public function addItem(string $content): self
    {
        $this->items[] = $content;
        return $this;
    }

    public function render(): string
    {
        $classes = ['carousel'];

        if ($this->vertical) {
            $classes[] = 'carousel-vertical';
        }

        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="' . $classStr . ' ' . $this->width . '">';

        foreach ($this->items as $index => $item) {
            $html .= '<div id="slide' . ($index + 1) . '" class="carousel-item relative ' . $this->width . '">';
            $html .= $item;

            $html .= '<div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">';
            $html .= '<a href="#slide' . ($index === 0 ? count($this->items) : $index) . '" class="btn btn-circle">?</a>';
            $html .= '<a href="#slide' . ($index === count($this->items) - 1 ? 1 : $index + 2) . '" class="btn btn-circle">?</a>';
            $html .= '</div>';

            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
