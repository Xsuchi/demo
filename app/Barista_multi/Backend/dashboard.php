<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /");
    exit;
}

$isAdmin = ($_SESSION['username'] === 'admin');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Barista</title>
</head>

<body>

<?php
// inject admin link dynamically
ob_start();
include 'website.html';
$html = ob_get_clean();

if ($isAdmin) {
    $adminLink = '<li class="nav-item"><a class="nav-link" href="/app/admin/">Admin</a></li>';
    $html = str_replace('</ul>', $adminLink . '</ul>', $html);
}

echo $html;
?>

</body>
</html>
