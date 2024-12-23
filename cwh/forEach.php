<?php
echo "<h1>for each loop</h1>";

//  it print all alues in array 1 by 1


$array = array("goku", "vegita","gohan","trunks","broly","goten","piccalo") ;

for ($i=0; $i < count($array) ; $i++) { 
    print $array[$i] . "<br>";
}

// $array = array("goku", "vegita","gohan","trunks","broly","goten","piccalo") ;
// foreach($array as $n){
//     echo $n . "<br>";
// }

?>