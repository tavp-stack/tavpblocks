<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Alert extends Component
{
    public function __construct(
        private string $message = '',
        private string $type = 'info',
        private string $title = '',
        private bool $dismissible = false,
        private string $theme = 'auto',
    ) {
    }

    public function render(): string
    {
        $forceDark = $this->theme === 'dark';
        $forceLight = $this->theme === 'light';

        $shell = match ($this->type) {
            'success' => $this->pair('bg-green-50 border-green-200 text-green-800', 'bg-green-500/10 border-green-500/30 text-green-200', $forceDark, $forceLight),
            'error' => $this->pair('bg-red-50 border-red-200 text-red-800', 'bg-red-500/10 border-red-500/30 text-red-200', $forceDark, $forceLight),
            'warning' => $this->pair('bg-yellow-50 border-yellow-200 text-yellow-800', 'bg-yellow-500/10 border-yellow-500/30 text-yellow-200', $forceDark, $forceLight),
            default => $this->pair('bg-blue-50 border-blue-200 text-blue-800', 'bg-blue-500/10 border-blue-500/30 text-blue-200', $forceDark, $forceLight),
        };

        $icon = match ($this->type) {
            'success' => '✓',
            'error' => '✕',
            'warning' => '!',
            default => 'i',
        };

        $html = '<div class="flex items-start gap-3 rounded-lg border p-4 ' . $shell . '" role="alert">';
        $html .= '<span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-current text-xs font-bold opacity-70">' . $icon . '</span>';
        $html .= '<div class="min-w-0 flex-1">';
        if ($this->title !== '') {
            $html .= '<p class="text-sm font-semibold">' . htmlspecialchars($this->title) . '</p>';
        }
        $html .= '<p class="text-sm ' . ($this->title !== '' ? 'opacity-90' : '') . '">' . htmlspecialchars($this->message) . '</p>';
        $html .= '</div>';

        if ($this->dismissible) {
            $html .= '<button type="button" class="shrink-0 opacity-60 hover:opacity-100" aria-label="Dismiss" onclick="this.parentElement.remove()">'
                . '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                . '</button>';
        }

        $html .= '</div>';

        return $html;
    }

    private function pair(string $light, string $dark, bool $forceDark, bool $forceLight): string
    {
        if ($forceDark) {
            return $dark;
        }
        if ($forceLight) {
            return $light;
        }
        return $light . ' ' . $dark;
    }
}
