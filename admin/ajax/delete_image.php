<?php
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/DBMYSQL.class.php");
$db = new DBMYSQL(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$imgPrKey=$db->getPrKey('images');
if(isset($_GET[$imgPrKey])&&$_GET[$imgPrKey]>0)
{
	$imageID = $_GET[$imgPrKey];
	$query = "SELECT * FROM images WHERE ".$imgPrKey." = ".$imageID." ";
	$row_obj = $db->fquery($query);
	$dir_path = DOC_ROOT.$row_obj->dir_path;
	$file_name = $row_obj->name;
	$db->query('START TRANSACTION;');
	$res = $db->query(" DELETE FROM images WHERE ".$imgPrKey." = ".$imageID." ");
	if($res==1)
	{
		if(@unlink($dir_path.$file_name))
		{
			$db->commit();
			echo $file_name." Е изтрита успешно!";
		}
		else
		{
			echo "Грешка при изтриване на ".$file_name." от файловата система";
			$db->rollback();
		}
	}
	else
	{
		$db->rollback();
		echo "Грешка при изтриване на записа от базата данни!";
	}
}
else
	echo "ERROR : Wrong imageID!";
?>