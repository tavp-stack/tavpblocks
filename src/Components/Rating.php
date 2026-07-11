<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Rating extends Component
{
    public function render(): string
    {
        return '<div class="rating">Component: Rating</div>';
    }
}
