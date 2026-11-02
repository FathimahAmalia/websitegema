<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

$admin = User::first();
Auth::login($admin);

// Bind dummy errors so Blade templates with @if(isset($errors) && $errors->any()) don't fail
View::share('errors', new \Illuminate\Support\ViewErrorBag());

echo "=== TESTING ALL ADMIN CONTROLLER INDEX METHODS & VIEW RENDERING ===\n";

$controllers = [
    'Dashboard' => [
        'class' => App\Http\Controllers\Admin\DashboardController::class,
        'method' => 'index',
        'params' => [],
    ],
    'Prestasi' => [
        'class' => App\Http\Controllers\Admin\PrestasiController::class,
        'method' => 'index',
        'params' => [new Request()],
    ],
    'Berita' => [
        'class' => App\Http\Controllers\Admin\BeritaController::class,
        'method' => 'index',
        'params' => [new Request()],
    ],
    'Jurusan' => [
        'class' => App\Http\Controllers\Admin\JurusanController::class,
        'method' => 'index',
        'params' => [],
    ],
    'Ekstrakurikuler' => [
        'class' => App\Http\Controllers\Admin\EkstrakurikulerController::class,
        'method' => 'index',
        'params' => [new Request()],
    ],
    'Galeri' => [
        'class' => App\Http\Controllers\Admin\GaleriController::class,
        'method' => 'index',
        'params' => [new Request()],
    ],
    'PPDB' => [
        'class' => App\Http\Controllers\Admin\PpdbController::class,
        'method' => 'index',
        'params' => [new Request()],
    ],
    'Pesan' => [
        'class' => App\Http\Controllers\Admin\PesanController::class,
        'method' => 'index',
        'params' => [new Request()],
    ],
];

$allPassed = true;

foreach ($controllers as $name => $cfg) {
    try {
        $controller = new $cfg['class']();
        $response = call_user_func_array([$controller, $cfg['method']], $cfg['params']);
        
        if ($response instanceof \Illuminate\View\View) {
            $html = $response->render();
            $len = strlen($html);
            echo "[SUCCESS] {$name} Index rendered successfully ({$len} bytes generated)\n";
        } else {
            echo "[SUCCESS] {$name} returned valid response\n";
        }
    } catch (\Throwable $e) {
        echo "[ERROR] {$name} failed: " . $e->getMessage() . "\n";
        echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
        $allPassed = false;
    }
}

if ($allPassed) {
    echo "\n>>> ALL 8 ADMIN SECTIONS RENDERED FLAWLESSLY WITH NEW DESIGN SYSTEM! <<<\n";
    exit(0);
} else {
    echo "\n>>> SOME SECTIONS FAILED! <<<\n";
    exit(1);
}
