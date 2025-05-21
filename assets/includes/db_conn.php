<?php

$dbname = 'u738603833_water';
$dbuser = 'u738603833_clan';
$dbpass = 'B9x]aKh&=|F';
$dbhost = 'localhost';


$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$link) {
    echo "Connection to DB failed!";
} 

?>