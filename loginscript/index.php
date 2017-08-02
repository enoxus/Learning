<?php
session_start();
?>

<html>
<head>
    <title> John Skee</title>
</head>
<body>
<h1>John Skee</h1>
<?php if (isset($_SESSION['user_id'])): ?>
    <p>Logged in.</p>
    <a href="logout.php">logout</a>
<?php else: ?>
<a href="login.php">Login</a> Or <a href="register.php">Register</a>
<?php endif; ?>
</body>
</html>