<?php

include('config.php');
$exist = array();
if(isset($_POST['submit']))
{
	$skills = $_POST['key'];
	$data = explode(',', $skills);

	foreach($data as $value )
	{
		echo $value.':<br>';
		$search = "SELECT id FROM skills WHERE skill_name= '$value'";
		$search_query = mysqli_query($conn,$search) or die(mysqli_error($conn));
		
		while($search_fetch = mysqli_fetch_array($search_query))
		{
			$sear = $search_fetch['id'];
			$size = count($exist);
			if($size <= 0)
			{
				$exist[0] = $sear;
				echo $exist[0].'<br>';
			}
			else
			{
				for($i=0;$i<=$size;$i++)
				{
					if($exist[$i] == $sear)
					{
						echo $exist[$i].'<br>';
					}
					else
					{
						$exist[] = $sear;
					}
				}
			}
		}

	}
	echo '<br>exist<br>';
		foreach($exist as $val)
			{
				echo $val;
			}
}
?>
