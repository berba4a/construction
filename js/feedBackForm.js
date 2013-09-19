function resetForm(element)
{	
	var form = document.getElementById($(element).parent().attr('id'));
	form.reset();
}
$(document).ready(function()
{
	$('.close_panel').click(function()
	{
		$('.result_panel').slideUp('slow');
		$('.suc_msg').html('');
	})
});
function submitForm(element)
{
	var err_cnt = 0;
	$('.mandatory').each(function(){
		var value = $.trim($(this).val());
		var labelID = 'label_'+$(this).attr('id');
		if(''==value)
		{
			err_cnt++;
			if(!$('#'+labelID).hasClass('red'))
			{	
				$('#'+labelID).toggleClass('red');
			}
		}
		else
		{
			if($('#'+labelID).hasClass('red'))
			{	
				$('#'+labelID).removeClass('red');
			}
		}
	});
	var mail=$.trim($('input#mail').val());
	
	if(''!=mail)
	{
		var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
		var valid = emailRegex.test(mail);
		if(valid)
		{	
			if($('#label_mail').hasClass('red'))
			{
				$('#label_mail').removeClass('red');
				$('#label_mail span.info').remove();
			}
		}
		else
		{
			if(!$('#label_mail').hasClass('red'))
			{
				$('#label_mail').addClass('red');
			}
			if(!$('#label_mail span.info').length > 0)
			{
				$('#label_mail').append('<span class="info">Невалиден e-mail адрес.</span>');
			}
			err_cnt++;
		}
	}
	if(err_cnt>0)
	{
		if(!$('#result_msg').hasClass('red'))
		{
			$('#result_msg').addClass('red');
			$('#result_msg').html('Не коректно полълнени или празни задължителни полета!');
		}
	}
	else
	{
		if($('#result_msg').hasClass('red'))
		{
			$('#result_msg').removeClass('red');
		}
		if($('#label_mail').hasClass('red'))
		{
			$('#label_mail').removeClass('red');
			$('#label_mail span.info').remove();
		}
		$('#result_msg').html('<i class="icon-spin5 animate-spin"></i>&nbsp;Изпращане на вашето запитване...');
		$.ajax({
			url : '../ajax/sumbitFeedbackForm.php',
			type : 'POST',
			data : $(element).parent().serialize(),
			success : function(response)
			{
				$('#result_msg').html('');
				$('.suc_msg').html(response);
				$('.result_panel').slideDown('slow');
				$('textarea,input[type=text]').each(function()
				{
					$(this).val('');
				});
			}
		});
	}
}