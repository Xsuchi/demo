<style>
body {
  margin: 0;
  height: 100vh;
  background: url('/assets/images/coffee-bg.jpg') no-repeat center/cover;
  display: flex;
  justify-content: center;
  align-items: center;
}
.box {
  background: rgba(255,255,255,0.95);
  padding: 30px;
  border-radius: 10px;
  text-align: center;
  width: 300px;
}
input, button {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
}
</style>

<div class="box">
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /app/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Barista Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>

<iframe 
  src="/" 
  style="width:100%; height:90vh; border:none;">
</iframe>

<a href="/app/logout.php">Logout</a>

</body>
</html>
</div>