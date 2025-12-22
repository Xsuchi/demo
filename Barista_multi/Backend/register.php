<?php
session_start();

$host = getenv('DB_HOST') ?: 'mysql-db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'rootpass';
$dbname = getenv('DB_NAME') ?: 'barista';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Prevent direct access
    header("Location: /");
    exit;
}

$username = trim($_POST['username']);
$password = $_POST['password'];

if (!$username || !$password) {
    echo "
    <h3>Username and password are required</h3>
    <p>
      <a href='/'>Go to Login</a> |
      <a href='/app/register.html'>Try Again</a>
    </p>";
    exit;
}

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("DB connection error: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS `$dbname`");
$conn->select_db($dbname);

/* Check if user already exists */
$stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "
    <h3>Username already exists</h3>
    <p>
      <a href='/'>Go to Login</a> |
      <a href='/app/register.html'>Try another username</a>
    </p>";
    exit;
}

$stmt->close();

/* Create user */
$hashed = password_hash($password, PASSWORD_BCRYPT);
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed);

if ($stmt->execute()) {
    // IMPORTANT: redirect to clean login page
    header("Location: /");
    exit;
} else {
    echo "
    <h3>Registration failed</h3>
    <p>Error: {$stmt->error}</p>
    <p><a href='/app/register.html'>Try Again</a></p>";
}

$stmt->close();
$conn->close();
?>
