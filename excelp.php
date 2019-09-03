<?php
include('config.php');
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=spreadsheet.xls" );
if(isset($_POST['key']))
{
    $key = $_POST['key'];
    $key_search = "SELECT * FROM skills WHERE skill_name='$key'";
    $key_query  = mysqli_query($conn,$key_search) or die(mysqli_error($conn));
	echo 'Rollno'."\t\t".'Name'."\t\t".'College'."\t\t".'Branch'."\t\t".'Year'."\t\t".'Email'."\t\t".'Contact'."\n";
    while($key_fetch = mysqli_fetch_array($key_query))
    {
        $key_id =  $key_fetch['id'];
        $sql = "SELECT * FROM register WHERE id='$key_id'";
        $sql_query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $sql_fetch = mysqli_num_rows($sql_query);
        $rows = mysqli_fetch_array($sql_query);
		echo $rows["id"]."\t\t".$rows["first_name"].' '.$rows["last_name"]."\t\t".$rows["college_name"]."\t\t".$rows["branch"]."\t\t".$rows["academy_year"]."\t\t".$rows["email"]."\t\t".$rows["phone"]."\n";		
	}
}
?>