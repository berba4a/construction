<?php
$doc_root="D:/SERVER/htdocs/construction/";//"C:/xampp/htdocs/web/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
header("location:".SITE_ROOT."pages/");
?>