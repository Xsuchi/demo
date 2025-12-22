<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /app/login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($username); ?> 👋</h1>

<p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>

<p>
  <strong>Password:</strong>
  <span id="pwd">********</span>
  <button id="show">Show</button>
</p>

<p><a href="/app/logout.php">Logout</a></p>

<script>
document.getElementById('show').addEventListener('click', () => {
  alert("Brother, passwords are hashed for security. They cannot be retrieved.\nUse Reset Password instead.");
});
</script>

</body>
</html>
