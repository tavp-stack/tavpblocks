<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Tavp\Blocks\Components\StatCard;
use Tavp\Blocks\Components\Badge;
use Tavp\Blocks\Components\Alert;
use Tavp\Blocks\Components\Card;

$out = [];

$out[] = '<!DOCTYPE html>';
$out[] = '<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">';
$out[] = '<title>TAVPblocks — Component Demo (upgraded)</title>';
$out[] = '<script src="https://cdn.tailwindcss.com"></script>';
$out[] = '<style>body{font-family:Inter,ui-sans-serif,system-ui,sans-serif} [x-cloak]{display:none!important}</style>';
$out[] = '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">';
$out[] = '</head><body class="bg-gray-100 text-gray-900 p-8 space-y-12">';

$out[] = '<header class="max-w-6xl mx-auto"><h1 class="text-3xl font-bold">TAVPblocks — Component Demo</h1>';
$out[] = '<p class="text-gray-500 mt-1">Render asli dari komponen PHP (StatCard / Badge / Alert / Card) dengan variant icon · color · sparkline · light/dark.</p></header>';

/* ---------------- STATCARD ---------------- */
$out[] = '<section class="max-w-6xl mx-auto space-y-6">';
$out[] = '<h2 class="text-xl font-semibold">StatCard — light theme</h2>';
$out[] = '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">';
$out[] = (new StatCard('Total Users', 1284, '+12%', 'green', '👥', 'brand', [3, 5, 4, 8, 7, 10, 9]))->render();
$out[] = (new StatCard('Revenue', 8420, '+8%', 'green', '💰', 'green', [2, 3, 3, 5, 6, 5, 8]))->render();
$out[] = (new StatCard('Orders', 312, '-4%', 'red', '🧾', 'blue', [9, 8, 7, 6, 5, 4, 3]))->render();
$out[] = (new StatCard('Refunds', 18, '', 'gray', '⚠️', 'yellow', [1, 2, 1, 3, 2, 1, 2]))->render();
$out[] = '</div>';

$out[] = '<h2 class="text-xl font-semibold mt-8">StatCard — dark theme (shell TavpHub)</h2>';
$out[] = '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">';
$out[] = (new StatCard('Total Users', 1284, '+12%', 'green', '👥', 'brand', [3, 5, 4, 8, 7, 10, 9], 'dark'))->render();
$out[] = (new StatCard('Revenue', 8420, '+8%', 'green', '💰', 'green', [2, 3, 3, 5, 6, 5, 8], 'dark'))->render();
$out[] = (new StatCard('Orders', 312, '-4%', 'red', '🧾', 'blue', [9, 8, 7, 6, 5, 4, 3], 'dark'))->render();
$out[] = (new StatCard('Refunds', 18, '', 'gray', '⚠️', 'yellow', [1, 2, 1, 3, 2, 1, 2], 'dark'))->render();
$out[] = '</div>';
$out[] = '</section>';

/* ---------------- BADGE ---------------- */
$out[] = '<section class="max-w-6xl mx-auto space-y-6">';
$out[] = '<h2 class="text-xl font-semibold">Badge — variants & colors (light)</h2>';
$colors = ['gray', 'green', 'red', 'yellow', 'blue', 'indigo', 'purple', 'pink'];
foreach (['soft', 'outline', 'solid'] as $variant) {
    $out[] = '<div class="flex flex-wrap items-center gap-2 mb-2"><span class="text-xs uppercase tracking-wide text-gray-400 w-16">' . $variant . '</span>';
    foreach ($colors as $c) {
        $out[] = (new Badge(ucfirst($c), $c, $variant))->render();
    }
    $out[] = '</div>';
}
$out[] = '<h2 class="text-xl font-semibold mt-8">Badge — dark theme</h2>';
$out[] = '<div class="flex flex-wrap items-center gap-2 rounded-xl bg-gray-900 border border-gray-800 p-6">';
foreach ($colors as $c) {
    $out[] = (new Badge(ucfirst($c), $c, 'soft', 'dark'))->render();
}
$out[] = '</div>';
$out[] = '</section>';

/* ---------------- ALERT ---------------- */
$out[] = '<section class="max-w-6xl mx-auto space-y-6">';
$out[] = '<h2 class="text-xl font-semibold">Alert — light theme</h2>';
$out[] = (new Alert('Resource berhasil disimpan.', 'success', 'Tersimpan', true))->render();
$out[] = (new Alert('Perhatian: ada 3 record yang belum divalidasi.', 'warning', 'Peringatan'))->render();
$out[] = (new Alert('Terjadi kesalahan saat menghapus record.', 'error', 'Gagal', true))->render();
$out[] = (new Alert('Update tersedia untuk TavpHub v1.2.', 'info', 'Info'))->render();

$out[] = '<h2 class="text-xl font-semibold mt-8">Alert — dark theme</h2>';
$out[] = '<div class="space-y-4 rounded-xl bg-gray-900 border border-gray-800 p-6">';
$out[] = (new Alert('Resource berhasil disimpan.', 'success', 'Tersimpan', true, 'dark'))->render();
$out[] = (new Alert('Perhatian: ada 3 record yang belum divalidasi.', 'warning', 'Peringatan', false, 'dark'))->render();
$out[] = (new Alert('Terjadi kesalahan saat menghapus record.', 'error', 'Gagal', true, 'dark'))->render();
$out[] = (new Alert('Update tersedia untuk TavpHub v1.2.', 'info', 'Info', false, 'dark'))->render();
$out[] = '</div>';
$out[] = '</section>';

/* ---------------- CARD ---------------- */
$out[] = '<section class="max-w-6xl mx-auto space-y-6">';
$out[] = '<h2 class="text-xl font-semibold">Card — light theme (dengan actions)</h2>';
$out[] = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
$out[] = (new Card('Latest Activity', '<p>User <b>admin</b> login 2 menit lalu.</p><p>Order #1024 dibuat.</p>'))->render();
$out[] = (new Card('Quick Stats', '<p>Total user aktif: <b>1.284</b></p>', '', '<button class="rounded-lg bg-indigo-600 px-3 py-1.5 text-sm font-medium text-white">Export</button>'))->render();
$out[] = '</div>';

$out[] = '<h2 class="text-xl font-semibold mt-8">Card — dark theme</h2>';
$out[] = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
$out[] = (new Card('Latest Activity', '<p>User <b>admin</b> login 2 menit lalu.</p>', '', '', true, 'dark'))->render();
$out[] = (new Card('Quick Stats', '<p>Total user aktif: <b>1.284</b></p>', '', '<button class="rounded-lg bg-indigo-600 px-3 py-1.5 text-sm font-medium text-white">Export</button>', true, 'dark'))->render();
$out[] = '</div>';
$out[] = '</section>';

$out[] = '</body></html>';

file_put_contents(__DIR__ . '/components-demo.html', implode("\n", $out));

echo "OK: " . __DIR__ . "/components-demo.html\n";
echo "Bytes: " . strlen(implode("\n", $out)) . "\n";
