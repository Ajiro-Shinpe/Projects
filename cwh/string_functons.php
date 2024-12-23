<?php
// string functions 
$name = "paplu taplu";
echo $name;
echo '<br>';
echo "the length of string is : " . strlen($name);// to count string length
echo '<br>';
echo "the total no of words in string is : " . str_word_count($name);// to count words in string
echo '<br>';
echo "the reverse of strig is" . strrev($name); // to reverse string
echo '<br>';
echo strpos($name,'u');// to search position/index string
echo '<br>';
echo str_replace("taplu","chaplu",$name);// to replace string
echo '<br>';
echo str_repeat($name,10);// to repeat string
echo '<br>';
echo '<pre>';
echo rtrim("         this is trim          "); // right trim - remove whitespace from right
echo '<br>';
echo ltrim("         this is trim          ");// left trim - remove whitespace from left
echo '</pre>';

?>