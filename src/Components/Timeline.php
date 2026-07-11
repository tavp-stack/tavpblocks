<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Timeline extends Component
{
    /** @var array<int, array{title: string, description: string, time: string, color: string}> */
    private array $events = [];

    public function addEvent(string $title, string $description, string $time = '', string $color = 'blue'): self
    {
        $this->events[] = ['title' => $title, 'description' => $description, 'time' => $time, 'color' => $color];
        return $this;
    }

    public function render(): string
    {
        $html = '<div class="flow-root">';
        $html .= '<ul class="-mb-8">';

        foreach ($this->events as $i => $event) {
            $isLast = $i === count($this->events) - 1;
            $colorClass = match ($event['color']) {
                'green' => 'bg-green-400',
                'red' => 'bg-red-400',
                default => 'bg-blue-400',
            };

            $html .= '<li' . ($isLast ? '' : ' class="pb-8"') . '>';
            $html .= '<div class="relative flex items-start">';
            $html .= '<div class="absolute top-2 left-0 flex items-center justify-center">';
            $html .= '<div class="h-3 w-3 rounded-full ' . $colorClass . ' ring-4 ring-white"></div>';
            $html .= '</div>';
            $html .= '<div class="ml-4">';
            $html .= '<h4 class="text-sm font-medium text-gray-900">' . htmlspecialchars($event['title']) . '</h4>';
            $html .= '<p class="mt-0.5 text-sm text-gray-500">' . htmlspecialchars($event['description']) . '</p>';
            if ($event['time'] !== '') {
                $html .= '<div class="mt-1 text-xs text-gray-400">' . htmlspecialchars($event['time']) . '</div>';
            }
            $html .= '</div></div></li>';
        }

        $html .= '</ul></div>';

        return $html;
    }
}
