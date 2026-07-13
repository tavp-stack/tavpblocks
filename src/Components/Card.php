<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Card extends Component
{
    public function __construct(
        private string $title = '',
        private string $body = '',
        private string $footer = '',
        private string $actions = '',
        private bool $bordered = true,
        private string $theme = 'auto',
    ) {
    }

    public function render(): string
    {
        $forceDark = $this->theme === 'dark';
        $forceLight = $this->theme === 'light';

        $shell = match (true) {
            $forceDark => 'rounded-xl bg-gray-900 border-gray-800 shadow-sm',
            $forceLight => 'rounded-xl bg-white border-gray-200 shadow-sm',
            default => 'rounded-xl bg-white border-gray-200 shadow-sm dark:bg-gray-900 dark:border-gray-800',
        };
        $border = $this->bordered ? 'border ' . ($forceLight ? 'border-gray-200' : ($forceDark ? 'border-gray-800' : 'border-gray-200 dark:border-gray-800')) : '';

        $titleCls = match (true) {
            $forceDark => 'text-base font-semibold text-white',
            $forceLight => 'text-base font-semibold text-gray-900',
            default => 'text-base font-semibold text-gray-900 dark:text-white',
        };
        $bodyCls = match (true) {
            $forceDark => 'text-sm text-gray-300',
            $forceLight => 'text-sm text-gray-600',
            default => 'text-sm text-gray-600 dark:text-gray-300',
        };
        $footerCls = match (true) {
            $forceDark => 'border-t border-gray-800 bg-gray-800/40',
            $forceLight => 'border-t border-gray-100 bg-gray-50',
            default => 'border-t border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-800/40',
        };
        $headerBorder = match (true) {
            $forceDark => 'border-b border-gray-800',
            $forceLight => 'border-b border-gray-100',
            default => 'border-b border-gray-100 dark:border-gray-800',
        };

        $html = '<div class="' . $shell . ' ' . $border . ' overflow-hidden">';

        if ($this->title !== '' || $this->actions !== '') {
            $html .= '<div class="flex items-center justify-between gap-3 px-5 py-4 ' . $headerBorder . '">';
            $html .= '<h3 class="' . $titleCls . '">' . htmlspecialchars($this->title) . '</h3>';
            if ($this->actions !== '') {
                $html .= '<div class="flex items-center gap-2">' . $this->actions . '</div>';
            }
            $html .= '</div>';
        }

        $html .= '<div class="px-5 py-4 ' . $bodyCls . '">' . $this->body . '</div>';

        if ($this->footer !== '') {
            $html .= '<div class="px-5 py-3 ' . $footerCls . '">' . $this->footer . '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
