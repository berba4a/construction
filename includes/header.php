
<!DOCTYPE html>
<html>
<head>
<title>Construction site</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="<?php echo SITE_CSS;?>lightbox.css" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php echo SITE_CSS;?>main.css" type="text/css" />
<link type="text/css" href="<?php echo SITE_CSS;?>fontello/css/fontello.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_CSS;?>fontello/css/animation.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_CSS;?>style.css" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="<?php echo SITE_JS;?>jquery.rs.slideshow.min.js"></script>
<!--script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script-->
<!--?php
	$browser = get_browser(null,true);
	echo $browser['browser']."<br />";
	echo $browser['version'];
?-->
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
	$(document).ready(function ()
	{
		$('.rs-slideshow').rsfSlideshow({
			controls: {
				previousSlide: {
					auto: false,    //    auto-generate a "previous slide" control
					//    automatically pause the slideshow when 
					//    this control is clicked
					autostop: true
				},
				nextSlide: {
					auto: true,    //    auto-generate a "next slide" control
					//    automatically pause the slideshow when 
					//    this control is clicked
					autostop: true
				}
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
			<!--img src='<!--?php echo SITE_IMG;?>const.jpg' /-->
			<div id="slideshow" class="rs-slideshow">
				<div class="slide-container">
					<img src="<?php echo SITE_IMG;?>const.jpg" alt="The first image in a slideshow demo." title="This is the first slide" />
				</div>
				<ol class="slides">
					<li>
						<a href="<?php echo SITE_IMG;?>const.jpg" 
							title="This is the first slide"></a>
					</li>
					<li>
						<a href="<?php echo SITE_IMG;?>const2.jpg" 
							title="This is the second slide" 
							data-link-to=""></a>
					</li>
					<li>
						<a href="<?php echo SITE_IMG;?>const3.jpg" 
							title="This is the third slide"></a>
					</li>
				</ol>
			</div>
		</div>
		
		<div class='content_wrapper'>
		<!--End header-->
		