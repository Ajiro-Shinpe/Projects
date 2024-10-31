<?php
$db_user = 'root';
$db_host = 'localhost';

$db_conn = mysqli_connect($db_host,$db_user);

// if($db_conn == true){
//     echo "connected";
// }
// else{
//     echo "connection failed"; 
// }
$db = mysqli_select_db($db_conn, 'LMS');
// if($db == true){
//     echo "connected";
// }
// else{
//     echo "connection failed"; 
// }

?>