<?php
echo "<h1>functions </h1> <br>";

//  help to short end  the code and resue it

function calculateMarks($MarksArray){
    $sum = 0;
    foreach ($MarksArray as $value) {
        $sum += $value;
    }
    return $sum;
}

function avgmarks($MarksArray){
    $sum =0;
    $i = 0;
    foreach ($MarksArray as $value) {
        $sum += $value;
        $i++;
    }
    return $sum/$i;
    
}
$adil = [90, 85, 95, 92, 88]; 
// $total = calculateMarks($adil);
$total = avgmarks($adil);

echo $total;

?>