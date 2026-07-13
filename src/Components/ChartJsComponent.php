<?php

declare(strict_types=1);

namespace Tavp\Blocks\Components;

/**
 * Base class for Chart.js integrated components.
 * Renders charts using the Chart.js library.
 */
abstract class ChartJsComponent extends Component
{
    protected array $datasets = [];
    protected array $labels = [];
    protected array $options = [];
    protected string $canvasId;
    protected int $width = 400;
    protected int $height = 300;

    public function __construct(
        protected string $title = '',
        protected string $type = 'bar'
    ) {
        $this->canvasId = 'chart_' . uniqid();
    }

    public function setLabels(array $labels): self
    {
        $this->labels = $labels;
        return $this;
    }

    public function addDataset(string $label, array $data, array $options = []): self
    {
        $this->datasets[] = array_merge([
            'label' => $label,
            'data' => $data,
        ], $options);
        return $this;
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function setSize(int $width, int $height): self
    {
        $this->width = $width;
        $this->height = $height;
        return $this;
    }

    protected function getChartConfig(): array
    {
        return [
            'type' => $this->type,
            'data' => [
                'labels' => $this->labels,
                'datasets' => $this->datasets,
            ],
            'options' => array_merge([
                'responsive' => true,
                'maintainAspectRatio' => false,
                'plugins' => [
                    'title' => [
                        'display' => !empty($this->title),
                        'text' => $this->title,
                    ],
                ],
            ], $this->options),
        ];
    }

    protected function renderChartJsScript(): string
    {
        $config = json_encode($this->getChartConfig(), JSON_THROW_ON_ERROR);
        
        return <<<HTML
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('{$this->canvasId}').getContext('2d');
        new Chart(ctx, {$config});
    });
</script>
HTML;
    }

    public function render(): string
    {
        if (empty($this->datasets)) {
            return '<div class="text-gray-500 text-sm">No data</div>';
        }

        $html = '<div class="w-full h-full" style="position:relative;">';
        $html .= '<canvas id="' . $this->canvasId . '" style="display:block;width:100%!important;height:100%!important;"></canvas>';
        $html .= $this->renderChartJsScript();
        $html .= '</div>';

        return $html;
    }
}
