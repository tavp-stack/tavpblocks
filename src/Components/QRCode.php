<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

class QRCode extends Component
{
    public function render(): string
    {
        return '<div class="qrcode">Component: QRCode</div>';
    }
}
