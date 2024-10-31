<?php

include('conn.php');

$fname = $_POST['fname'];
$uname = $_POST['uname'];
$pass = $_POST['pasw'];

$qeury = "INSERT INTO user_login VALUES(NULL, '$fname', '$uname', '$pass')";

$res = mysqli_query($db_conn, $qeury);

if($res == true)
{
    header("Location: Login.php");
}else{
    echo "Incorrect Values";
}

mysqli_close($db_conn);

?>