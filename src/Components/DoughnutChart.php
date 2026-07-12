<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Doughnut Chart - renders a doughnut chart using Chart.js
 */
class DoughnutChart extends ChartJsComponent
{
    public function __construct(string $title = '')
    {
        parent::__construct($title, 'doughnut');
    }

    public function setCutout(string $cutout = '50%'): self
    {
        $this->options['cutout'] = $cutout;
        return $this;
    }
}
