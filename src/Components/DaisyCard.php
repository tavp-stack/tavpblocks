<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyCard - DaisyUI card component.
 * Uses semantic classes: card, card-body, card-title, etc.
 */
class DaisyCard extends DaisyComponent
{
    public function __construct(
        private string $title = '',
        private string $body = '',
        private string $footer = '',
        private string $image = '',
        private string $imageAlt = '',
        private bool $bordered = false,
        private bool $compact = false,
        private string $side = '',
    ) {
    }

    public function render(): string
    {
        $classes = ['card'];

        if ($this->bordered) {
            $classes[] = 'card-bordered';
        }
        if ($this->compact) {
            $classes[] = 'card-compact';
        }
        if ($this->side === 'right') {
            $classes[] = 'card-side';
        }

        $classStr = implode(' ', array_filter($classes));

        $html = '<div class="' . $classStr . ' bg-base-100 shadow-xl">';

        if ($this->image !== '') {
            $html .= '<figure><img src="' . htmlspecialchars($this->image) . '" alt="' . htmlspecialchars($this->imageAlt) . '" /></figure>';
        }

        $html .= '<div class="card-body">';

        if ($this->title !== '') {
            $html .= '<h2 class="card-title">' . htmlspecialchars($this->title) . '</h2>';
        }

        if ($this->body !== '') {
            $html .= '<p>' . htmlspecialchars($this->body) . '</p>';
        }

        if ($this->footer !== '') {
            $html .= '<div class="card-actions justify-end">' . $this->footer . '</div>';
        }

        $html .= '</div></div>';

        return $html;
    }
}
