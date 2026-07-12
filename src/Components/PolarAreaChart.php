<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Polar Area Chart - renders a polar area chart using Chart.js
 */
class PolarAreaChart extends ChartJsComponent
{
    public function __construct(string $title = '')
    {
        parent::__construct($title, 'polarArea');
    }
}
