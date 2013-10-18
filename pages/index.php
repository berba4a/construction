<?php 
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
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
				За успешната реализация на нашите проекти използваме качествени материали, професионални машини и инструменти. Разполагаме с екип от двадесет квалифицирани строителни работници, благодарение на които изпълняваме в срок строително - ремонтните дейности. Услугите, които предлагаме дават на нашите клиенти спокойствие и свободно време. Освен с ремонта на вашето жилище ние се занимаваме и с пазаруването и доставката на всички материали на най-добри цени и качество. Предлагаме безплатен оглед и индивидуален проект. Нашите дизайнери могат да ви консултират за изграждане на интериора и за цялостния облик на вашето жилище. Изготвяме договор за изпълнение, в който подробно са описани всички операции, уточнени са цените и е фиксиран крайният срок за предаване на обекта. Предлагаме и комплексно професинално почистване на ниски цени, както и абонаментни програми с отстъпки.
			</p>
			<p class='content_footer right'>
				<a href='<?php echo SITE_ROOT;?>pages/aboutus.php'><!--img src='<!--?php echo SITE_IMG;?>yt.png' border='0' /-->&raquo; Виж повече за нас</a>
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
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#repairs'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>транспорт</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>construction_image.jpg' />
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#transportation'>&raquo; Вижте повече за услугата</a>
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
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#moving'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='clear'></div>
	<div class='rounded small first'>
		<div class='rounded_header'>
			<h1>Кърти чисти извозва</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>MOVER.gif' />
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#breaks'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>Трансфери</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>MOVER.gif' />
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#transphers'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>строителство</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>MOVER.gif' />
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php#construction'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='clear'></div>
</div>
<?php include_once("includes/footer.php");?>