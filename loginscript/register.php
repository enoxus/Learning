<?php
session_start();

require "database.php";

$message = "";

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);

        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":password", password_hash($_POST["password"], PASSWORD_BCRYPT));

        if ($stmt->execute()) {
            $message = "Successfully created user.";
        } else {
            $message = "Error whilst creating user.";
        }
    } else {
        $message = "Sorry, your email address is invalid.";
    }
} else {
    if (!empty($_POST)){
        $message = "Sorry, you've left some fields empty.";
    }
}
?>

<html>
<head>
    <title> John Skee Register</title>
</head>
<body>
<h1>Register Page</h1>
<form action="register.php" method="POST">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="password" name="pwconfirm">
    <input type="submit">
</form>

<?php if (!empty ($message)): ?>
    <p><?php echo $message ?></p>
<?php endif; ?>

</body>
</html>