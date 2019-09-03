<?php

include('config.php');


$sql = "SELECT * FROM register";
$sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));

$sql_fetch = mysqli_num_rows($sql_query);

echo $sql_fetch;
?>