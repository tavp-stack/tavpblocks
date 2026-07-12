<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Pie Chart - renders a pie chart using Chart.js
 */
class PieChart extends ChartJsComponent
{
    public function __construct(string $title = '')
    {
        parent::__construct($title, 'pie');
    }

    public function addSegment(string $label, float $value, string $color = ''): self
    {
        $this->labels[] = $label;
        
        if (empty($this->datasets)) {
            $this->datasets[] = [
                'data' => [],
                'backgroundColor' => [],
            ];
        }
        
        $this->datasets[0]['data'][] = $value;
        
        if (!empty($color)) {
            $this->datasets[0]['backgroundColor'][] = $color;
        }
        
        return $this;
    }
}
