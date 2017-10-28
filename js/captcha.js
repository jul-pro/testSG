$(function() {
	$("body").on("click", "#refreshimg", function(){
		$.post("captcha/newsession.php");
		$("#captchaimage").load("captcha/image_req.php");
		return false;
	});
});