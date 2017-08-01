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
        'car 1',
        'car 2',
        'car 3',
        'car 4',
    ],

    'merc' => [
        'car 1',
        'car 2',
        'car 3',
        'car 4',
    ],
];

// get data from post

// work out what one you need to display

// loop through and display each car for the correct one from the form