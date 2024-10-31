<?php

include ('conn.php');
if(isset($_POST['save']) != "")
{
    $id = $_POST['id'];
    $Title = $_POST['Title'];
    $Author= $_POST['Author'];
    $genre = $_POST['genre'];
    $publish_year = $_POST['publish_year'];
    $copies_ava = $_POST['copies_ava'];
    $sql = "INSERT INTO book VALUES (null,'$Title','$Author','$genre','$publish_year','$copies_ava')";
    if(mysqli_query($db_conn,$sql)){
        header('location:fetch.php');
    }
    else{
        echo 'error' . $sql . " " .mysqli_error($db_conn);
    }
}



?>