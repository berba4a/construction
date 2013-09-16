
<!DOCTYPE html>
<html>
<head>
<title>Construction site</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="<?php echo SITE_CSS;?>lightbox.css" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php echo SITE_CSS;?>main.css" type="text/css" />
<link type="text/css" href="<?php echo SITE_CSS;?>fontello/css/fontello.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_CSS;?>fontello/css/animation.css" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<!--script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script-->
<script type='text/javascript'>
	$(document).ready(function(){
		var currID = "";
		$('#main_menu').children().each(function(){
			currID = $(this).attr('id');
			if(window.location.href.indexOf(currID) > -1)
			{
				$('#'+currID+' a').toggleClass('selected');
			}
			else
			{
				$('#home a').toggleClass('selected');
			}
		});
	});
	$(document).ready(function(){
		$('#main_menu').children().each(function(){
			if(!$(this).children().hasClass('selected'))
			{
				$(this).mouseover(function(){$(this).children().toggleClass('selected');});
				$(this).mouseout(function(){$(this).children().toggleClass('selected');});
			}
		});
	});
</script>
</head>
<body>
	<!--facebook implementation-->
	<div id='fb-root'></div>
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
				<a href='<?php echo SITE_ROOT;?>'><img src='<?php echo SITE_IMG;?>logo.png' border='0' /></a>
			</div>
			<div class='menu_field'>
				<ul id='main_menu'> 
					<li id='home'><a href='<?php echo SITE_ROOT;?>' >начало</a></li>
					<li id='services'><a href='<?php echo SITE_ROOT;?>pages/services.php' >услуги</a></li>
					<li id='aboutus'><a href='<?php echo SITE_ROOT;?>pages/aboutus.php'' >за нас</a></li>
					<li id='gallery'><a href='<?php echo SITE_ROOT;?>pages/gallery.php'' >галерия</a></li>
					<li id='contacts'><a href='<?php echo SITE_ROOT;?>pages/contacts.php'' >контакти</a></li>
				</ul>
			</div>
			<div class='clear'></div>
		</div>
		<div class='empty_space'>
			<img src='<?php echo SITE_IMG;?>const.jpg' />
		</div>
		
		<div class='content_wrapper'>
		<!--End header-->
		