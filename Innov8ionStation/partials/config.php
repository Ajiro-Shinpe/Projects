<?php
$host = 'localhost';
$username = 'root';
$db = 'i_forum';

$conn = mysqli_connect($host, $username, '', $db);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}
// else{
//     echo "Connected successfully";
// }
// session_start();
?>