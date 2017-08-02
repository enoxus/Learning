<?php
session_start();

require "database.php";


    if ( !empty($_POST['email']) && !empty($_POST['password']) ) {

        $records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST["email"]);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header("Location: index.php");
        } else {
            $message = 'Sorry credentials are incorrect.';
        }
    }
?>
<html>
<head>
    <title> John Skee Login</title>
</head>
<body>
<h1>Login Page</h1>
<form action="login.php" method="POST">
    <input type="text" name="email" autofocus>
    <input type="password" name="password">
    <input type="submit">
</form>

<?php if (!empty ($message)): ?>
    <p><?php echo $message ?></p>
<?php endif; ?>

Or <a href="register.php">register</a>
</body>
</html>