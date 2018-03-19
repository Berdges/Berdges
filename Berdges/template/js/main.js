
//Очистка полей формы регистрации
    function clear() {
 		document.getElementsByName('register')[0].reset();
	}
// Модальное окно

// открыть по кнопке
$('.js-button-campaign').click(function() { 
	$('.js-overlay-campaign').fadeIn();
	$('.js-overlay-campaign').addClass('disabled');
});

// закрыть на крестик
$('.js-close-campaign').click(function() { 
	$('.js-overlay-campaign').fadeOut();
	$("#login").next().hide().text("");
	$("#password").next().hide().text("");
	$("#password2").next().hide().text("");
	$("#login").css({"background-color":"white"});
	$("#password").css({"background-color":"white"});
	$("#password2").css({"background-color":"white"});
	clear();
});

// закрыть по клику вне окна
$(document).mouseup(function (e) { 
	var popup = $('.js-popup-campaign');
	if (e.target!=popup[0]&&popup.has(e.target).length === 0){
		$('.js-overlay-campaign').fadeOut();
	}
});

$(function() {
	//Логин
	$("#login").change(function(){
		login = $("#login").val();
		var expLogin = /^[a-zA-Z0-9_]+$/g;
		var resLogin = login.search(expLogin);
		if(resLogin == -1 || login.length < 5){
			$("#login").next().hide().text("Логин имеет недопустимые символы либо слишком короткий").css("color","red").fadeIn(400);
			$("#login").removeClass().addClass("inputRed");
			loginStat = 0;
			buttonOnAndOff();
		}else{
			$.ajax({
			url: "template/ajax/handler_reg.php",
			type: "POST",
			data: "login=" + login,
			cache: false,
			success: function(response){
				if(response == "no"){
					$("#login").next().hide().text("Логин занят").css("color","red").fadeIn(400);
					$("#login").removeClass().addClass("inputRed");					
				}else{					
					$("#login").removeClass().addClass("inputGreen");
					$("#login").next().text("");
				}			
			}
		});
			loginStat = 1;
			buttonOnAndOff();
		}
	});
	$("#login").keyup(function(){
		$("#login").removeClass();
		$("#login").next().text("");
	});
		//Пароль
	$("#password").change(function(){
		password = $("#password").val();
		if(password.length < 8){
			$("#password").next().hide().text("Пароль дожен быть не менее 8 символов").css("color","red").fadeIn(400);
			$("#password").removeClass().addClass("inputRed");
			passwordStat = 0;
			buttonOnAndOff();
		}else{
			$("#password").removeClass().addClass("inputGreen");
			$("#password").next().text("");
			passwordStat = 1;
			buttonOnAndOff();
		}		
	});
	$("#password").keyup(function(){
		$("#password").removeClass();
		$("#password").next().text("");
	});
	
	//Проверка паролей
	$("#password2").change(function(){
		if(password2 != password){
			$("#password2").next().hide().text("Пароли не совпадают").css("color","red").fadeIn(400);
			$("#password2").removeClass().addClass("inputRed");
			password2Stat = 0;
			buttonOnAndOff();
		}else{
			$("#password2").removeClass().addClass("inputGreen");
			$("#password2").next().text("");
		}		
	});
	$("#password2").keyup(function(){
		password2 = $("#password2").val();
		if(password2 == password){
			password2Stat = 1;
			buttonOnAndOff();
		}else{
			password2Stat = 0;
			buttonOnAndOff();
		}
	});
	
	function buttonOnAndOff(){
		if(password2Stat == 1 && loginStat == 1){
			$("#submit").removeAttr("disabled");
		}else{
			$("#submit").attr("disabled","disabled");
		}
	}
});


