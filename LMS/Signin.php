<?php
session_start();

include('conn.php');

$uname = $_POST['uname'];
$pass = $_POST['pasw'];

$qry = "SELECT * FROM user_login WHERE UserName = '$uname' and Password = '$pass'";

$res = mysqli_query($db_conn, $qry);

$row = mysqli_fetch_array($res);

if($uname == $row['username'] && $pass == $row['password'])
{
    $_SESSION['fname'] = $row['FullName'];
    header('location:fetch.php');
}else{
    echo "Your Username or Password is Incorrect";
}

mysqli_close($db_conn);


?>