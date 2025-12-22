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

if (isset($_SESSION['user_id'])) {
    // User logged in → show website
    include 'website.html';
    exit;
}

// Not logged in → show login form
?>
<!DOCTYPE html>
<html>
<head>
  <title>Barista Café Login</title>
</head>
<body>
  <h1>Welcome to Barista Café</h1>
  <form action="/app/login.php" method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>

<hr>

<p>New here?</p>

<a href="/app/register.html">
  <button type="button">Create Account</button>
</a>

</body>
</html>
</div>