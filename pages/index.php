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
			<h1>
				<a href='<?php echo SITE_ROOT;?>pages/aboutus.php'>За фирмата</a>
			</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<a href='<?php echo SITE_ROOT;?>pages/aboutus.php'>
					<img src='<?php echo SITE_IMG;?>about.jpg' border='0' />
				</a>
				Фирма „Бултранс 86” е създадена 2011г!Дейността,която развиваме предимно е свързана в сверата на услугите!  За успешната реализация на нашите проекти използваме качествени материали, професионални машини и инструменти. Разполагаме с екип от квалифицирани работници, благодарение на които изпълняваме в срок.ангажиментите,възложени от ваз нашите клиенти! Услугите, които предлагаме ви дават спокойствие и свободно време. Освен с ремонта на вашето жилище ние се занимаваме и с пазаруването и доставката на всички материали на най-добри цени и качество. Предлагаме безплатен оглед и индивидуален проект. Нашите дизайнери могат да ви консултират за изграждане на интериора и за цялостния облик на вашето жилище. Изготвяме договор за изпълнение, в който подробно са описани всички операции, уточнени са цените и е фиксиран крайният срок за предаване на обекта. Предлагаме и комплексно професинално почистване на ниски цени, както и абонаментни програми с отстъпки.
			</p>
			<p class='content_footer right'>
				<a href='<?php echo SITE_ROOT;?>pages/aboutus.php'><!--img src='<!--?php echo SITE_IMG;?>yt.png' border='0' /-->&raquo; Виж повече за нас</a>
			</p>
			<div class='clear'></div>
		</div>
	</div>
	<div class='rounded small first'>
		<div class='rounded_header'>
			<h1>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=repairs#content_wr'>Ремонти</a>
			</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=repairs#content_wr'>
					<img src='<?php echo SITE_IMG;?>construction-lit_inset.png' border='0' />
				</a>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=repairs#content_wr'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=windows#content_wr'#content_wr>дограми</a>
			</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=windows#content_wr'>
					<img src='<?php echo SITE_IMG;?>dogrami.jpeg' border='0' />
				</a>
				Алуминиевите и пвц прозорци и врати предлагани от нас се отличава с много високо качество.Това се дължи на профилите, които сме избрали при производството.Те са на утвърдени марки, които се характеризират с иновации и качество в сферата на производство на прозорци и врати.
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=windows#content_wr'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=breaks#content_wr'>Кърти чисти извозва</a>
			</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=breaks#content_wr'>
					<img src='<?php echo SITE_IMG;?>MOVER.gif' border='0' />
				</a>
				Къртене на бетон , тухли , фаянс и теракот , мазилка , замазка и мозайка. на блажна боя от помещения. Почистване на помещения след строително монтажни работи . Извозване на строителни и битови отпадъци .
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=breaks#content_wr'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='clear'></div>
	<div class='rounded small first'>
		<div class='rounded_header'>
			<h1>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=moving#content_wr'>Хамалски услуги</a>
			</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=moving#content_wr'>
					<img src='<?php echo SITE_IMG;?>MOVER.gif' border='0' />
				</a>
				Хамали без почивен ден . Товарене , превозване , разтоварване , пренасяне , качване и сваляне по стълби на строителни материали , мебели , техника , багаж, покъщнина , дърва , въглища , строителни и битови отпадъци и други. 
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=moving#content_wr'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=transportation#content_wr'>транспорт</a>
			</h1>
				
		</div>
		<div class='rounded_content'>
			<p>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=transportation#content_wr'>
					<img src='<?php echo SITE_IMG;?>construction_image.jpg' border='0' />
				</a>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=transportation#content_wr'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>	
	<div class='rounded small'>
		<div class='rounded_header'>
			<h1>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=transphers#content_wr'>Трансфери</a>
			</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=transphers#content_wr'>
					<img src='<?php echo SITE_IMG;?>MOVER.gif' border='0' />
				</a>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			</p>
			<p class='content_footer'>
				<a href='<?php echo SITE_ROOT;?>pages/services.php?service=transphers#content_wr'>&raquo; Вижте повече за услугата</a>
			</p>
		</div>
	</div>
	<div class='clear'></div>
</div>
<?php include_once("includes/footer.php");?>