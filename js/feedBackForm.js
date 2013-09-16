function resetForm(element)
{	
	var form = document.getElementById($(element).parent().attr('id'));
	form.reset();
}
function submitForm(element)
{
	var err_cnt = 0;
	$('.mandatory').each(function(){
		var value = $.trim($(this).val());
		var labelID = 'label_'+$(this).attr('id');
		if(''==value)
		{
			if(!$('#'+labelID).hasClass('red'))
			{	
				err_cnt++;
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
		
		}
		else
		{
		
		}
	}
	if(err_cnt>0)
	{
		if(!$('#result_msg').hasClass('red'))
		{
			$('#result_msg').addClass('red');
			$('#result_msg').html('Всички полета оначени със * са задължителни!');
		}
	}
	else
	{
		if($('#result_msg').hasClass('red'))
		{
			$('#result_msg').removeClass('red');
		}
		$('#result_msg').html('<i class="icon-spin5 animate-spin"></i>&nbsp;Изпращане на вашето запитване...');
		$.ajax({
			url : '../ajax/sumbitFeedbackForm.php',
			type : 'POST',
			data : $(element).parent().serialize(),
			success : function(response)
			{
				$('#result_msg').html(response);
			}
		});
	}
}