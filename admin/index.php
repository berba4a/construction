<?php
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/DBMYSQL.class.php");
$db = new DBMYSQL(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$prKey = $db->getPrKey('galleries');
$imgPrKey=$db->getPrKey('images');
include_once("admin/includes/header.php");
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
				echo "<tr ".$css." id='row_galleryID_".$row_arr[$prKey]."'>";
					echo "<td align='center'>";
						echo $row_arr[$prKey];
					echo "</td>";
					echo "<td align='left'>";
						echo $row_arr['name'];
					echo "</td>";
					echo "<td align='center'>";
						echo $row_arr['last_updated'];
					echo "</td>";
					echo "<td align='center'>";
						echo "<a href='".$_SERVER['PHP_SELF']."?form=1&".$prKey."=".$row_arr[$prKey]."'>";
							echo "<img class='button' src='".SITE_IMG."edit.png' title='Редакция' alt='Редакция' border='0' />";
						echo "</a>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<img class='button delete' id='".$prKey."_".$row_arr[$prKey]."' src='".SITE_IMG."del.png' title='Изтрии' alt='Изтрии' />";
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
		if(isset($_GET[$prKey])&&$_GET[$prKey]>0)
		{
			$galleryID = $_GET[$prKey];
			$row_arr = $db->getById($galleryID,'galleries');
			$gal_name = $row_arr['name'];
			$gal_descr=$row_arr['description'];
		
			$form_header ="Редакция на галерия <span class='red'>\"".$gal_name."\"</span>";
		}
		echo "<h1>".$form_header."</h1>";
		
		if(isset($_GET['err'])&&""!=$_GET['err'])
			echo "<span class='red'>".$_GET['err']."</span>";
		echo "<div class='form'>";
			echo "<form action='submit_form.php' enctype='multipart/form-data' method='POST'>";
				echo "<label for='name' id='name'>Име на галерията : <span class='red'>*</span></label><br />";
				echo "<input size='100' type='text' name='name' id='name' value='".$gal_name."' /><br /><br /><br />";
				echo "<label for='description' id='description'>Описание на галерията : </label><br />";
				echo "<textarea name='description' id='description' cols='80' rows='10'>".$gal_descr."</textarea><br /><br />";
				echo "<fieldset>";
					echo "<legend>Снимки : <a class='add_photos' href='javascript:void(0);'><img src='".SITE_IMG."file_add.png' width='14' border='0' alt='Добави галерия' title='Добави галерия' />&nbsp;Добави полета</a>&nbsp;</legend>";
					echo "<div class='image_box'>";
						echo "<input type='file' name='image[]' id='image_1' />";
						echo "<div id='prew_image_1'></div>";
					echo "</div>";
					if($galleryID>0)
					{
						$img_q = "SELECT * FROM images WHERE galleryID=".$galleryID." ";
						$img_stmt = $db->query($img_q);
						$img_cnt=0;
						echo "<div class='clear'></div>";
						while($img_arr = $db->fetchArray($img_stmt))
						{
							$img_cnt++;
							echo "<div class='image_box_prev'>";
								echo $img_arr['name']."<br />";
								echo "<img src='".SITE_ROOT.$img_arr['dir_path'].$img_arr['name']."' />";
								echo "<a href='javascript:void(0)' id='".$imgPrKey."_".$img_arr[$imgPrKey]."' class='delImg'>Изтрии тази снимка</a>";
							echo "</div>";
						}
						if($img_cnt==0)
							echo "<div>В тази галерия няма качени снимки</div>";
							
					}
					
				echo "</fieldset>";
				echo "<input type='hidden' name=".$prKey." value='".$galleryID."' />";
				echo "<input type='submit' value='Запази' />";
			echo "</form>";
		echo "</div>";
	}	
?>
		</div>
	</body>
</html>