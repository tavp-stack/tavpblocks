<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisySkeleton - DaisyUI skeleton component.
 * Uses semantic classes: skeleton, etc.
 */
class DaisySkeleton extends DaisyComponent
{
    public function __construct(
        private string $type = 'text',
        private string $width = '100%',
        private string $height = '20px',
    ) {
    }

    public function render(): string
    {
        $typeMap = [
            'text' => '',
            'circle' => 'rounded-full',
            'rectangle' => '',
        ];

        $shapeClass = $typeMap[$this->type] ?? '';

        if ($this->type === 'circle') {
            $width = $this->width !== '100%' ? $this->width : '48px';
            $height = $width;
        } else {
            $width = $this->width;
            $height = $this->height;
        }

        return '<div class="skeleton ' . $shapeClass . '" style="width: ' . $width . '; height: ' . $height . ';"></div>';
    }
}
