<?php
session_start();

$host = getenv('DB_HOST') ?: 'mysql-db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'rootpass';
$dbname = getenv('DB_NAME') ?: 'barista';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!$username || !$password) {
        echo "Username and password are required!";
        exit;
    }

    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
        die("DB connection error: " . $conn->connect_error);
    }

    $conn->query("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $conn->select_db($dbname);

    $stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Username already exists.";
        exit;
    }

    $stmt->close();

    $hashed = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='/app/login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
