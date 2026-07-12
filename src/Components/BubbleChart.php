<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Bubble Chart - renders a bubble chart using Chart.js
 * Data format: [['x' => 10, 'y' => 20, 'r' => 5], ...]
 */
class BubbleChart extends ChartJsComponent
{
    public function __construct(string $title = '')
    {
        parent::__construct($title, 'bubble');
    }
}
