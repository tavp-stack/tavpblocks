<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class Comment extends Component
{
    public function render(): string
    {
        return '<div class="comment">Component: Comment</div>';
    }
}
