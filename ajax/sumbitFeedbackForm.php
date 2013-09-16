<?php 
	if(!isset($_POST['check'])||""==$_POST['check'])
	{
		if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
			echo "This ($email_a) email address is considered valid.";
}
	}
?>