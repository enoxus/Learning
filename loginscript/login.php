<?php
session_start();

require "database.php";
    if ( !empty($_POST['email']) && !empty($_POST['password']) ) {
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
            $records->bindParam(':email', $email);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $message = '';

            if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
                $_SESSION['user_id'] = $results['id'];
                header("Location: index.php");
            } else {
                $message = 'Sorry credentials are incorrect.';
            }
        } else {
            $message = 'Sorry your email address is invalid.';
        }
    } else {
        if (!empty($_POST)){
            $message = "Sorry, you've left some fields empty.";
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