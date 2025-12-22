<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['username'] !== 'admin') {
    die("Access denied");
}

$conn = new mysqli('mysql-db', 'root', 'rootpass', 'barista');
$result = $conn->query("SELECT * FROM reservations ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reservations</title>
</head>

<body>
<h2>Table Reservations</h2>

<table border="1" cellpadding="10">
<tr>
  <th>Name</th>
  <th>Phone</th>
  <th>Date</th>
  <th>Time</th>
  <th>People</th>
  <th>Message</th>
</tr>

<?php while ($r = $result->fetch_assoc()): ?>
<tr>
  <td><?= htmlspecialchars($r['name']) ?></td>
  <td><?= htmlspecialchars($r['phone']) ?></td>
  <td><?= $r['date'] ?></td>
  <td><?= $r['time'] ?></td>
  <td><?= $r['people'] ?></td>
  <td><?= htmlspecialchars($r['message']) ?></td>
</tr>
<?php endwhile; ?>

</table>

<br>
<a href="index.php">⬅ Back</a>
</body>
</html>
