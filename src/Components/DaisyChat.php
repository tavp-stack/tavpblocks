<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyChat - DaisyUI chat component.
 * Uses semantic classes: chat, chat-start, chat-end, etc.
 */
class DaisyChat extends DaisyComponent
{
    public function __construct(
        private string $message = '',
        private string $sender = '',
        private string $time = '',
        private string $avatar = '',
        private string $position = 'start',
        private string $variant = 'default',
    ) {
    }

    public function render(): string
    {
        $positionMap = [
            'start' => 'chat-start',
            'end' => 'chat-end',
        ];

        $variantMap = [
            'primary' => 'chat-bubble-primary',
            'secondary' => 'chat-bubble-secondary',
            'accent' => 'chat-bubble-accent',
            'info' => 'chat-bubble-info',
            'success' => 'chat-bubble-success',
            'warning' => 'chat-bubble-warning',
            'error' => 'chat-bubble-error',
            'default' => '',
        ];

        $positionClass = $positionMap[$this->position] ?? 'chat-start';
        $variantClass = $variantMap[$this->variant] ?? '';

        $html = '<div class="chat ' . $positionClass . '">';

        if ($this->avatar !== '') {
            $html .= '<div class="chat-image avatar"><div class="w-10 rounded-full"><img src="' . htmlspecialchars($this->avatar) . '" /></div></div>';
        }

        if ($this->sender !== '') {
            $html .= '<div class="chat-header">' . htmlspecialchars($this->sender);
            if ($this->time !== '') {
                $html .= '<time class="text-xs opacity-50 ml-2">' . htmlspecialchars($this->time) . '</time>';
            }
            $html .= '</div>';
        }

        $html .= '<div class="chat-bubble ' . $variantClass . '">' . htmlspecialchars($this->message) . '</div>';

        $html .= '</div>';

        return $html;
    }
}
