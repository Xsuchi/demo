<?php
session_start();

$conn = new mysqli('mysql-db', 'root', 'rootpass', 'barista');
if ($conn->connect_error) die("DB error");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /");
    exit;
}

$username = trim($_POST['username']);
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    header("Location: /?error=exists");
    exit;
}

$stmt = $conn->prepare(
    "INSERT INTO users (username, password) VALUES (?, ?)"
);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

header("Location: /");
exit;
