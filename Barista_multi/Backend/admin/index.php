<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body { font-family: Arial; background:#f4f4f4; padding:20px; }
    .box { background:#fff; padding:20px; margin-bottom:20px; border-radius:8px; }
    a { text-decoration:none; font-weight:bold; color:#c07a2c; }
  </style>
</head>
<body>

<h2>Admin Dashboard 👨‍💼</h2>

<div class="box">
  <a href="users.php">👥 View Users</a>
</div>

<div class="box">
  <a href="reservations.php">📅 View Reservations</a>
</div>

<div class="box">
  <a href="/app/dashboard.php">⬅ Back to Site</a>
</div>

</body>
</html>
