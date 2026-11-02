<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$publicPages = [
    '/' => 'welcome',
    '/ekstrakurikuler' => 'ekstrakurikuler.index',
    '/prestasi' => 'prestasi.index',
    '/galeri' => 'galeri.index',
];

echo "Testing public controllers and views...\n";

// Welcome
try {
    $rendered = view('welcome')->render();
    echo "[OK] Public Home ('welcome') rendered (" . strlen($rendered) . " bytes)\n";
} catch (\Throwable $e) {
    echo "[FAIL] Public Home: " . $e->getMessage() . "\n";
}

// Berita Controller
try {
    $request = Illuminate\Http\Request::create('/berita', 'GET');
    $controller = new App\Http\Controllers\BeritaController();
    $response = $controller->index($request);
    echo "[OK] Berita index controller response OK\n";
} catch (\Throwable $e) {
    echo "[FAIL] Berita index: " . $e->getMessage() . "\n";
}

// Ekstrakurikuler Controller
try {
    $controller = new App\Http\Controllers\EkstrakurikulerController();
    $response = $controller->index();
    echo "[OK] Ekstrakurikuler index controller response OK\n";
} catch (\Throwable $e) {
    echo "[FAIL] Ekstrakurikuler index: " . $e->getMessage() . "\n";
}

// Prestasi Controller
try {
    $request = Illuminate\Http\Request::create('/prestasi', 'GET');
    $controller = new App\Http\Controllers\PrestasiController();
    $response = $controller->index($request);
    echo "[OK] Prestasi index controller response OK\n";
} catch (\Throwable $e) {
    echo "[FAIL] Prestasi index: " . $e->getMessage() . "\n";
}

// Galeri Controller
try {
    $request = Illuminate\Http\Request::create('/galeri', 'GET');
    $controller = new App\Http\Controllers\GaleriController();
    $response = $controller->index($request);
    echo "[OK] Galeri index controller response OK\n";
} catch (\Throwable $e) {
    echo "[FAIL] Galeri index: " . $e->getMessage() . "\n";
}

// Jurusan Controller
try {
    $controller = new App\Http\Controllers\JurusanController();
    $response = $controller->show('tjkt');
    echo "[OK] Jurusan show ('tjkt') controller response OK\n";
} catch (\Throwable $e) {
    echo "[FAIL] Jurusan show: " . $e->getMessage() . "\n";
}

echo "ALL PUBLIC CONTROLLER TESTS COMPLETED!\n";
