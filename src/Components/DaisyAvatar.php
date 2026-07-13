<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyAvatar - DaisyUI avatar component.
 * Uses semantic classes: avatar, avatar-online, avatar-offline, etc.
 */
class DaisyAvatar extends DaisyComponent
{
    public function __construct(
        private string $src = '',
        private string $alt = '',
        private string $initials = '',
        private string $size = 'md',
        private string $status = '',
        private string $shape = 'rounded',
    ) {
    }

    public function render(): string
    {
        $sizeMap = [
            'xs' => 'w-8',
            'sm' => 'w-12',
            'md' => 'w-16',
            'lg' => 'w-20',
            'xl' => 'w-24',
        ];

        $statusMap = [
            'online' => 'avatar-online',
            'offline' => 'avatar-offline',
            'placeholder' => 'avatar-placeholder',
        ];

        $shapeMap = [
            'rounded' => 'rounded-btn',
            'circle' => 'rounded-full',
            'square' => '',
        ];

        $sizeClass = $sizeMap[$this->size] ?? 'w-16';
        $statusClass = $statusMap[$this->status] ?? '';
        $shapeClass = $shapeMap[$this->shape] ?? 'rounded-btn';

        $html = '<div class="avatar ' . $statusClass . '">';
        $html .= '<div class="' . $sizeClass . ' ' . $shapeClass . '">';

        if ($this->src !== '') {
            $html .= '<img src="' . htmlspecialchars($this->src) . '" alt="' . htmlspecialchars($this->alt) . '" />';
        } elseif ($this->initials !== '') {
            $html .= '<span class="text-3xl">' . htmlspecialchars($this->initials) . '</span>';
        }

        $html .= '</div></div>';

        return $html;
    }
}
