<?php
session_start();

require "database.php";

$message = "";

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindparam(":email", $_POST["email"]);
    $stmt->bindparam(":password", password_hash($_POST["password"], PASSWORD_BCRYPT));

    if ($stmt->execute()) {
        $message = "Successfully created user.";
    } else {
        $message = "Error whilst creating user.";
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