$(document).delegate('#sign', 'click', function(){
	var $wrapper = $('#sign-form-wrapper'),
		$form = $('#sign-form'),
		$overlay = $('#overlay');
	
	$overlay.css({
		width: $(document).width(),
		height: $(document).height()
	});
	
	$wrapper.show();
	
	if ($overlay.offset().top != 0)
		$overlay.css('position', 'absolute');
	
	$form.css({
		top: $(this).offset().top - $form.height() / 2,
		left: $(window).width() / 2 - $form.outerWidth() / 2
	}).find('input').focus();
	
	return false;
}).delegate('#cancel', 'click', function(){
	$('#sign-form-wrapper').hide();
	return false;
}).delegate('#sign-form', 'submit', function(){
	$('#loading').show();
	$.ajax({
		url: '/sign.php',
		data: $(this).serialize(),
		type: 'post',
		dataType: 'json',
		success: function(response){
			if (response)
			{
				if (response.error)
				{
					showError(response.error);
					$('#email').focus();
				}
				else
				{
					$('#number').text(parseInt($('#number').text()) + 1);
					$('#sign-form-wrapper').hide();
					$('#email').val('');
				}
			}
			else
			{
				showError("Oops, something went wrong. Can you please try again later?");
			}
		},
		error: function(){
			showError("Oops, something went wrong. Can you please try again later?");
		},
		complete: function(){
			$('#loading').hide();
		}
	});
	
	return false;
});

function showError(msg)
{
	$('#error').html('<p>'+msg+'</p>');
}
function hideError()
{
	$('#error').empty();
}
