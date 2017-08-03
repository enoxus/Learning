<?php
require 'database.php';

 if (!empty($_POST['fullname']) && !empty($_POST['comment'])) {

     $records = $conn->prepare('INSERT INTO comments (name, comment) VALUES (:name, :comment)');
     $records->bindParam(':name', $_POST['fullname']);
     $records->bindParam(':comment', $_POST['comment']);
     $records->execute();
 } else {
     if(!empty($_POST)) {
     $message = "One or more field(s) are empty.";
     }
 }

 if (!empty($_GET['page']) && is_integer(intval($_GET['page']))) {
     $page = $_GET['page'];
 }
 else {
     $page = 1;
 }

 $perPage = 10;
 $offset = $page * $perPage - $perPage;

$records = $conn->prepare("SELECT name,comment,date FROM comments ORDER BY date ASC LIMIT 10 OFFSET $offset");
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);

$totalComments = $conn->prepare("SELECT count(*) AS total FROM comments");
$totalComments->execute();
$result = $totalComments->fetch(PDO::FETCH_ASSOC);
$pages = ceil($result['total'] / $perPage);
?>
<html>
<head>
    <title>Jimmeny Cricket Guest Book</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Jimmeny Cricket Guest Book</h1>
<form method="POST" action="index.php">
    <input type="text" placeholder="Name" name="fullname" autofocus>
    <textarea type="text" placeholder="Type your message here..." name="comment"></textarea>
    <input type="submit">
</form>
<?php echo $message; ?>
<div id="comments">
    <?php
        if (count($results > 0)):
            for($i = 0; $i < count($results); $i++):
    ?>
        <div class="comment">
            <p><?php echo $results[$i]['name']. ' commented on ' . $results[$i]['date']; ?></p>
            <p><?php echo $results[$i]['comment']; ?></p>
        </div>
    <?php endfor; endif; ?>
</div>
<div>
    <?php for($i = 1; $i <= $pages; $i++): ?>
        <?php if ($i == $page): ?>
            <?php echo $i; ?>
        <?php else: ?>
            <a href="?page=<?php echo $i ?>"><?php echo $i; ?></a>
    <?php endif; endfor; ?>
</div>
</html>