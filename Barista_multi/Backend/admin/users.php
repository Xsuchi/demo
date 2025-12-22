<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['username'] !== 'admin') {
    die("Access denied");
}

$conn = new mysqli('mysql-db', 'root', 'rootpass', 'barista');
$result = $conn->query("SELECT id, username, created_at FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
</head>

<body>
<h2>Registered Users</h2>

<table border="1" cellpadding="10">
<tr>
  <th>ID</th>
  <th>Username</th>
  <th>Created</th>
</tr>

<?php while ($u = $result->fetch_assoc()): ?>
<tr>
  <td><?= $u['id'] ?></td>
  <td><?= htmlspecialchars($u['username']) ?></td>
  <td><?= $u['created_at'] ?></td>
</tr>
<?php endwhile; ?>

</table>

<br>
<a href="index.php">⬅ Back</a>
</body>
</html>
