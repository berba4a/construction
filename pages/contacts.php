<?php 
//$doc_root="D:/SERVER/htdocs/construction/";
$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<script type='text/javascript'>
	$(document).ready(function(){
		$('#contacts_box').slideUp('slow');
	});
</script>
<div class='content_field'>
	<div class='rounded'>
		<div class='rounded_header'>
			<h1>контакти</h1>
		</div>
		<div class='rounded_content'>
			<p class='contacts_big'>
				<img src='<?php echo SITE_IMG;?>contact_us_logo.png' />
				<b>Телефон:</b>+359 38 662 287<br />
				<b>GSM(vivacom)</b>: +359 878 111 222<br />
				<b>GSM(globul):</b> +359 898 111 222<br />
				<b>GSM(mtel):</b> +359 0888 111 111<br />
				<b>e-mail:</b> <a href='mailto:construction@construction.com' >construction@construction.com</a><br />
				<b>web page: </b><a href='webpage.com' >webpage.com</a><br />
				<b>адрес: </b>гр.Хасково ,ул."Георги Кирков" 14 , вх.А , ет.1 , ап.15<br />
			</p>
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");?>