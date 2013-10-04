<?php 
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<script src="<?php echo SITE_JS;?>lightbox-2.6.min.js"></script>
<script src="<?php echo SITE_JS;?>openClosePanels.js"></script>
<div class='content_field'>
<?php include_once('includes/gallery_listing.php');?>
</div>
<?php include_once("includes/footer.php");?>