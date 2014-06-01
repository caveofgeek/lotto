$(document).ready(function(){
	var length = 2;
	$("#3char").click(function(){
		$(".type-for-3char").css("display","block");
		length = $(this).val();
		$("#number").attr("maxlength", length);
	});

	$("#2char").click(function(){
		$(".type-for-3char").css("display","none");
		length = $(this).val();
		$("#number").attr("maxlength", length);
	});

	$("#3char2").click(function(){
		$(".type-for-3char2").css("display","block");
	});

	$("#2char2").click(function(){
		$(".type-for-3char2").css("display","none");
	});

	$("#3char3").click(function(){
		$(".type-for-3char3").css("display","block");
	});

	$("#2char3").click(function(){
		$(".type-for-3char3").css("display","none");
	});

	$("#3char4").click(function(){
		$(".type-for-3char4").css("display","block");
	});

	$("#2char4").click(function(){
		$(".type-for-3char4").css("display","none");
	});

	$("#number").keyup(function(){
		var numlength = $(this).val().length;
		var re = /[0-9]/;
		if (length == numlength && re.test($(this).val())){
			$("#alert-number").css("display","none");
			$(this).css("border","");
		}
		else {
			$("#alert-number").css("display","block");
			$(this).css("border","1px solid red");
		}
	});

	$("#price").keyup(function(){
		var re = /[0-9]/;
		if (re.test($(this).val())){
			$("#alert-price").css("display","none");
			$(this).css("border","");
			$("#sub_add_lotto").removeAttr("disabled", "disabled");
		}
		else {
			$("#alert-price").css("display","block");
			$(this).css("border","1px solid red");
			$("#sub_add_lotto").attr("disabled", "disabled");
		}
	});
});