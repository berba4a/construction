<?php
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/DBMYSQL.class.php");
$db = new DBMYSQL(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$prKey=$db->getPrKey('galleries');
$err_cnt = array();
if(isset($_GET[$prKey])&&$_GET[$prKey]>0)
{
	$galleryID = $_GET[$prKey];
	$db->query('START TRANSACTION;');
	$res = $db->query(" DELETE FROM galleries WHERE ".$prKey." = ".$galleryID." ");
	if($res==1)
	{
		$gal_dir = DOC_ROOT."gallery".SEP."gallery_".$galleryID.SEP;
		if($handle = opendir($gal_dir))
		{
			while(false !== ($file = readdir($handle)))
			{
				if(is_file($gal_dir.$file))
				{
					$file_res = unlink($gal_dir.$file);
					if(!$file_res)
						$err_cnt[$file] = false;
				}
			}
			closedir($handle);
			if(count($err_cnt)==0)
			{
				if(rmdir($gal_dir))
				{
					$db->commit();
					echo "Галерията е изтрита успешно!";
				}
				else
				{
					$db->rollback();
					echo "Грешка при изтриването на папката на галерията ";
				}
			}
			else
			{
				$db->rollback();
				foreach ($err_cnt as $fliename=>$val)
				{
					echo "Прешка при изтривне на файла : ".$filename."<br />";
				}
			}
		}
		else
		{
			$db->rollback();
			echo "Грешка при отваряне на директорията на галерията";
		}
	}
	else
	{
		$db->rollback();
		echo "Грешка при изтриването на галерията от базата данни !";
	}
}
else
	echo "ERROR : wrong galleryID";
?>