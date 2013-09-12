<?php 
$doc_root="D:/SERVER/htdocs/construction/";//"C:/xampp/htdocs/web/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<div class='content_field'>
	<div class='rounded' id='repairs'>
		<div class='rounded_header'>
			<h1>Ремонти</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>construction-lit_inset.png' />
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.  
			</p>
			<p>
				<ul>
					<li>Цени :</li>
					<li>Ремонтна услуга 1 - 100 лева</li>
					<li>Ремонтна услуга 2 - 200 лева</li>
					<li>Ремонтна услуга 3 - 300 лева</li>
					<li>Ремонтна услуга 4 - 400 лева</li>
					<li>Ремонтна услуга 5 - 500 лева</li>
				</ul>
			</p>
		</div>
	</div>
	<div class='rounded' id='construction'>
		<div class='rounded_header'>
			<h1>Строителство</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<p>
				<img src='<?php echo SITE_IMG;?>construction_image.jpg' />
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.  
			</p>
			<p>
				<ul>
					<li>Цени :</li>
					<li>Строителна услуга 1 - 100 лева</li>
					<li>Строителна услуга 2 - 200 лева</li>
					<li>Строителна услуга 3 - 300 лева</li>
					<li>Строителна услуга 4 - 400 лева</li>
					<li>Строителна услуга 5 - 500 лева</li>
				</ul>
			</p>
			</p>
		</div>
	</div>
	<div class='rounded' id='moving'>
		<div class='rounded_header'>
			<h1>Хамалски услуги</h1>
		</div>
		<div class='rounded_content'>
			<p>
				<p>
				<img src='<?php echo SITE_IMG;?>MOVER.gif' />
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.  
			</p>
			<p>
				<ul>
					<li>Цени :</li>
					<li>Хамалска услуга 1 - 100 лева</li>
					<li>Хамалска услуга 2 - 200 лева</li>
					<li>Хамалска услуга 3 - 300 лева</li>
					<li>Хамалска услуга 4 - 400 лева</li>
					<li>Хамалска услуга 5 - 500 лева</li>
				</ul>
			</p>
			</p>
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");?>