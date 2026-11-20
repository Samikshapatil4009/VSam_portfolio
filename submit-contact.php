<?php
require_once __DIR__ . '/config/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php#contact'); exit; }
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$service = trim($_POST['service'] ?? '');
$requirements = trim($_POST['requirements'] ?? '');
if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $requirements === '' || strlen($requirements)>5000) {
    http_response_code(400); exit('Please enter a valid name, email and project requirement. <a href="index.php#contact">Go back</a>');
}
$stmt = db()->prepare('INSERT INTO enquiries (name,email,phone,service,requirements) VALUES (?,?,?,?,?)');
$stmt->execute([$name,$email,$phone,$service,$requirements]);
header('Location: index.php?sent=1#contact');
