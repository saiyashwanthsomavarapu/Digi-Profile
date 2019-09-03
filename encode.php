<?php 

$string = 'Encoding'; 

$encoded = str_rot13($string);
echo $encoded;

$decode = str_rot13(str_rot13($string));

echo $decode;

?>