<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['username'] !== 'admin') {
    die("Access denied");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body { font-family: Arial; background:#f4f4f4; padding:40px; }
    a { display:block; margin:15px 0; font-size:18px; color:#c07a2c; }
  </style>
</head>

<body>

<h2>👑 Admin Dashboard</h2>

<a href="users.php">👥 View Users</a>
<a href="reservations.php">📅 View Reservations</a>
<a href="/app/dashboard.php">⬅ Back to Website</a>
<a href="/app/logout.php">🚪 Logout</a>

</body>
</html>
