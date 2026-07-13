<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyComponent - base class for DaisyUI components.
 * DaisyUI provides semantic component classes built on Tailwind CSS.
 */
abstract class DaisyComponent extends Component
{
    protected static function getDaisyClasses(string $variant, string $size = 'md'): array
    {
        return [
            'variant' => $variant,
            'size' => $size,
        ];
    }

    protected static function variantClass(string $variant, array $map): string
    {
        return $map[$variant] ?? $map['default'] ?? '';
    }

    protected static function sizeClass(string $size, array $map): string
    {
        return $map[$size] ?? $map['md'] ?? '';
    }
}
