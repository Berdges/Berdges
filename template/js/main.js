//Очистка полей формы регистрации
    function clear_for_registration() {
 		document.getElementsByName('register')[0].reset();
	}
	function clear_for_make_bet() {
    	document.getElementsByName('makeBet_up_or_down')[0].reset();
        document.getElementsByName('makeBet_on_value')[0].reset();
	}
function setCookie(name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}


	//Операция ставки на новость
$(function() {
    $(".js-button-campaign_bet").click(function() {
        var id_news = $(this).attr('data-read-id');
        $(".id_post_news").val(id_news);

    });
    $("#make_bet_up_or_down").click(function(){
    	$.ajax({
            url: "template/ajax/handler_bet.php",
            type: "POST",
            data : $('form#up_or_down').serialize(),
            cache: false,
            success: function(response) {
                if (response == 'yes') {
                    alert("Поздравляем! Ваша  ставка успешно зарегистрирована!");
                } else if(response == 'no') {
                    alert("К сожалению, на вашем личном счету недостаточно средств");
                }
            }
        });
    });
});

$(function() {
    $("#make_bet_bet_on_value").click(function(){
        $.ajax({
            url: "template/ajax/handler_bet.php",
            type: "POST",
            data : $('form#bet_on_value').serialize(),
            cache: false,
            success: function(response){
            	if(response == "yes"){
                    alert("Поздравляем! Ваша ставка была принята!");
                }else if(response == "no"){
                    alert("Извините, у вас недостаточно средств на личной счету");
                }
            }
        });
    });
});


//Отбивка чисел по разрядам
   	var thousandSeparator = function(str) {
   	    var parts = (str + '').split('.'),
   	        main = parts[0],
   	        len = main.length,
   	        output = '',
   	        i = len - 1;
            
    while(i >= 0) {
        output = main.charAt(i) + output;
        if ((len - i) % 3 === 0 && i > 0) {
            output = ' ' + output;
        }
        --i;
        }

        if (parts.length > 1) {
            output += '.' + parts[1];
        }
        return output;
    };
// Модальное окно
// Модальное окно
$('.js-button-campaign_read_news_on_bet').click(function(){
    var id = $(this).attr('read-more-about-news-on-bet');
    $('.js-overlay-campaign').fadeIn();
});
$('.js-close-campaign_news_on_bet').click(function(){
    setCookie("id_news", "");
    $('.js-overlay-campaign').fadeOut();
});

// открыть по кнопке модальное окно регистрации
$('.js-button-campaign_registr').click(function() {
	$('.js-overlay-campaign').fadeIn();
	$('.js-overlay-campaign').addClass('disabled');
});
// открыть по кнопке модальное окно "Сделать ставку"
$('.js-button-campaign_bet').click(function() {
    $('.js-overlay-campaign').fadeIn();
    $('.js-overlay-campaign').addClass('disabled');
});

// закрыть на крестик модальное окно регистрации
$('.js-close-campaign_registr').click(function() {
	$('.js-overlay-campaign').fadeOut();
	$("#login").next().text("");
	$("#password").next().text("");
	$("#password2").next().text("");
    clear_for_registration();
});

// закрыть на крестик модальное окно "Сделать ставку"
$('.js-close-campaign_bet').click(function() {
    $('.js-overlay-campaign').fadeOut();
    clear_for_make_bet();
});

// закрыть модальное окно при нажатии на кнопку
$('#make_bet_up_or_down, #make_bet_bet_on_value').click(function() {
    $('.js-overlay-campaign').fadeOut();
});

// закрыть по клику вне окна
$(document).mouseup(function (e) { 
	var popup = $('.js-popup-campaign');
	if (e.target!=popup[0]&&popup.has(e.target).length === 0){
		$('.js-overlay-campaign').fadeOut();
	}
});

//Валидация полей формы регистрации в модальном окне
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
	//Конец валидации полей формы регистрации
});
	//Добавление класса активного поля по клику
	$(function(){
        $('#news').click(function(){
        	$('#news').addClass('active_aside');
            $('#rating_table').removeClass('active_aside');
		    $('#privat_cabinet').removeClass('active_aside');
        });
        $('#rating_table').click(function(){
        	$('#rating_table').addClass('active_aside');
            $('#news').removeClass('active_aside');
		    $('#privat_cabinet').removeClass('active_aside');
        });
        $('#privat_cabinet').click(function(){
        	if (window.location.pathname == '/cabinet') {
	        	$('#privat_cabinet').addClass('active_aside');
	            $('#rating_table').removeClass('active_aside');
			    $('#news').removeClass('active_aside');
		    }
        });
    });

//Показ всего блока новостей по клику
$(function(){
    $('.shadow').click(function(){
     	if(this.classList.contains('active_news')){
			$("#"+this.id).animate({height: "250px"}, 500, function() {
   				$("#"+this.id).removeClass('active_news');
 			});
			$("#"+this.id).removeClass('active_news');
     	}else{
      		$("#"+this.id).animate({height: $("#"+this.id).get(0).scrollHeight}, 20 );
   			$("#"+this.id).addClass('active_news');
     	}
    });
});

//Мнгнвенноый подсчёт значений при ставке и отбивка чисел по разрядам
$('#up_or_down .score_bet').keyup(function(){
  	var k = $('.k_bet').val();
	var score_bet = $('.score_bet').val().replace(/[^-0-9]/gim,'');
	var prize = score_bet * k;
	var score_bet_view = thousandSeparator(score_bet);
	var prize_view = thousandSeparator(prize);
	$(".score_bet").val(score_bet_view);
	$(".prize_bet").val(prize_view);
});


//Мнгнвенноый подсчёт значений при ставке и отбивка чисел по разрядам
$('#bet_on_value .score_bet').keyup(function(){
  	var difPredict =($('#bet_on_value .bet_from').val() - $('#bet_on_value .bet_to').val());
  	var datePredict = $('#bet_on_value #date_on_value').val();
  	
	var today = new Date();
    var date = new Date(datePredict);
    var oneDay = 1000*60*60*24;
    var difDate = Math.floor((date - today)/oneDay) + 1;
  	var k;
  	if(difDate == 0){
  		difDate = 6;
  	}else{
  		k = difDate / difPredict;
  	}
  	if(k < 0){
  		k = k*(-1);
  	}

	var score_bet = $('#bet_on_value .score_bet').val().replace(/[^-0-9]/gim,'');
	var prize = score_bet * k*0.3;
	prize = prize.toFixed(2);
	var score_bet_view = thousandSeparator(score_bet);
	var prize_view = thousandSeparator(prize);
	$("#bet_on_value .score_bet").val(score_bet_view);
	$("#bet_on_value .prize_bet").val(prize_view);
});
$('#bet_on_value .bet_from').keyup(function(){
  	var bet_to = $('#bet_on_value .bet_from').val().replace(/[^-0-9]/gim,'');
  	$("#bet_on_value .bet_from").val(bet_to);
	$("#bet_on_value .bet_to").val(bet_to);
});


//Выбор формы Рост/падение или Значение.
$(function() {
	$(".inactive_choose_way").click(function(){
		$("#up_or_down").css("display","none");
		$("#bet_on_value").css("display","block");
		$(".active_choose_way").addClass("inactive_choose_way");
		$(".active_choose_way").removeClass("active_choose_way");
		$( this ).addClass("active_choose_way");
		$( this ).removeClass("inactive_choose_way");
	});
	$(".active_choose_way").click(function(){
		$("#up_or_down").css("display","block");
		$("#bet_on_value").css("display","none");
		$(".active_choose_way").addClass("inactive_choose_way");
		$(".active_choose_way").removeClass("active_choose_way");
		$( this ).addClass("active_choose_way");
		$( this ).removeClass("inactive_choose_way");
	});
});


//Оповещение пользователя о сыгранной ставке.
var timeoutID; 
function delayedAlert() {
  timeoutID = window.setInterval(slowAlert, 3000);
}
delayedAlert();
function slowAlert(){
    $.ajax({
		url: "../../template/ajax/handler_get_bet_result.php",
		cache: true,
		dataType: "json",
		success: function(response){
    		if(response){
    			$('#bet_result').text(response[0]);
				var my_score = response[1].toFixed(2);
				var score_bet_view = thousandSeparator(my_score);
    			$('#my_score_header').text(score_bet_view);
       		}
      	}
	});
}




