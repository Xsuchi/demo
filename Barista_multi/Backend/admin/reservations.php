<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: /");
    exit;
}

$conn = new mysqli("mysql-db","root","rootpass","barista");
$result = $conn->query("SELECT * FROM reservations ORDER BY date DESC");
?>
<h2>Table Reservations</h2>

<table border="1" cellpadding="10">
<tr>
  <th>ID</th>
  <th>User</th>
  <th>Date</th>
  <th>Time</th>
  <th>People</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['username']) ?></td>
  <td><?= $row['date'] ?></td>
  <td><?= $row['time'] ?></td>
  <td><?= $row['people'] ?></td>
</tr>
<?php endwhile; ?>
</table>

<br>
<a href="index.php">⬅ Back</a>
