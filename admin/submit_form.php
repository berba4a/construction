<?php 
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/DBMYSQL.class.php");
include_once("admin/includes/header.php");
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
echo "<div class='right_btn btn'>
		<a class='button' href='".SITE_URL.SITE_ROOT."admin'>&laquo;&nbsp;Назад към списъка с галерии</a>
	</div>";
echo "<div class='clear'></div>";
echo "<div class='results'>";
echo "<h2>Записа завършен - резултати :</h2>";
$db->query('START TRANSACTION;');
$gal_result = $db->query($query);
if($gal_result==1)
{
	$galID = $db->getLastInsertedId();
	if(isset($_POST[$prKey])&&$_POST[$prKey]>0)
		$galID = $_POST[$prKey];
	$img_cnt=0;
	$img_err = 0;
	$destination = DOC_ROOT."gallery".SEP."gallery_".$galID.SEP;
	$dir_path = "gallery".DIR_SEP."gallery_".$galID.DIR_SEP;
	try
	{
		createDirectory($destination);
	}
	catch(Exception $e)
	{
		$err = "".$e->getMessage();
		$db->rollback();
		echo "<span class='red'>ERROR : Грешка при създаването на папка за галерията</span><br />";
	}
	if(!isset($err)||""==$err)
	{
		$db->commit();
		echo "<br /><span class='result_gallery'>Галерия <b>".$name."</b> е запазена успешно</span><br />";
		foreach($_FILES['image']['name'] as $key=>$arr)
		{
			$img_cnt++;
			$images_err="";
			if($_FILES['image']['error'][$key]!=UPLOAD_ERR_NO_FILE)
			{
				try
				{
					if($_FILES['image']['error'][$key]!=UPLOAD_ERR_OK)
					{
						throw new Exception("<br /><span class='red'>Грешка при качване на :". $_FILES['image']['error'][$key]." на файл ".$_FILES['image']['name'][$key]."</span><br />");
					}
					if (count($allowed_mime)>0 && !in_array($_FILES['image']['type'][$key],$allowed_mime))
					{
						throw new Exception("<br /><span class='red'>ERROR : Грешен тип файл на файл <b>".$_FILES['image']['name'][$key]."</b>: ".$_FILES['image']['type'][$key].".</span><br /> Разрешени типове : ".implode(';',$allowed_mime)."<br />");
					}
				}
				catch (Exception $e)
				{	
					$images_err = $e->getMessage();
					echo $images_err;
				}
					
				if(!isset($images_err)||empty($images_err))
				{					
					$ext = explode('.',strtolower($_FILES['image']['name'][$key]));
					$ext = $ext[count($ext)-1];
					
					$new_name = "".$galID."_".$img_cnt."_".date('Ymd').".".$ext."";
					
					$img_query = "INSERT INTO images (".$prKey.",name,dir_path,file_name) values ('".$galID."','".$new_name."','".$dir_path."','".$_FILES['image']['name'][$key]."')";
					
					$db->query('START TRANSACTION;');
					$img_res = $db->query($img_query);
					if($img_res==1)
					{
						if(move_uploaded_file($_FILES['image']['tmp_name'][$key],$destination.$new_name))
						{
							$db->commit();
							echo "<br />".$new_name." Запазен успешно<br />";
						}
						else
						{
							$db->rollback();
							echo "<br />Грешка при запис на файл  ".$_FILES['image']['name'][$key]." във файловата система <br />";
						}
					}
					else
					{
						$db->rollback();
						echo "<br />Грешка при запис на ".$_FILES['image']['name'][$key]." в базата данни<br />";
					}
				}
			}
		}	
	}
}
else
{
	$db->rollback();
	$err = "<br />Грешка при запис създаване на галерия<br />";
	echo $err;
}	
?>
		</div>
		</div>
	</body>
</html>
 
<?php
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