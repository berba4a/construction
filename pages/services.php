<?php 
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<script type='text/javascript'>
	$(document).ready(function(){
		$('.content_field .rounded').each(function(){
			var currID = "";
			currID = $(this).attr('id');
			if(window.location.href.indexOf('#'+currID) > -1)
			{
				/*Close not choosen elements*/
				$(this).siblings().each(function()
				{
					$(this).children('.rounded_content').slideToggle('slow',function(){
						$(this).prev().toggleClass('closed');
					});
				});
				/*change the arrow to open close*/
				$(this).siblings().each(function()
				{
					var arrow_obj = $(this).children('.rounded_header').children('h1').children('span.open_close_arrow').children('i');
					if($(arrow_obj).hasClass('icon-angle-up'))
					{
						$(arrow_obj).removeClass('icon-angle-up');
						$(arrow_obj).addClass('icon-angle-down');
					}
					else
					{
						$(arrow_obj).removeClass('icon-angle-down');
						$(arrow_obj).addClass('icon-angle-up');
					}
				});
				//$(window).scrollTop('350');
			}
		});
	});
	
	$(document).ready(function()
	{
		$('.lang_switch').click(function()
		{
			var currID = $(this).attr('id');
			var langCode = currID.substring(5);
			if(langCode=='en')
			{
				//$('#header_bg').slideUp('slow');
				$('#header_bg').css('display','none');
				//$('#header_en').slideDown('slow');
				$('#header_en').css('display','block');
				//$('.paragraph_bg').slideUp('slow');
				$('.paragraph_bg').css('display','none');
				//$('.paragraph_en').slideDown('slow');
				$('.paragraph_en').css('display','block');
			}
			if(langCode=='bg')
			{
				//$('#header_en').slideUp('slow');
				$('#header_en').css('display','none');
				//$('#header_bg').slideDown('slow');	
				$('#header_bg').css('display','block');
				//$('.paragraph_en').slideUp('slow');
				$('.paragraph_en').css('display','none');
				//$('.paragraph_bg').slideDown('slow');
				$('.paragraph_bg').css('display','block');
			}
		});
	});
</script>
<script src="<?php echo SITE_JS;?>openClosePanels.js"  type="text/javascript"></script>
<div class='content_field'>
	<div class='rounded' id='repairs'>
		<div class='rounded_header'>
			<h1>Ремонти<span class='open_close_arrow right'><i class='icon-angle-up'></i></span></h1>
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
			<h1>Транспортни услуги<span class='open_close_arrow right'><i class='icon-angle-up'></i></span></h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>construction_image.jpg' />
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.  
			</p>
				<ul>
					<li>Цени :</li>
					<li>Строителна услуга 1 - 100 лева</li>
					<li>Строителна услуга 2 - 200 лева</li>
					<li>Строителна услуга 3 - 300 лева</li>
					<li>Строителна услуга 4 - 400 лева</li>
					<li>Строителна услуга 5 - 500 лева</li>
				</ul>
			<h2 id='header_bg'>Трансфери</h2>
			<h2 id='header_en'>Transphers</h2>
			<div class='lang_flags'>
				<img class='lang_switch' id='lang_bg' src='<?php echo SITE_IMG;?>bg-flag.gif' />
				<img class='lang_switch' id='lang_en' src='<?php echo SITE_IMG;?>uk.jpg'  />
			</div>
			<div class='clear'></div>
			<p class='paragraph_bg'>
				Внимавайте вие, читатели и слушатели, роде български, които обичате и вземате присърце своя род и своето българско отечество и желаете да разберете и знаете известното за своя български род и за вашите бащи, прадеди и царе, патриарси и светии как изпърво са живели и прекарвали. За вас е потребно и полезно да знаете известното за делата на вашите бащи, както знаят всички други племена и народи своя род и език, имат история и всеки грамотен от тях знае, разказва и се гордее със своя род и език.
			</p>
			<p class='paragraph_en hidden'>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
			</p>
		</div>
	</div>
	<div class='rounded' id='moving'>
		<div class='rounded_header'>
			<h1>Хамалски услуги<span class='open_close_arrow right'><i class='icon-angle-up'></i></span></h1>
		</div>
		<div class='rounded_content'>
			<p>
				<img src='<?php echo SITE_IMG;?>MOVER.gif' />
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptuary. 
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
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");?>