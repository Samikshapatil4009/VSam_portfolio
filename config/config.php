<?php
declare(strict_types=1);
session_start();

define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3307'); // Change to 3306 if your MySQL uses the default port.
define('DB_NAME', 'freelance_portfolio');
define('DB_USER', 'root');
define('DB_PASS', '');

function db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }
    return $pdo;
}
function e(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
function is_admin(): bool {
    return !empty($_SESSION['admin_id']);
}
function require_admin(): void {
    if (!is_admin()) {
        header('Location: login.php');
        exit;
    }
}
