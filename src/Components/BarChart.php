<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Bar Chart - renders a bar chart using Chart.js
 */
class BarChart extends ChartJsComponent
{
    public function __construct(string $title = '', bool $stacked = false)
    {
        parent::__construct($title, 'bar');
        if ($stacked) {
            $this->options['scales']['x']['stacked'] = true;
            $this->options['scales']['y']['stacked'] = true;
        }
    }

    public function setHorizontal(bool $horizontal = true): self
    {
        $this->options['indexAxis'] = $horizontal ? 'y' : 'x';
        return $this;
    }
}
