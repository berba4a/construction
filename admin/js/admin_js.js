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