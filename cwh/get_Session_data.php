<?php

session_start();
if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];
    $cat = $_SESSION['cat'];
    
    echo "hi $username your fav anime categories is $cat";
    
}else{
    echo " please set it "; 
}

?>