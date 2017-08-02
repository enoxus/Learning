<form method="post" action="cheatsheet.php">
    <select name="type">
        <option>bmw</option>
        <option>audi</option>
        <option>merc</option>
    </select>
    <input type="submit">
</form>

<?php

$arr = [
    'bmw' => [
        'car 1',
        'car 2',
        'car 3',
        'car 4',
    ],

    'audi' => [
        'car 1q',
        'car 2xz',
        'car 3g',
        'car h4',
    ],

    'merc' => [
        'cbar 1',
        'a',
        'cadr 3',
        'cars 4',
    ]
];

$var1 = $_POST["type"];

switch($var1) {
    case "bmw" :
        for ($i = 0; $i <= 4; $i ++) {
            echo $arr["bmw"][$i]."<br>";
        }
        break;
    case "audi" :
        for ($i = 0; $i <= 4; $i ++) {
            echo $arr["audi"][$i]."<br>";
        }
        break;
    case "merc" :
        for ($i = 0; $i <= 4; $i ++) {
            echo $arr["merc"][$i]."<br>";
        }
        break;
}

// get data from post

// work out what one you need to display

// loop through and display each car for the correct one from the form