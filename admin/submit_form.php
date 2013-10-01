<?php 
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/DBMYSQL.class.php");

$db = new DBMYSQL(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$prKey = $db->getPrKey('galleries');
$name="";
$description = "";
$allowed_mime = array("image/gif","image/jpeg","image/pjpeg","image/png","image/svg+xml","image/tiff");

if(isset($_POST['name'])&&""!=trim($_POST['name']))
	$name = $db->escapeString($_POST['name']);
if(isset($_POST['description'])&&""!=trim($_POST['description']))
	$description = $db->escapeString($_POST['description']);
	
if(isset($_POST[$prKey])&&$_POST[$prKey]>0)
	$query = "UPDATE galleries set `name`= '".$name."',`description`='".$description."' WHERE ".$prKey."=".$_POST[$prKey]." ";
else
	$query = "INSERT INTO galleries (`name`,`description`) values ('".$name."','".$description."')";
	
$err="";

$db->query('START TRANSACTION;');
$gal_result = $db->query($query);
if($gal_result==1)
{
	$new_galID = $db->getLastInsertedId();
	foreach($_FILES['image']['name'] as $key=>$arr)
	{
		echo "<br />-------".$key."------<br />";
		echo $_FILES['image']['name'][$key]." name<br />";
		echo $_FILES['image']['tmp_name'][$key]." tmp_name<br />";
		echo $_FILES['image']['size'][$key]." Size<br />";
		echo $_FILES['image']['type'][$key]." Type <br />";
		echo $_FILES['image']['error'][$key]." Error<br />";
		echo "<br />---------------<br />";
		if($_FILES['image']['error'][$key]!=UPLOAD_ERR_NO_FILE)
		{
			try
			{
				if($_FILES['image']['error'][$key]!=UPLOAD_ERR_OK)
				{
					throw new Exception("Upload error :". $_FILES['image']['error'][$key]);
				}
				if (count($allowed_mime)>0 && !in_array($_FILES['image']['type'][$key],$allowed_mime))
				{
					throw new Exception("File type error : ".$_FILES['image']['type'][$key].". Allowed types : ".implode(';',$allowed_mime));
				}
			}
			catch (Exception $e)
			{	
				$err = $e->getMessage();
				header("location:".$_SERVER['HTTP_REFERER']."&err=".$err);
			}
				
			if(!isset($err)||empty($err))
			{
				$destination = DOC_ROOT."gallery".SEP."gallery_".$new_galID.SEP;
				$dir_path = "gallery".DIR_SEP."gallery_".$new_galID.DIR_SEP;
				try
				{
					createDirectory($destination);
				}
				catch(Exception $e)
				{
					$err = "".$e->getMessage();
					header("location:".$_SERVER['HTTP_REFERER']."&err=".$err);
				}
			}
		}
	}
	$db->commit();
}
else
{
	$db->rollback();
	$err = "Грешка при запис създаване на галерия";
	echo $err;
}	


function createDirectory($dest)
{
	if(!is_dir($dest))
	{
		$r = mkdir ( $dest, 0755 ,true);
		if(!$r)
			throw new Exception("function mkdirreturned false while trying to created dir $dest");
	}
}	
?>