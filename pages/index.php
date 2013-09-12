<?php 
//$doc_root="D:/SERVER/htdocs/construction/";
$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<div class='content_field'>
	<div class='rounded'>
		<div class='rounded_header'>
			<h1>За фирмата</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>about.jpg' />
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
			</p>
			<p class='content_footer right'>
				<a href='#'><img src='<?php echo SITE_IMG;?>yt.png' border='0' />Гледай видеото&nbsp; </a>
			</p>
			<div class='clear'></div>
		</div>
	</div>
	<div class='rounded small first'>
		<div class='rounded_header'>
			<h1>Ремонти</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>construction-lit_inset.png' />
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum est laborum.
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#repairs'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>Строителство</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>construction_image.jpg' />
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum est laborum.
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#construction'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>Хамалски услуги</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>MOVER.gif' />
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id .
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#moving'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='clear'></div>
</div>
<?php include_once("includes/footer.php");?>