<?php
include_once("includes/DBMYSQL.class.php");
$db = new DBMYSQL(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$prKey = $db->getPrKey('galleries');
//$imgPrkKey = $db->getPrKey('images');
$query = "SELECT * FROM galleries ";
$stmt = $db->query($query);
while($row_arr = $db->fetchArray($stmt))
{
	echo "<div class='rounded'>";
		echo "<div class='rounded_header closable'>";
			echo "<h1>".$row_arr['name']."<span class='open_close_arrow right'><i class='icon-angle-up'></i></span></h1>";
		echo "</div>";
		echo "<div class='rounded_content'>";
			echo "<p>".$row_arr['description']."</p>";
			echo "<div class='image-row'>";
				echo "<div class='image-set images_list'>";
				$img_query = "SELECT * FROM images WHERE ".$prKey." = ".$row_arr[$prKey]." ";
				$img_stmt = $db->query($img_query);
				$img_cnt=0;
				while($img_arr = $db->fetchArray($img_stmt))
				{
					$img_cnt++;
					echo "<a class='image_link' href='".SITE_ROOT.$img_arr['dir_path'].$img_arr['name']."' data-lightbox='gallery_".$row_arr[$prKey]."' title='".$row_arr['name']."'>
						<img class='gallery_image' src='".SITE_ROOT.$img_arr['dir_path'].$img_arr['name']."' alt='Снимка ".$img_cnt."' />
					</a>";
				}
				if($img_cnt==0)
					echo "Няма снимки в галерията";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
}
?>