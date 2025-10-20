<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
try {
    $db = $app->make('db');
    $rows = $db->select('SELECT * FROM bets ORDER BY id DESC LIMIT 1');
    echo json_encode($rows, JSON_PRETTY_PRINT);
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage();
}
