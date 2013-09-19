<?php 
	if(!isset($_POST['check'])||""==$_POST['check'])
	{
		$to = "berba4a@abv.bg";
		$values = array(
			'name'=>'',
			'phone'=>'',
			'mail'=>'',
			'msg'=>''
		);
		foreach($values as $key=>$value)
		{
			if(isset($_POST[$key])&&""!=$_POST[$key])
				$values[$key] = $_POST[$key];
			else
			{
				if($key!='mail')
				{
					echo "Empty ".$key." field";
					exit;
				}
			}
		}
		$subject = "Запитване от website.com";
		$newsubject='=?UTF-8?B?'.base64_encode($subject).'?=';
		$sender_mail="";
		if($values['mail']!='')
			$sender_mail = "< ".$values['mail']." >";
		
		$headers  = "From: ".$values['name'].$sender_mail."\r\n";
		$headers .= "X-Sender: ".$values['name'].$sender_mail."\r\n";
		$headers .= "Reply-To: ".$values['mail']." \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8 \r\n";
		$message="<html>";
			$message .="<body>";
				$message .="<b>Запитване изпратено от : </b> ".$values['name']."<br />";
				$message .="<b>Телефон за контакт : </b> ".$values['phone']."<br />";
				if($values['mail']!='')
				{
					$message .=" <b>e-mail : </b><a href='mailto:".$values['mail']."'>".$values['mail']."</a><br />";
				}
				$message .="<b>Съобщение : </b> ".$values['msg'];
			$message .="</body>";
		$message .="</html>";
		$res = mail($to,$newsubject,$message,$headers);
		if($res)
			echo "Вашето съобщение беше изпратено успешно!";
		else
			echo "Съобщението не е изпратено поради технически причини.Моля опитайте по-късно или се свържете с нас на e-mail <a href='mailto:".$to."' >".$to."</a>";
	}
?>