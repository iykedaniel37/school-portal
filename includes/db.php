<?php

$dbhost = 'localhost';
$dbpass = '';
$dbusername = 'root';
$dbname = 'chitrust';

$conn = mysqli_connect($dbhost,$dbusername, $dbpass, $dbname);

if(!$conn){
    die('error connecting to database '. mysqli_connect_error()
);
}
