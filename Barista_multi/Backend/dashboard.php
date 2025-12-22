<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Barista</title>
</head>

<body>

<?php include 'website.html'; ?>

</body>
</html>
