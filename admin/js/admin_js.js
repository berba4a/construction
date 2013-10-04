var images = 1;
$(document).ready(function()
{
	$('.add_photos').click(function()
	{
		images++;
		div = document.createElement('div');
		$(div).addClass('image_box');
		input = document.createElement('input');
		input.type='file';
		input.name='image[]';
		input.id='image_'+images;
		$(input).attr('onChange','prewImage(this)');
		$(div).append(input);
		$('.image_box').last().after(div);
		result_div = document.createElement('div');
		result_div.id="prew_image_"+images;
		$(div).append(result_div);
	});
});
$(document).ready(function()
{
	$('input[type="file"]').change(function()
	{   
		var input = document.getElementById($(this).attr('id'));
		prewImage(input);
	});
});

function prewImage(input)
{
	alert
	var prewID = 'prew_'+$(input).attr('id');
	var reader = new FileReader();
	reader.onload = function (e) 
	{
		if(e.target.result)
		{
			$("#"+prewID).html('<img src="'+e.target.result+'" />');
		}
		else
		{
			$("#"+prewID).html('');
		}
	}
	reader.readAsDataURL(input.files[0]);
}

/*ajax delete image*/
$(document).ready(function()
{
	$('.delImg').click(function()
	{
		var currID = $(this).attr('id');
		var imagePrkey = currID.substring(0,currID.search('_'));
		var imageID = currID.substring(currID.search('_')+1);
		$.ajax({
			url : 'ajax/delete_image.php',
			type : 'GET',
			data : imagePrkey+'='+imageID,
			success : function(response)
			{
				$("#"+currID).parent().html(response);
			}
		});
	});
});

/*ajax delete gallery*/
$(document).ready(function()
{
	$('.delete').click(function()
	{
		var currID = $(this).attr('id');
		var galleryPrkey = currID.substring(0,currID.search('_'));
		var galleryID = currID.substring(currID.search('_')+1);
		$.ajax({
			url : 'ajax/delete_gallery.php',
			type : 'GET',
			data : galleryPrkey+'='+galleryID,
			success : function(response)
			{
				$('#row_'+galleryPrkey+'_'+galleryID).html('<td colspan="4">'+response+'</td>');
			}
		});
	});
});