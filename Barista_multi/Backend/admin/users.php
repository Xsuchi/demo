<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: /");
    exit;
}

$conn = new mysqli("mysql-db","root","rootpass","barista");
$result = $conn->query("SELECT id, username, role, created_at FROM users");
?>
<h2>Registered Users</h2>

<table border="1" cellpadding="10">
<tr>
  <th>ID</th>
  <th>Username</th>
  <th>Role</th>
  <th>Created</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['username']) ?></td>
  <td><?= $row['role'] ?></td>
  <td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>
</table>

<br>
<a href="index.php">⬅ Back</a>
