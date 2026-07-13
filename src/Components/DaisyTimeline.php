<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyTimeline - DaisyUI timeline component.
 * Uses semantic classes: timeline, timeline-box, etc.
 */
class DaisyTimeline extends DaisyComponent
{
    private array $items = [];

    public function __construct(
        private string $direction = 'vertical',
    ) {
    }

    public function addItem(string $title, string $content, string $time = '', string $icon = ''): self
    {
        $this->items[] = [
            'title' => $title,
            'content' => $content,
            'time' => $time,
            'icon' => $icon,
        ];
        return $this;
    }

    public function render(): string
    {
        $html = '<ul class="timeline">';

        foreach ($this->items as $item) {
            $html .= '<li>';

            if ($item['icon'] !== '') {
                $html .= '<div class="timeline-start">' . $item['icon'] . '</div>';
            }

            $html .= '<div class="timeline-middle">';
            $html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>';
            $html .= '</div>';

            $html .= '<div class="timeline-end timeline-box">';
            $html .= '<div class="text-lg font-bold">' . htmlspecialchars($item['title']) . '</div>';
            $html .= '<div>' . htmlspecialchars($item['content']) . '</div>';
            if ($item['time'] !== '') {
                $html .= '<div class="text-sm opacity-50">' . htmlspecialchars($item['time']) . '</div>';
            }
            $html .= '</div>';

            $html .= '<hr />';
        }

        $html .= '</ul>';

        return $html;
    }
}
