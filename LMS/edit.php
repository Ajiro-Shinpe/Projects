<?php

include('conn.php');

$id = $_REQUEST['id'];
$Title = $_POST['Title'];
$Author = $_POST['Author'];
$genre = $_POST['genre'];
$publish_year = $_POST['publish_year'];
$copies_ava = $_POST['copies_ava'];

// Corrected SQL query to exclude setting the `id` field in the SET clause
$qry = "UPDATE book SET Title = '$Title', Author = '$Author', genre = '$genre', publish_year = '$publish_year', copies_ava = '$copies_ava' WHERE id = $id";

$res = mysqli_query($db_conn, $qry);

if ($res == true) {
    header('location:fetch.php');
} else {
    echo "Your Data Is Not Updated";
}

mysqli_close($db_conn);

?>
