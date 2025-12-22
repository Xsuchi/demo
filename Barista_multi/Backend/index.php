<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /app/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Barista Café Login</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      background: url('/assets/images/login.jpg') no-repeat center/cover;
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
</head>
<body>

<div class="box">
  <h1>Welcome to Barista Café</h1>

  <form action="/app/login.php" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

  <hr>

  <a href="/app/register.html">
    <button type="button">Create Account</button>
  </a>
</div>

</body>
</html>
