<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /");
    exit;
}

$conn = new mysqli("mysql-db", "root", "rootpass", "barista");
if ($conn->connect_error) {
    die("DB connection error");
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /app/reservation.html");
    exit;
}

$name   = $_POST['name'];
$phone  = $_POST['phone'];
$date   = $_POST['date'];
$time   = $_POST['time'];
$people = $_POST['people'];
$msg    = $_POST['booking-form-message'] ?? '';

$stmt = $conn->prepare(
    "INSERT INTO reservations (name, phone, date, time, people, message)
     VALUES (?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssssis",
    $name,
    $phone,
    $date,
    $time,
    $people,
    $msg
);

$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  height: 100vh;
  background: url('/assets/images/thank-you.jpg') no-repeat center/cover;
  display: flex;
  justify-content: center;
  align-items: center;
}
.box {
  background: rgba(255,255,255,0.95);
  padding: 30px;
  border-radius: 10px;
  text-align: center;
  width: 320px;
}
a {
  display: inline-block;
  margin-top: 15px;
  text-decoration: none;
  color: #c07a2c;
  font-weight: bold;
}
</style>
</head>

<body>
<div class="box">
  <h2>Reservation Confirmed ✅</h2>
  <p>Thank you, <strong><?php echo htmlspecialchars($name); ?></strong></p>
  <p>Your table has been booked.</p>
  <a href="/">Go back to Home</a>
</div>
</body>
</html>
