<?php 
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<script type='text/javascript'>
	$(document).ready(function(){
		$('#contacts_box').fadeOut('slow');
		/*$('#main_contacts').fadeIn('slow');*/
	});
</script>
<script src='<?php echo SITE_JS;?>feedBackForm.js'></script>
<div class='content_field'>
	<div class='rounded' id='main_contacts'>
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
			<div class='feedback_form'>
				<hr />
				<h2>Можете да използвате формата за пряк контакт </h2>
				<span class='info'>полетета означени със <span class='red'>*</span> са задължителни!</span><br />
				<img class='mail right' src='<?php echo SITE_IMG;?>mail.png' />
				<span id='result_msg'></span><br />
				<form id='contact_form'>
					<label id='label_name' for='name'>Вашето име <span class='red'>*</span> : </label><br />
					<input type='text' id='name' name='name' class='mandatory' /><br />
					<label id='label_mail' for='mail'>E-mail : </label><br />
					<input type='text' id='mail' name='mail' /><br />
					<label id='label_phone' for='phone'>Телефон за обратна връзка <span class='red'>*</span> : </label><br />
					<input type='text' id='phone' name='phone' class='mandatory' /><br />
					<div class='hidden'>
						<input type='text' id='check' name='check' value='' />
					</div>
					<label id='label_msg' for='msg'>Вашето запитване : <span class='red'>*</span> : </label><br />
					<textarea id='msg' name='msg' rows='10' class='mandatory'></textarea><br />
					<a class='button' href='javascript:void(0)' onclick='submitForm(this)'>Изпрати</a>
					<a class='button right' href='javascript:void(0)' onclick='resetForm(this)'>Изчисти полетата</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");?>