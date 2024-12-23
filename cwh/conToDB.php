<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'cwh';

$conn = mysqli_connect($server, $username ,$password,$db);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}else{
    echo "Connected successfully";
}
echo "<br>";

//---------------- to create db ----------------

// $sql = "CREATE DATABASE cwh";
// $result = mysqli_query( $conn ,$sql);
// if($result){
//     echo "Database created successfully";
// }
// else{
//     echo "error : --->" . mysqli_error($conn);
// }



//---------------- to create db ----------------

$sql = "CREATE TABLE emp (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) ,
    password VARCHAR(100)
)";

    // $sql = "DROP TABLE emp";

$result = mysqli_query($conn,$sql);
if($result){
    echo "TABLE created successfully";
}
else{
    echo "error ocured while : --->" . mysqli_error($conn);
}

?>