<?php
session_start();

$host = getenv('DB_HOST') ?: 'mysql-db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'rootpass';
$dbname = getenv('DB_NAME') ?: 'barista';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("DB connection error: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        echo "Invalid username or password";
        exit;
    }

    $stmt->bind_result($id, $hashed);
    $stmt->fetch();

    if (password_verify($password, $hashed)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        header("Location: /app/dashboard.php");
        exit;
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
}
?>
