<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyFooter - DaisyUI footer component.
 * Uses semantic classes: footer, footer-title, etc.
 */
class DaisyFooter extends DaisyComponent
{
    private array $sections = [];

    public function __construct(
        private string $variant = 'default',
    ) {
    }

    public function addSection(string $title, array $links): self
    {
        $this->sections[] = [
            'title' => $title,
            'links' => $links,
        ];
        return $this;
    }

    public function render(): string
    {
        $classes = ['footer'];

        $variantMap = [
            'center' => 'footer-center',
            'default' => '',
        ];

        $classes[] = self::variantClass($this->variant, $variantMap);
        $classStr = implode(' ', array_filter($classes));

        $html = '<footer class="' . $classStr . ' p-10 bg-base-200 text-base-content">';

        foreach ($this->sections as $section) {
            $html .= '<nav>';
            $html .= '<h6 class="footer-title">' . htmlspecialchars($section['title']) . '</h6>';

            foreach ($section['links'] as $link) {
                if (is_array($link)) {
                    $html .= '<a href="' . htmlspecialchars($link['href'] ?? '#') . '" class="link link-hover">' . htmlspecialchars($link['label'] ?? '') . '</a>';
                } else {
                    $html .= '<a class="link link-hover">' . htmlspecialchars($link) . '</a>';
                }
            }

            $html .= '</nav>';
        }

        $html .= '</footer>';

        return $html;
    }
}
