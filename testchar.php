<?php 
$string = "Tqtq afgd dghd fdfghnd fghd ghd gfhdfgdh fghf ";
$string = trim($string);
$array = explode(" ", trim($string));
var_dump($array);
$count = count($array);
var_dump($count);
$lastWordLength = strlen(trim($array[$count-1]));
var_dump($lastWordLength);
$string = substr($string, 0, -$lastWordLength);
var_dump($string);
?>