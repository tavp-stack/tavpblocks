<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Chart component - renders charts using Chart.js
 * Supports: bar, line, horizontal, pie, doughnut, radar, polarArea, bubble, scatter
 */
class Chart extends ChartJsComponent
{
    public function __construct(
        string $type = 'bar',
        string $title = '',
        int $height = 300
    ) {
        parent::__construct($title, $type);
        $this->height = $height;
    }

    public function addPoint(string $label, float $value): self
    {
        if (empty($this->labels)) {
            $this->labels = [];
        }
        $this->labels[] = $label;
        
        if (empty($this->datasets)) {
            $this->datasets[] = [
                'label' => 'Data',
                'data' => [],
                'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                'borderColor' => 'rgb(59, 130, 246)',
                'borderWidth' => 1,
            ];
        }
        
        $this->datasets[0]['data'][] = $value;
        return $this;
    }
}
