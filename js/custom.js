$(document).ready(function() {
	$(".form-button-submit").click(function() {
		$("#contact_form").submit();
		return false;
	});

	$(".form-button-reset").click(function() {
		$("#contact_form").reset();
		return false;
	});

	$("#contact_form").submit(function() {
		var user_name       = $('#name').val();
		var user_email      = $('input[name=email]').val();
		var user_subject    = $('input[name=subject]').val();
		var user_message    = $('textarea[name=message]').val();

		var proceed = true;
		if(user_name==""){
			$('#name').css('border','solid red 1px');
			proceed = false;
		}
		if(user_email==""){
			$('input[name=email]').css('border','solid red 1px');
			proceed = false;
		}
		if(user_subject=="") {
			$('input[name=subject]').css('border','solid red 1px');
			proceed = false;
		}
		if(user_message=="") {
			$('textarea[name=message]').css('border','solid red 1px');
			proceed = false;
		}

		if(proceed) {
			post_data = {'userName':user_name, 'userEmail':user_email, 'userSubject':user_subject, 'userMessage':user_message};

			$.post('contact.php', post_data, function(response) {
				if(response.type == 'error') {
					output = '<div class="error">'+response.text+'</div>';
				} else {
					output = '<div class="success">'+response.text+'</div>';
					$('#contact_form input').val('');
					$('#contact_form textarea').val('');
				}
				$("#result").hide().html(output).slideDown();
			}, 'json');
		}

		return false;
	});

	$("#contact_form input, #contact_form textarea").keyup(function() {
		$("#contact_form input, #contact_form textarea").css('border','none');
		$("#result").slideUp();
	});

});