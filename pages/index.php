<?php 
$doc_root="C:/xampp/htdocs/web/";//"D:/SERVER/htdocs/web/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Construction site</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="<?php echo SITE_CSS;?>main.css" type="text/css" />
<link type="text/css" href="<?php echo SITE_CSS;?>menu.css" rel="stylesheet" />

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<!--script type="text/javascript" src="<!--?php echo SITE_JS;?>menu.js"></script-->
</head>
<body>
	<!--facebook implementation-->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) 
		{
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/bg_BG/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!--End facebook-->
	
	<div class='main_wrapper'>
		<div class='main_band'>
			<div class='logo_field'>
				<a href='#'><img src='<?php echo SITE_IMG;?>logo.png' border='0' /></a>
			</div>
			<div class='menu_field'>
				<ul>
					<li class='selected'><a href='#' >начало</a></li>
					<li><a href='#' >услуги</a></li>
					<li><a href='#' >за нас</a></li>
					<li><a href='#' >галерия</a></li>
					<li><a href='#' >контакти</a></li>
				</ul>
			</div>
			<div class='clear'></div>
		</div>
		<div class='empty_space'>
			<img src='<?php echo SITE_IMG;?>const.jpg' />
		</div>
		<div class='content_wrapper'>
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
							<a href='#'>&raquo; Вижте повече за услугата</a>
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
							<a href='#'>&raquo; Вижте повече за услугата</a>
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
							<a href='#'>&raquo; Вижте повече за услугата</a>
						</p>
					</div>
				</div>
				<div class='clear'></div>
			</div>
			<div class='rightside_bar'>
				<div class='rounded'>
					<div class='rounded_header'>
						<h1>контакти</h1>
					</div>
					<div class='rounded_content'>
						<p class='contacts'>
							<img src='<?php echo SITE_IMG;?>contact_us_logo.png' />
							<b>Телефон:</b>+359 38 662 287<br />
							<b>GSM(vivacom)</b>: +359 878 111 222<br />
							<b>GSM(globul):</b> +359 898 111 222<br />
							<b>GSM(mtel):</b> +359 0888 111 111<br />
							<b>e-mail:</b> <a href='mailto:construction@construction.com' >construction@construction.com</a><br />
							<b>web page: </b><a href='webpage.com' >webpage.com</a><br />
							<b>адрес: </b>гр.Хасково ,ул."Георги Кирков" 14 , вх.А , ет.1 , ап.15<br />
						</p>
						<p class='content_footer'>
							За повече посробности посетете рубриката <a href='#'>&raquo; контакти</a>
						</p>
					</div>
				</div>
				<div class='rounded'>
					<div class='rounded_header face'>
						<img src='<?php echo SITE_IMG;?>fb_logo.png' width='130' />
					</div>
					<div class='rounded_content'>
						<div class="fb-like-box" data-href="https://www.facebook.com/vicove?hc_location=stream" data-width="241" data-show-faces="true" data-header="true" data-stream="true" data-show-border="false"></div>
					</div>
				</div>
			</div>
			<div class='clear'></div>
		</div><!--End content wrapper-->
		<div class='main_band footer'>
			<p>&copy; Copyright all rights reserved - 2013 - Website.com<span class='counter'><img src='<?php echo SITE_IMG;?>logotype.png' width='40'/></span></p>
		</div>
	</div><!--End main wrapper-->
</body>
</html>