<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Tavp\Blocks\Components\Chart;
use Tavp\Blocks\Components\LineChart;
use Tavp\Blocks\Components\BarChart;
use Tavp\Blocks\Components\RadarChart;
use Tavp\Blocks\Components\DoughnutChart;
use Tavp\Blocks\Components\PieChart;
use Tavp\Blocks\Components\PolarAreaChart;
use Tavp\Blocks\Components\BubbleChart;
use Tavp\Blocks\Components\ScatterChart;

echo "<h1>Chart.js Components Demo</h1>";

// 1. Bar Chart
echo "<h2>Bar Chart</h2>";
$barChart = new BarChart('Monthly Sales');
$barChart->setLabels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
         ->addDataset('Sales', [120, 190, 300, 500, 200, 300], [
             'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
             'borderColor' => 'rgb(59, 130, 246)',
             'borderWidth' => 1,
         ]);
echo $barChart->render();

// 2. Line Chart
echo "<h2>Line Chart</h2>";
$lineChart = new LineChart('Revenue Trend');
$lineChart->setLabels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
          ->addDataset('Revenue', [1000, 1200, 900, 1500, 1800, 2000], [
              'borderColor' => 'rgb(34, 197, 94)',
              'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
          ])
          ->setSmooth(true)
          ->setFill(true);
echo $lineChart->render();

// 3. Pie Chart
echo "<h2>Pie Chart</h2>";
$pieChart = new PieChart('Market Share');
$pieChart->addSegment('Product A', 35, 'rgba(59, 130, 246, 0.8)')
         ->addSegment('Product B', 25, 'rgba(34, 197, 94, 0.8)')
         ->addSegment('Product C', 20, 'rgba(251, 191, 36, 0.8)')
         ->addSegment('Product D', 20, 'rgba(239, 68, 68, 0.8)');
echo $pieChart->render();

// 4. Doughnut Chart
echo "<h2>Doughnut Chart</h2>";
$doughnutChart = new DoughnutChart('Expenses');
$doughnutChart->addSegment('Marketing', 30, 'rgba(59, 130, 246, 0.8)')
              ->addSegment('Development', 40, 'rgba(34, 197, 94, 0.8)')
              ->addSegment('Operations', 20, 'rgba(251, 191, 36, 0.8)')
              ->addSegment('Admin', 10, 'rgba(239, 68, 68, 0.8)')
              ->setCutout('60%');
echo $doughnutChart->render();

// 5. Radar Chart
echo "<h2>Radar Chart</h2>";
$radarChart = new RadarChart('Skills Assessment');
$radarChart->setLabels(['PHP', 'JavaScript', 'SQL', 'CSS', 'DevOps'])
           ->addDataset('Developer A', [90, 80, 85, 70, 60])
           ->addDataset('Developer B', [70, 90, 75, 85, 80]);
echo $radarChart->render();

// 6. Polar Area Chart
echo "<h2>Polar Area Chart</h2>";
$polarChart = new PolarAreaChart('Resource Usage');
$polarChart->addDataset('Resources', [30, 50, 20, 40, 60], [
    'backgroundColor' => [
        'rgba(59, 130, 246, 0.8)',
        'rgba(34, 197, 94, 0.8)',
        'rgba(251, 191, 36, 0.8)',
        'rgba(239, 68, 68, 0.8)',
        'rgba(168, 85, 247, 0.8)',
    ],
]);
echo $polarChart->render();

// 7. Scatter Chart
echo "<h2>Scatter Chart</h2>";
$scatterChart = new ScatterChart('Correlation Analysis');
$scatterChart->addDataset('Observations', [
    ['x' => 10, 'y' => 20],
    ['x' => 15, 'y' => 25],
    ['x' => 20, 'y' => 30],
    ['x' => 25, 'y' => 35],
    ['x' => 30, 'y' => 40],
], [
    'backgroundColor' => 'rgba(59, 130, 246, 0.8)',
]);
echo $scatterChart->render();

// 8. Bubble Chart
echo "<h2>Bubble Chart</h2>";
$bubbleChart = new BubbleChart('Project Status');
$bubbleChart->addDataset('Projects', [
    ['x' => 10, 'y' => 20, 'r' => 15],
    ['x' => 15, 'y' => 25, 'r' => 10],
    ['x' => 20, 'y' => 30, 'r' => 20],
], [
    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
]);
echo $bubbleChart->render();

// 9. Stacked Bar Chart
echo "<h2>Stacked Bar Chart</h2>";
$stackedBar = new BarChart('Quarterly Revenue', true);
$stackedBar->setLabels(['Q1', 'Q2', 'Q3', 'Q4'])
           ->addDataset('Product A', [100, 150, 200, 180], [
               'backgroundColor' => 'rgba(59, 130, 246, 0.8)',
           ])
           ->addDataset('Product B', [80, 120, 150, 140], [
               'backgroundColor' => 'rgba(34, 197, 94, 0.8)',
           ])
           ->addDataset('Product C', [60, 90, 120, 100], [
               'backgroundColor' => 'rgba(251, 191, 36, 0.8)',
           ]);
echo $stackedBar->render();

// 10. Horizontal Bar Chart
echo "<h2>Horizontal Bar Chart</h2>";
$horizontalBar = new BarChart('Team Performance');
$horizontalBar->setLabels(['Team A', 'Team B', 'Team C', 'Team D'])
              ->addDataset('Score', [85, 92, 78, 95], [
                  'backgroundColor' => 'rgba(168, 85, 247, 0.8)',
              ])
              ->setHorizontal(true);
echo $horizontalBar->render();
