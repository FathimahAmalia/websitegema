<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

$admin = User::first();
Auth::login($admin);

View::share('errors', new \Illuminate\Support\ViewErrorBag());

echo "=== TESTING JURUSAN CREATE & EDIT VIEW RENDERING ===\n";

$jurusan = Jurusan::first();

$tests = [
    'Jurusan Create' => [
        'class' => App\Http\Controllers\Admin\JurusanController::class,
        'method' => 'create',
        'params' => [],
    ],
    'Jurusan Edit' => [
        'class' => App\Http\Controllers\Admin\JurusanController::class,
        'method' => 'edit',
        'params' => [$jurusan],
    ],
];

foreach ($tests as $name => $cfg) {
    try {
        $controller = new $cfg['class']();
        $response = call_user_func_array([$controller, $cfg['method']], $cfg['params']);
        
        if ($response instanceof \Illuminate\View\View) {
            $html = $response->render();
            $len = strlen($html);
            echo "[SUCCESS] {$name} rendered successfully ({$len} bytes generated)\n";
        } else {
            echo "[SUCCESS] {$name} returned valid response\n";
        }
    } catch (\Throwable $e) {
        echo "[ERROR] {$name} failed: " . $e->getMessage() . "\n";
        echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    }
}
