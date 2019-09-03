<?php
include('config.php');

$sql = "SELECT count(*) FROM register";
$sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$sql_count = mysqli_num_rows($sql_query);
echo $sql_count;

$sql1 = "SELECT count(skill_name) FROM skills WHERE skill_name = 'c++'";
$sql1_query = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
$sql1_count = mysqli_num_rows($sql1_query);

$sql2 = "SELECT count(skill_name) FROM skills WHERE skill_name = 'cisco'";
$sql2_query = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
$sql2_count = mysqli_num_rows($sql2_query);

$sql3 = "SELECT count(skill_name) FROM skills WHERE skill_name = 'salesforce'";
$sql3_query = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
$sql3_count = mysqli_num_rows($sql3_query);

$sql4 = "SELECT count(skill_name) FROM skills WHERE skill_name = 'android'";
$sql4_query = mysqli_query($conn,$sql4) or die(mysqli_error($conn));
$sql4_count = mysqli_num_rows($sql4_query);

$sql5 = "SELECT count(skill_name) FROM skills WHERE skill_name = ''";
$sql5_query = mysqli_query($conn,$sql5) or die(mysqli_error($conn));
$sql5_count = mysqli_num_rows($sql5_query);
?>