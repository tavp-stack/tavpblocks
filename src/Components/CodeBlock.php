<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class CodeBlock extends Component
{
    public function render(): string
    {
        return '<div class="codeblock">Component: CodeBlock</div>';
    }
}
