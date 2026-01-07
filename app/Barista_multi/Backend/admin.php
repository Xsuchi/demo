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
<?php
session_start();
if ($_SESSION['username'] !== 'admin') {
    die("Access denied");
}

$conn = new mysqli("mysql-db", "root", "rootpass", "barista");

$users = $conn->query("SELECT id, username, created_at FROM users");
$res = $conn->query("SELECT * FROM reservations");
?>

<h2>Users</h2>
<table border="1">
<tr><th>ID</th><th>Username</th><th>Created</th></tr>
<?php while($u=$users->fetch_assoc()) { ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= $u['username'] ?></td>
<td><?= $u['created_at'] ?></td>
</tr>
<?php } ?>
</table>

<h2>Reservations</h2>
<table border="1">
<tr><th>User</th><th>Date</th><th>Time</th><th>People</th></tr>
<?php while($r=$res->fetch_assoc()) { ?>
<tr>
<td><?= $r['username'] ?></td>
<td><?= $r['date'] ?></td>
<td><?= $r['time'] ?></td>
<td><?= $r['people'] ?></td>
</tr>
<?php } ?>
</table>
</div>
