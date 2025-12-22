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
  width: 300px;
}
input, button {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
}
</style>
<div class='box'>
<h2>Reservation Confirmed ✅</h2>
<p>Thank you, $name</p>
<p><a href='/'>Go back to Home</a></p>
</div>
</style>
";
