<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Radar Chart - renders a radar chart using Chart.js
 */
class RadarChart extends ChartJsComponent
{
    public function __construct(string $title = '')
    {
        parent::__construct($title, 'radar');
    }

    public function setScale(array $scaleOptions): self
    {
        $this->options['scales']['r'] = $scaleOptions;
        return $this;
    }
}
