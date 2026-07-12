<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Scatter Chart - renders a scatter chart using Chart.js
 * Data format: [['x' => 10, 'y' => 20], ...]
 */
class ScatterChart extends ChartJsComponent
{
    public function __construct(string $title = '')
    {
        parent::__construct($title, 'scatter');
    }
}
