<?php
echo "<h1>multi imentional  array</h1>";
//  array in array or nested arrary

// 2D array

// $array = array(
//     array(1,2,3,4,5,6,7,8,9),
//     array(5,6,7,8,6,7,8,9),
//     array(1,2,3,4,6,7,8,9),
//     array(1,2,3,4,6,7,8,9,10),
//     array(1,2,3,4,6,7,8,9),
//     array(1,2,3,4,6,7,8,9),
//     array(1,2,3,4,6,7,8,9)
// );
// for ($i=0; $i < count($array); $i++) { 
//     for ($j=0; $j < count($array[$i]); $j++) { 
//         echo $array[$i][$j] . " ";
//     }
//     echo "<br>";
// }

$array = array(
    array(1,2,3,4,5,6,7,8,9),
    array(1,2,3,4,6,7,8,9),
    array(
        array(1,2,8)
    )
);

for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        // Check if the element is an array or a value
        if (is_array($array[$i][$j])) {
            for ($k = 0; $k < count($array[$i][$j]); $k++) {
                echo $array[$i][$j][$k] . " ";
            }
        } else {
            // If it's a simple value, just print it
            echo $array[$i][$j] . " ";
        }
    }
    echo "<br>";
}

?>