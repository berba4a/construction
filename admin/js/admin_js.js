$(document).ready(function()
{
	$('.add_photos').click(function()
	{
		div = document.createElement('div');
		$(div).addClass('image_box');
		input = document.createElement('input');
		input.type='file';
		input.name='image[]';
		input.id='image[]';
		$(div).append(input);
		$('.image_box').last().after(div);
	});
});
$(document).ready(function()
{
	$('input[type=file]').change(function()
	{
		if ($(this))
		{
			var reader = new FileReader();
			reader.onload = function (e) 
			{
				alert('here');
				alert(e.target.result);
				$('#ip').html('<img src="'+e.target.result+'" />');
			}
			reader.readAsDataURL(this);
		}
	});
});