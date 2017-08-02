<form method="post" action="test.php">
    <input type="text" name="num1">
    <input type="text" name="num2">

    <select name="type">
        <option>add</option>
        <option>subtract</option>
        <option>multiply</option>
        <option>devide</option>
    </select>
    <input type="submit">
</form>
<?php

class calculator {
    public function addition($a,$b) {
        return $a + $b;
    }
    public function subtract($a,$b) {
        return $a - $b;
    }
    public function multiply($a,$b) {
        return $a * $b;
    }
    public function devide($a,$b) {
        return $a / $b;
    }
}

$var1 = $_POST["num1"];
$var2 = $_POST["num2"];
$type = $_POST["type"];

    $calc = new calculator();

switch ($type) {
    case "add":
        echo $calc->addition($var1,$var2)."<br>";
        break;
    case "subtract":
        echo $calc->subtract($var1,$var2)."<br>";
        break;
    case "multiply":
        echo $calc->multiply($var1,$var2)."<br>";
        break;
    case "devide":
        echo $calc->devide($var1,$var2)."<br>";
        break;
}