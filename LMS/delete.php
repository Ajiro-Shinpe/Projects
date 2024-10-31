<?php

include('conn.php');

$id = $_REQUEST['id'];

$qry = "DELETE FROM book where id = '$id'";

$res = mysqli_query($db_conn, $qry);

if($res == true)
{
    header('location:fetch.php');
}else{
    echo "Your Data is not Delete";
}

mysqli_close($db_conn);

?>