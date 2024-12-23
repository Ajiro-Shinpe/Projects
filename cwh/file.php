<?php
//it read all files data and print it1 even html
// readfile('bbg.txt');

//it open a file
// fopen("file name", "mode")  
/*
r = read only
r+ = read and wri'te only
w = wri'te only
w+ = read and wri'te only
a = apend add new data in the end of file

fread(file path or variable, length)
filesize()  it give length of file and its size like 2mb
fclose(variale) to close
*/

// ----------------- read  ---------


// $myfile = fopen("bbg.txt", "r") or die("Unable to open file!");
// $content = fread($myfile, filesize('bbg.txt'));
// fclose($myfile);
// echo $content;



// fgets() print line by line
// $myfile = fopen("bbg.txt", "r") or die("Unable to open file!");
// $content = fgets($myfile);
// echo $content;

// $myfile = fopen("bbg.txt", "r") or die("Unable to open file!");
// while($a = fgets($myfile)){
//     echo $a;
// }



// // fgetc() print charactor by charactor
// $myfile = fopen("bbg.txt", "r") or die("Unable to open file!");
// $content = fgetc($myfile);
// echo $content;

// $myfile = fopen("bbg.txt", "r") or die("Unable to open file!");
// while($a = fgetc($myfile)){
//     echo $a;
// }

// write

// $myfile = fopen("bbg2.txt", "w") or die("Unable to open file!");
// $content = fwrite($myfile,"blah blah blah blah \n");
// fwrite($myfile,"blah blah blah blah bbg bbg \n");


// apend

$myfile = fopen("bbg2.txt", "a") or die("Unable to open file!");
$content = fwrite($myfile,"apending blah blah blah blah \n");
fwrite($myfile,"apending blah blah blah blah bbg bbg \n");


fclose($myfile);
?>