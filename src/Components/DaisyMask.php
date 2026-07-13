<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyMask - DaisyUI mask component.
 * Uses semantic classes: mask, mask-squircle, mask-heart, etc.
 */
class DaisyMask extends DaisyComponent
{
    public function __construct(
        private string $src = '',
        private string $alt = '',
        private string $shape = 'squircle',
        private string $width = '192px',
        private string $height = '192px',
    ) {
    }

    public function render(): string
    {
        $shapeMap = [
            'squircle' => 'mask-squircle',
            'heart' => 'mask-heart',
            'hexagon' => 'mask-hexagon',
            'hexagon-2' => 'mask-hexagon-2',
            'decagon' => 'mask-decagon',
            'pentagon' => 'mask-pentagon',
            'diamond' => 'mask-diamond',
            'circle' => 'mask-circle',
            'star' => 'mask-star',
            'star-2' => 'mask-star-2',
            'triangle' => 'mask-triangle',
            'triangle-2' => 'mask-triangle-2',
            'triangle-3' => 'mask-triangle-3',
            'triangle-4' => 'mask-triangle-4',
            'none' => '',
        ];

        $shapeClass = $shapeMap[$this->shape] ?? 'mask-squircle';

        return '<div class="mask ' . $shapeClass . '" style="width: ' . $this->width . '; height: ' . $this->height . ';"><img src="' . htmlspecialchars($this->src) . '" alt="' . htmlspecialchars($this->alt) . '" /></div>';
    }
}
