<?php
require __DIR__ . '/../vendor/autoload.php';
// Bootstrap app
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $db = $app->make('db');
    $row = $db->table('bets')->orderBy('id', 'desc')->first();
    echo json_encode($row);
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage();
}
