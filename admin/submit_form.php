<?php 
	foreach($_FILES['image']['name'] as $key=>$arr)
	{
		echo "<br />-------".$key."------<br />";
		echo $_FILES['image']['name'][$key]."<br />";
		echo $_FILES['image']['tmp_name'][$key]."<br />";
		echo $_FILES['image']['size'][$key]."<br />";
		echo $_FILES['image']['type'][$key]."<br />";
		echo $_FILES['image']['error'][$key]."<br />";
		echo "<br />---------------<br />";
	}
?>