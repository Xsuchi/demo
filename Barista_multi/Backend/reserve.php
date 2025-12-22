<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /");
    exit;
}

$conn = new mysqli("mysql-db", "root", "rootpass", "barista");

$name    = $_POST['name'];
$phone   = $_POST['phone'];
$date    = $_POST['date'];
$time    = $_POST['time'];
$people  = $_POST['people'];
$user    = $_SESSION['username'];

$stmt = $conn->prepare(
  "INSERT INTO reservations (username, date, time, people)
   VALUES (?, ?, ?, ?)"
);
$stmt->bind_param("sssi", $user, $date, $time, $people);
$stmt->execute();

echo "
<h2>Reservation Confirmed ✅</h2>
<p>Thank you, $name</p>
<p><a href='/'>Go back to Home</a></p>
";
