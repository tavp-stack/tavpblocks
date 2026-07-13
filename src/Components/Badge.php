<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Badge extends Component
{
    public function __construct(
        private string $label = '',
        private string $color = 'gray',
        private string $variant = 'soft',
        private string $theme = 'auto',
    ) {
    }

    public function render(): string
    {
        $forceDark = $this->theme === 'dark';
        $forceLight = $this->theme === 'light';

        $classes = match ($this->variant) {
            'solid' => $this->solid($forceDark, $forceLight),
            'outline' => $this->outline($forceDark, $forceLight),
            default => $this->soft($forceDark, $forceLight),
        };

        return '<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium ' . $classes . '">' . htmlspecialchars($this->label) . '</span>';
    }

    private function soft(bool $forceDark, bool $forceLight): string
    {
        $map = [
            'green' => ['bg-green-100 text-green-800', 'bg-green-500/15 text-green-300'],
            'red' => ['bg-red-100 text-red-800', 'bg-red-500/15 text-red-300'],
            'yellow' => ['bg-yellow-100 text-yellow-800', 'bg-yellow-500/15 text-yellow-300'],
            'blue' => ['bg-blue-100 text-blue-800', 'bg-blue-500/15 text-blue-300'],
            'indigo' => ['bg-indigo-100 text-indigo-800', 'bg-indigo-500/15 text-indigo-300'],
            'purple' => ['bg-purple-100 text-purple-800', 'bg-purple-500/15 text-purple-300'],
            'pink' => ['bg-pink-100 text-pink-800', 'bg-pink-500/15 text-pink-300'],
            'gray' => ['bg-gray-100 text-gray-800', 'bg-gray-500/15 text-gray-300'],
        ];
        return $this->pick($map[$this->color] ?? $map['gray'], $forceDark, $forceLight);
    }

    private function outline(bool $forceDark, bool $forceLight): string
    {
        $map = [
            'green' => ['border border-green-300 text-green-700', 'border border-green-500/40 text-green-300'],
            'red' => ['border border-red-300 text-red-700', 'border border-red-500/40 text-red-300'],
            'yellow' => ['border border-yellow-300 text-yellow-700', 'border border-yellow-500/40 text-yellow-300'],
            'blue' => ['border border-blue-300 text-blue-700', 'border border-blue-500/40 text-blue-300'],
            'indigo' => ['border border-indigo-300 text-indigo-700', 'border border-indigo-500/40 text-indigo-300'],
            'purple' => ['border border-purple-300 text-purple-700', 'border border-purple-500/40 text-purple-300'],
            'pink' => ['border border-pink-300 text-pink-700', 'border border-pink-500/40 text-pink-300'],
            'gray' => ['border border-gray-300 text-gray-700', 'border border-gray-600 text-gray-300'],
        ];
        return $this->pick($map[$this->color] ?? $map['gray'], $forceDark, $forceLight);
    }

    private function solid(bool $forceDark, bool $forceLight): string
    {
        $map = [
            'green' => ['bg-green-600 text-white', 'bg-green-600 text-white'],
            'red' => ['bg-red-600 text-white', 'bg-red-600 text-white'],
            'yellow' => ['bg-yellow-500 text-white', 'bg-yellow-500 text-white'],
            'blue' => ['bg-blue-600 text-white', 'bg-blue-600 text-white'],
            'indigo' => ['bg-indigo-600 text-white', 'bg-indigo-600 text-white'],
            'purple' => ['bg-purple-600 text-white', 'bg-purple-600 text-white'],
            'pink' => ['bg-pink-600 text-white', 'bg-pink-600 text-white'],
            'gray' => ['bg-gray-600 text-white', 'bg-gray-600 text-white'],
        ];
        return $this->pick($map[$this->color] ?? $map['gray'], $forceDark, $forceLight);
    }

    private function pick(array $pair, bool $forceDark, bool $forceLight): string
    {
        if ($forceDark) {
            return $pair[1];
        }
        if ($forceLight) {
            return $pair[0];
        }
        return $pair[0] . ' ' . $pair[1];
    }
}
