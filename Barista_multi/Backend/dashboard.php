<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Barista Dashboard</title>
  <style>
    .admin-bar {
      position: fixed;
      top: 20px;
      left: 20px;
      background: rgba(255,255,255,0.95);
      padding: 16px 22px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.25);
      z-index: 9999;
      min-width: 220px;
    }
    .admin-bar h3 {
      margin: 0 0 12px 0;
      font-weight: bold;
    }
    .admin-bar a {
      display: block;
      margin-top: 8px;
      text-decoration: none;
      color: #c07a2c;
      font-weight: 600;
    }
  </style>
</head>

<body>

<div class="admin-bar">
  <h3>☕ Barista</h3>

  <small>Hi, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</small>

  <a href="/app/reservation.html">🍽 Book a Table</a>

  <?php if ($_SESSION['role'] === 'admin'): ?>
    <a href="/app/admin/index.php">🛠 Admin Portal</a>
  <?php endif; ?>

  <a href="/app/logout.php">🚪 Logout</a>
</div>

<?php include 'website.html'; ?>

</body>
</html>
