<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Tavp\Blocks\Components\StatCard;
use Tavp\Blocks\Components\Badge;
use Tavp\Blocks\Components\Alert;
use Tavp\Blocks\Components\Card;
use Tavp\Blocks\Components\Button;
use Tavp\Blocks\Components\Dropdown;
use Tavp\Blocks\Components\Tabs;
use Tavp\Blocks\Components\Pagination;
use Tavp\Blocks\Components\Avatar;
use Tavp\Blocks\Components\Modal;
use Tavp\Blocks\Components\ProgressBar;
use Tavp\Blocks\Components\Skeleton;
use Tavp\Blocks\Components\SearchBar;
use Tavp\Blocks\Components\Toggle;
use Tavp\Blocks\Components\Tooltip;
use Tavp\Blocks\Components\Timeline;
use Tavp\Blocks\Components\EmptyState;
use Tavp\Blocks\Components\Chip;
use Tavp\Blocks\Components\Breadcrumb;
use Tavp\Blocks\Components\NotificationBell;
use Tavp\Blocks\Components\Accordion;
use Tavp\Blocks\Components\LoadingSpinner;
use Tavp\Blocks\Components\StatusBadge;
use Tavp\Blocks\Components\Divider;
use Tavp\Blocks\Components\Navbar;
use Tavp\Blocks\Components\LineChart;
use Tavp\Blocks\Components\BarChart;
use Tavp\Blocks\Components\DoughnutChart;
use Tavp\Blocks\Components\PieChart;
use Tavp\Blocks\Components\RadarChart;
use Tavp\Blocks\Components\PolarAreaChart;
use Tavp\Blocks\Components\BubbleChart;
use Tavp\Blocks\Components\ScatterChart;
use Tavp\Blocks\Components\Gauge;
use Tavp\Blocks\Components\DaisyButton;
use Tavp\Blocks\Components\DaisyCard;
use Tavp\Blocks\Components\DaisyAlert;
use Tavp\Blocks\Components\DaisyBadge;
use Tavp\Blocks\Components\DaisyAvatar;
use Tavp\Blocks\Components\DaisyTabs;
use Tavp\Blocks\Components\DaisyModal;
use Tavp\Blocks\Components\DaisyProgress;
use Tavp\Blocks\Components\DaisyPagination;
use Tavp\Blocks\Components\DaisyToast;
use Tavp\Blocks\Components\DaisyTable;
use Tavp\Blocks\Components\DaisySteps;
use Tavp\Blocks\Components\DaisyNavbar;
use Tavp\Blocks\Components\DaisyDropdown;
use Tavp\Blocks\Components\DaisyRating;

function safe(callable $fn): string
{
    try {
        return (string) $fn();
    } catch (\Throwable $e) {
        return '<div class="rounded border border-red-300 bg-red-50 p-2 text-xs text-red-700">ERR: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}

function grid(string $html, int $cols = 4): string
{
    $map = [2 => 'sm:grid-cols-2', 3 => 'md:grid-cols-3', 4 => 'sm:grid-cols-2 lg:grid-cols-4'];
    return '<div class="grid grid-cols-1 ' . ($map[$cols] ?? '') . ' gap-6">' . $html . '</div>';
}

$out = [];
$out[] = '<!DOCTYPE html>';
$out[] = '<html lang="id" data-theme="light"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">';
$out[] = '<title>TAVPblocks — Full Component Demo</title>';
$out[] = '<script src="https://cdn.tailwindcss.com"></script>';
$out[] = '<script>tailwind.config = { darkMode: "class", theme: { extend: { fontFamily: { sans: ["Inter","ui-sans-serif","system-ui","sans-serif"] }, colors: { brand: { 50:"#eef2ff",100:"#e0e7ff",200:"#c7d2fe",300:"#a5b4fc",400:"#818cf8",500:"#6366f1",600:"#4f46e5",700:"#4338ca",800:"#3730a3",900:"#312e81" } } } } };</script>';
$out[] = '<link href="https://cdn.jsdelivr.net/npm/daisyui@4/dist/full.min.css" rel="stylesheet" />';
$out[] = '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
$out[] = '<style>
  /* Modern daisyUI theme override (indigo + neutral, ala shadcn/zenith) */
  [data-theme=light] {
    --p: 243 75% 59%;
    --pf: 243 75% 53%;
    --s: 250 60% 60%;
    --sf: 250 60% 54%;
    --a: 262 83% 58%;
    --af: 262 83% 52%;
    --b1: 210 20% 98%;
    --b2: 210 20% 96%;
    --b3: 210 20% 92%;
    --bc: 222 47% 11%;
    --in: 199 89% 48%;
    --su: 142 71% 45%;
    --wa: 38 92% 50%;
    --er: 0 72% 51%;
    --rounded-box: 1rem;
    --rounded-btn: 0.5rem;
    --rounded-badge: 9999px;
  }
  body { font-family: Inter, ui-sans-serif, system-ui, sans-serif; }
</style>';
$out[] = '<style>body{font-family:Inter,ui-sans-serif,system-ui,sans-serif}</style>';
$out[] = '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">';
$out[] = '</head><body class="bg-gray-100 p-8 space-y-14 text-gray-900 dark:bg-gray-950 dark:text-gray-100">';

$out[] = '<header class="max-w-6xl mx-auto"><h1 class="text-3xl font-bold">TAVPblocks — Full Component Demo</h1>';
$out[] = '<p class="text-gray-500 mt-1">133 komponen: 68 core Tailwind · 9 Chart.js · 65 DaisyUI. Render asli dari class PHP.</p></header>';

/* ================= 1. CORE TAILWIND ================= */
$out[] = '<section class="max-w-6xl mx-auto space-y-6">';
$out[] = '<h2 class="text-2xl font-semibold">1 · Core Tailwind Components</h2>';

$out[] = '<h3 class="text-sm font-semibold uppercase tracking-wide text-gray-400">StatCard (icon · color · sparkline)</h3>';
$out[] = grid(
    safe(fn () => (new StatCard('Total Users', 1284, '+12%', 'green', '👥', 'brand', [3, 5, 4, 8, 7, 10, 9]))->render()) .
    safe(fn () => (new StatCard('Revenue', 8420, '+8%', 'green', '💰', 'green', [2, 3, 3, 5, 6, 5, 8]))->render()) .
    safe(fn () => (new StatCard('Orders', 312, '-4%', 'red', '🧾', 'blue', [9, 8, 7, 6, 5, 4, 3]))->render()) .
    safe(fn () => (new StatCard('Refunds', 18, '', 'gray', '⚠️', 'yellow', [1, 2, 1, 3, 2, 1, 2]))->render())
);

$out[] = '<h3 class="text-sm font-semibold uppercase tracking-wide text-gray-400 mt-2">Badge (soft · outline · solid)</h3>';
$badgeHtml = '';
foreach (['soft', 'outline', 'solid'] as $v) {
    $badgeHtml .= '<div class="flex flex-wrap items-center gap-2 mb-2"><span class="text-xs text-gray-400 w-14">' . $v . '</span>';
    foreach (['gray', 'green', 'red', 'yellow', 'blue', 'indigo', 'purple', 'pink'] as $c) {
        $badgeHtml .= safe(fn () => (new Badge(ucfirst($c), $c, $v))->render());
    }
    $badgeHtml .= '</div>';
}
$out[] = $badgeHtml;

$out[] = '<h3 class="text-sm font-semibold uppercase tracking-wide text-gray-400 mt-2">Alert (title · dismissible)</h3>';
$out[] = safe(fn () => (new Alert('Resource berhasil disimpan.', 'success', 'Tersimpan', true))->render());
$out[] = safe(fn () => (new Alert('Ada 3 record belum divalidasi.', 'warning', 'Peringatan'))->render());
$out[] = safe(fn () => (new Alert('Gagal menghapus record.', 'error', 'Gagal', true))->render());
$out[] = safe(fn () => (new Alert('Update TavpHub v1.2 tersedia.', 'info', 'Info'))->render());

$out[] = '<h3 class="text-sm font-semibold uppercase tracking-wide text-gray-400 mt-2">Card (actions)</h3>';
$out[] = grid(
    safe(fn () => (new Card('Latest Activity', '<p>User <b>admin</b> login 2 menit lalu.</p>'))->render()) .
    safe(fn () => (new Card('Quick Stats', '<p>User aktif: <b>1.284</b></p>', '', '<button class="rounded-lg bg-indigo-600 px-3 py-1.5 text-sm font-medium text-white">Export</button>'))->render()),
    2
);

$out[] = '<h3 class="text-sm font-semibold uppercase tracking-wide text-gray-400 mt-2">Buttons · Toggle · StatusBadge · Chip · ProgressBar</h3>';
$out[] = '<div class="flex flex-wrap items-center gap-3">' .
    safe(fn () => (new Button('Primary'))->render()) .
    safe(fn () => (new Button('Danger', 'danger'))->render()) .
    safe(fn () => (new Button('Ghost', 'ghost'))->render()) .
    safe(fn () => (new Chip('PHP 8.3'))->render()) .
    safe(fn () => (new Toggle(true, 'Dark mode'))->render()) .
    '</div>';
$out[] = '<div class="mt-3 max-w-md">' . safe(fn () => (new ProgressBar(65))->render()) . '</div>';

$out[] = '<h3 class="text-sm font-semibold uppercase tracking-wide text-gray-400 mt-2">SearchBar · Avatar · NotificationBell · Breadcrumb · LoadingSpinner · Skeleton</h3>';
$out[] = '<div class="flex flex-wrap items-center gap-4">' .
    safe(fn () => (new SearchBar('q'))->render()) .
    safe(fn () => (new Avatar('https://i.pravatar.cc/64?img=12', 'Admin'))->render()) .
    safe(fn () => (new NotificationBell(3))->render()) .
    safe(fn () => (new LoadingSpinner())->render()) .
    '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => (new Breadcrumb([['label' => 'Home'], ['label' => 'Users'], ['label' => 'Edit']]))->render()) . '</div>';
$out[] = '<div class="mt-3 flex gap-3">' . safe(fn () => (new Skeleton())->render()) . safe(fn () => (new Skeleton())->render()) . '</div>';

$out[] = '<h3 class="text-sm font-semibold uppercase tracking-wide text-gray-400 mt-2">Dropdown · Tabs · Pagination · Tooltip · Accordion · EmptyState · Timeline · Divider · Modal</h3>';
$dd = new Dropdown('Actions'); $dd->addItem('Edit', '#'); $dd->addItem('Delete', '#');
$tabs = new Tabs('overview'); $tabs->addTab('Overview', 'overview', 'Ringkasan')->addTab('Activity', 'activity', 'Aktivitas')->addTab('Settings', 'settings', 'Pengaturan');
$out[] = '<div class="flex flex-wrap items-center gap-4">' .
    safe(fn () => $dd->render()) .
    safe(fn () => $tabs->render()) .
    safe(fn () => (new Pagination(2, 5, '/admin/users'))->render()) .
    safe(fn () => (new Tooltip('Hover me', 'Tooltip text'))->render()) .
    '</div>';
$out[] = '<div class="mt-3 grid grid-cols-1 md:grid-cols-3 gap-6">' .
    safe(fn () => (new Accordion([['title' => 'What is TavpHub?', 'body' => 'Free admin panel for TAVP.'], ['title' => 'License?', 'body' => 'MIT.']]))->render()) .
    safe(fn () => (new EmptyState('No records', 'Belum ada data.', 'Buat'))->render()) .
    safe(fn () => (new Timeline([['title' => 'Created', 'time' => '09:00', 'color' => 'green'], ['title' => 'Updated', 'time' => '10:30', 'color' => 'blue']]))->render()) .
    '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => (new Divider('or'))->render()) . '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => (new Modal('demo', 'Confirm', 'Yakin hapus record ini?', '<button class="btn btn-primary">Ya</button>'))->render()) . '</div>';

$out[] = '</section>';

/* ================= 2. CHART.JS ================= */
$out[] = '<section class="max-w-6xl mx-auto space-y-6">';
$out[] = '<h2 class="text-2xl font-semibold">2 · Chart.js Components</h2>';

function chartCard(string $title, string $html): string
{
    return '<div class="rounded-xl bg-white border border-gray-200 p-4 shadow-sm"><h4 class="mb-2 text-sm font-semibold text-gray-700">' . $title . '</h4><div class="relative h-56">' . $html . '</div></div>';
}

$line = (new LineChart('Signups'))->setLabels(['Jan', 'Feb', 'Mar', 'Apr', 'May'])->addDataset('Users', [12, 19, 8, 25, 22])->setSmooth();
$bar = (new BarChart('Revenue'))->setLabels(['Q1', 'Q2', 'Q3', 'Q4'])->addDataset('IDR', [40, 65, 50, 80]);
$doughnut = (new DoughnutChart('Traffic'))->setLabels(['Direct', 'Social', 'Ads'])->addDataset('Traffic', [40, 30, 30], ['backgroundColor' => ['#6366f1', '#22c55e', '#f59e0b']]);
$pie = (new PieChart('Devices'))->addSegment('Mobile', 60, '#3b82f6')->addSegment('Desktop', 40, '#a855f7');
$radar = (new RadarChart('Skills'))->setLabels(['PHP', 'JS', 'CSS', 'SQL', 'DevOps'])->addDataset('You', [90, 70, 80, 75, 60]);
$polar = (new PolarAreaChart('Coverage'))->setLabels(['Unit', 'Int', 'E2E'])->addDataset('Tests', [30, 50, 20]);
$bubble = (new BubbleChart('Bubble'))->addDataset('Set', [['x' => 10, 'y' => 20, 'r' => 5], ['x' => 25, 'y' => 15, 'r' => 8], ['x' => 40, 'y' => 30, 'r' => 12]]);
$scatter = (new ScatterChart('Scatter'))->addDataset('pts', [['x' => 1, 'y' => 3], ['x' => 2, 'y' => 7], ['x' => 3, 'y' => 5], ['x' => 4, 'y' => 9]]);

$out[] = grid(
    safe(fn () => chartCard('LineChart', $line->render())) .
    safe(fn () => chartCard('BarChart', $bar->render())) .
    safe(fn () => chartCard('DoughnutChart', $doughnut->render())) .
    safe(fn () => chartCard('PieChart', $pie->render())) .
    safe(fn () => chartCard('RadarChart', $radar->render())) .
    safe(fn () => chartCard('PolarAreaChart', $polar->render())) .
    safe(fn () => chartCard('BubbleChart', $bubble->render())) .
    safe(fn () => chartCard('ScatterChart', $scatter->render())),
    4
);
$out[] = '<div class="max-w-xs">' . safe(fn () => (new Gauge(72, 100, 'CPU', 'green'))->render()) . '</div>';
$out[] = '</section>';

/* ================= 3. DAISYUI ================= */
$out[] = '<section class="max-w-6xl mx-auto space-y-6">';
$out[] = '<h2 class="text-2xl font-semibold">3 · DaisyUI Components</h2>';

$dTabs = new DaisyTabs(); $dTabs->addTab('profile', 'Profile', true)->addTab('settings', 'Settings')->addTab('billing', 'Billing');
$dModal = new DaisyModal('dmodal', 'Hello', 'Ini modal DaisyUI.', '<button class="btn">OK</button>');
$dToast = new DaisyToast(); $dToast->addMessage('Saved!', 'success')->addMessage('Warning', 'warning');
$dTable = new DaisyTable(zebra: true); $dTable->addColumn('name', 'Name')->addColumn('role', 'Role'); $dTable->addRow(['Admin', 'admin'])->addRow(['Budi', 'editor']);
$dSteps = new DaisySteps(); $dSteps->addItem('Cart', 'primary')->addItem('Ship', 'primary')->addItem('Done');
$dNav = new DaisyNavbar('TavpHub'); $dNav->addStartItem('<a class="btn btn-ghost text-xl">TavpHub</a>'); $dNav->addEndItem('<a class="btn btn-primary">New</a>');
$dDrop = new DaisyDropdown('Menu'); $dDrop->addItem('Edit', '#')->addItem('Delete', '#');
$dRating = new DaisyRating('rate', 4, 5);

$out[] = '<div class="flex flex-wrap items-center gap-3">' .
    safe(fn () => (new DaisyButton('Primary'))->render()) .
    safe(fn () => (new DaisyButton('Secondary', 'secondary'))->render()) .
    safe(fn () => (new DaisyButton('Ghost', 'ghost'))->render()) .
    safe(fn () => (new DaisyBadge('New', 'primary'))->render()) .
    safe(fn () => (new DaisyBadge('Hot', 'error', 'md', true))->render()) .
    safe(fn () => (new DaisyAvatar('https://i.pravatar.cc/64?img=5', 'Budi', status: 'online'))->render()) .
    safe(fn () => $dRating->render()) .
    '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => (new DaisyAlert('Operasi berhasil dilakukan.', 'success'))->render()) . '</div>';
$out[] = '<div class="mt-3 grid grid-cols-1 md:grid-cols-3 gap-6">' .
    safe(fn () => (new DaisyCard('Daisy Card', 'Ini body kartu DaisyUI.', 'Footer'))->render()) .
    safe(fn () => (new DaisyProgress(value: 70, variant: 'primary'))->render()) .
    safe(fn () => (new DaisyPagination(2, 5))->render()) .
    '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => $dTabs->render()) . '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => $dSteps->render()) . '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => $dTable->render()) . '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => $dNav->render()) . '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => $dDrop->render()) . '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => $dToast->render()) . '</div>';
$out[] = '<div class="mt-3">' . safe(fn () => $dModal->render()) . '</div>';
$out[] = '</section>';

$out[] = '<button onclick="(function(){var d=document.documentElement.classList.toggle(\'dark\');document.documentElement.setAttribute(\'data-theme\', d?\'dark\':\'light\');})()" class="fixed bottom-4 right-4 z-50 rounded-full bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-lg hover:bg-brand-700">Toggle Dark</button>';
$out[] = '</body></html>';

file_put_contents(__DIR__ . '/components-full-demo.html', implode("\n", $out));
echo "OK bytes=" . strlen(implode("\n", $out)) . "\n";
