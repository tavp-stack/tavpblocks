<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * DaisyModal - DaisyUI modal component.
 * Uses semantic classes: modal, modal-box, modal-action, etc.
 */
class DaisyModal extends DaisyComponent
{
    public function __construct(
        private string $id = '',
        private string $title = '',
        private string $content = '',
        private string $actions = '',
        private bool $open = false,
    ) {
        if ($this->id === '') {
            $this->id = 'modal_' . uniqid();
        }
    }

    public function render(): string
    {
        $openClass = $this->open ? ' modal-open' : '';

        $html = '<dialog id="' . $this->id . '" class="modal' . $openClass . '">';
        $html .= '<div class="modal-box">';

        if ($this->title !== '') {
            $html .= '<h3 class="font-bold text-lg">' . htmlspecialchars($this->title) . '</h3>';
        }

        if ($this->content !== '') {
            $html .= '<p class="py-4">' . $this->content . '</p>';
        }

        if ($this->actions !== '') {
            $html .= '<div class="modal-action">' . $this->actions . '</div>';
        }

        $html .= '</div>';
        $html .= '<form method="dialog" class="modal-backdrop"><button>close</button></form>';
        $html .= '</dialog>';

        return $html;
    }

    public function getOpenButton(string $label = 'Open'): string
    {
        return '<button class="btn" onclick="document.getElementById(\'' . $this->id . '\').showModal()">' . htmlspecialchars($label) . '</button>';
    }

    public function getCloseButton(string $label = 'Close'): string
    {
        return '<button class="btn" onclick="document.getElementById(\'' . $this->id . '\').close()">' . htmlspecialchars($label) . '</button>';
    }
}
