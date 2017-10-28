$(function() {
	

	$("#message_form").validate( {
		rules: {
			u_name: { 
				required: true,
				alphanumeric: true
			},

			u_email: {
				required: true,
				email: true
			},

			u_msg: "required",
			
			
			captcha: {
				required: true,
				remote: "process.php"
			}
		
		},
		messages: {
			u_name: {
				required: "This field is required.",
				alphanumeric: "Please use only english letters and numbers."
			},

			u_email: {
				required: "This field is required.",
				email: "Please enter a valid email address."
			},

			u_msg: {
				required: "This field is required." 
			},

			//
			captcha: "Correct captcha is required. Click the captcha to generate a new one"
			//
		},

		submitHandler: function() {

			// var info = {
			// 	"u_name" : "*qqqq!", //$("#u_name").val(),
			// 	"u_email": $("#u_email").val(),
			// 	"u_msg": $("#u_msg").val(),
			// 	"captcha": $("#captcha").val(),
			// };

			$.ajax({
						type: "POST",
						url: "process.php",
						data: $("#message_form").serialize(),
						success: function(response) {
							$("#message_form")[0].reset();
							$.fancybox.close();
							table.ajax.reload();
								
						}
			});
		},
		onkeyup: false
	});
});