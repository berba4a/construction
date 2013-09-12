<?php 
$doc_root="D:/SERVER/htdocs/construction/";//"C:/xampp/htdocs/web/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<div class='content_field'>
	<div class='rounded'>
		<div class='rounded_header'>
			<h1>Gallery</h1>
		</div>
		<div class='rounded_content'>
			<p>
				Here goes the gallery
			</p>
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");?>