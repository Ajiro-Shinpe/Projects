<?php
$a= 10; // global variable
echo $a . "<br>";

function variable_local(){
    $a = 50; // local variable
    echo $a; // prints 50

    global $a; // using global keyword to access global variable
    $a = 20; // global variable
    echo $a; // prints 20
}

variable_local();

echo var_dump($GLOBALS);
echo var_dump($GLOBALS['a']);

?>