<?php
session_start();

$host = getenv('DB_HOST') ?: 'mysql-db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'rootpass';
$dbname = getenv('DB_NAME') ?: 'barista';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /");
    exit;
}

$username = trim($_POST['username']);
$password = $_POST['password'];

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("DB connection error");
}

$stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    header("Location: /?error=exists");
    exit;
}

$stmt->close();

$hashed = password_hash($password, PASSWORD_BCRYPT);
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed);
$stmt->execute();

header("Location: /");
exit;
