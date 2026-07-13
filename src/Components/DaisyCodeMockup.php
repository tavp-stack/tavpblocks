<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyCodeMockup - DaisyUI code mockup component.
 * Uses semantic classes: mockup-code, etc.
 */
class DaisyCodeMockup extends DaisyComponent
{
    private array $lines = [];

    public function __construct(
        private string $prefix = '',
    ) {
    }

    public function addLine(string $code, bool $highlight = false): self
    {
        $this->lines[] = [
            'code' => $code,
            'highlight' => $highlight,
        ];
        return $this;
    }

    public function render(): string
    {
        $html = '<div class="mockup-code">';

        foreach ($this->lines as $line) {
            $highlightClass = $line['highlight'] ? ' bg-warning' : '';
            $html .= '<pre data-prefix="' . htmlspecialchars($this->prefix) . '" class="' . $highlightClass . '"><code>' . htmlspecialchars($line['code']) . '</code></pre>';
        }

        $html .= '</div>';

        return $html;
    }
}
