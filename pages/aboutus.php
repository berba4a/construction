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
			<div class='video'>
				<iframe width="600" height="338" src="//www.youtube.com/embed/FQvFzdFIp08" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");?>