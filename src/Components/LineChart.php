<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Line Chart - renders a line chart using Chart.js
 */
class LineChart extends ChartJsComponent
{
    public function __construct(string $title = '')
    {
        parent::__construct($title, 'line');
    }

    public function setSmooth(bool $smooth = true): self
    {
        foreach ($this->datasets as &$dataset) {
            $dataset['tension'] = $smooth ? 0.4 : 0;
        }
        return $this;
    }

    public function setFill(bool $fill = true): self
    {
        foreach ($this->datasets as &$dataset) {
            $dataset['fill'] = $fill;
        }
        return $this;
    }
}
