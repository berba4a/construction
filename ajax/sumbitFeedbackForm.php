<?php 
	if(!isset($_POST['check'])||""==$_POST['check'])
	{
		$res = mail('ass','test','test message');
		if($res)
			echo "Mail sent";
		else
			echo "Mail sending error";
	}
?>