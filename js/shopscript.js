$(document).ready(function() {
    
    
//карусель товаров
   $("#newstiker").jCarouselLite({
		vertical: true,
		hoverPause:true,
		btnPrev: "#news-prev",
		btnNext: "#news-next",
		visible: 3,
		auto:3000,
		speed:500
	});
//обновление товаров при добавлении в корзину(функция описана ниже)    
    loadcart();
    
// Выбор товаров сеткой или списком   
    $("#slyle-grid").click(function(){
        
    $("#block-tovar-grid").show();    
    $("#block-tovar-list").hide();
          
    $("#style-grid").attr("scr","/images/icon-grid-active.png"); 
    $("#style-list").attr("scr","/images/icon-list.png");
    
    $.cookie('select_style','grid'); 
       
    });
    $("#slyle-list").click(function(){
        
    $("#block-tovar-grid").hide();    
    $("#block-tovar-list").show();
    
    $("#style-list").attr("scr","/images/icon-list-active.png");
    $("#style-grid").attr("scr","/images/icon-grid.png");  
    
     $.cookie('select_style','list'); 
       
    });
    //проверка куки
    if ($.cookie('select_style') == 'grid'){
    $("#block-tovar-grid").show();    
    $("#block-tovar-list").hide();
          
    $("#style-grid").attr("scr","/images/icon-grid-active.png"); 
    $("#style-list").attr("scr","/images/icon-list.png");
    
    }else
    {
    $("#block-tovar-grid").hide();    
    $("#block-tovar-list").show();
    
    $("#style-list").attr("scr","/images/icon-list-active.png");
    $("#style-grid").attr("scr","/images/icon-grid.png");  
    
    }
    //выпадающий список сортировки
    $("#select-sort").click(function(){
    
    $("#sorting-list").slideToggle(200);    
        
        
    });
    //аккордеон категорий товара
    $('#block-category > ul > li > a').click(function(){
                         
            if ($(this).attr('class') != 'active'){
                 
            $('#block-category > ul > li > ul').slideUp(400);
            $(this).next().slideToggle(400);
             
                    $('#block-category > ul > li > a').removeClass('active');
                    $(this).addClass('active');
                    $.cookie('select_cat', $(this).attr('id'));
                     
                }else
                {
                                    
                    $('#block-category > ul > li > a').removeClass('active');
                    $('#block-category > ul > li > ul').slideUp(400);
                    $.cookie('select_cat', '');   
                }                                  
});
 
if ($.cookie('select_cat') != '')
{
$('#block-category > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
}

//обработчик кнопки генерации паролей при регистрации

  $('#genpass').click(function(){
 $.ajax({
  type: "POST",
  url: "/functions/genpass.php",
  dataType: "html",
  cache: false,
  success: function(data) {
  $('#reg_pass').val(data);
  }
});
  
});

//Перезагрузка каптчи

$('#reloadcaptcha').click(function(){
$('#block-captcha > img').attr("src","/reg/reg_captcha.php?r="+ Math.random());
});

//Появление верхней формы для авторизации

  $('.top-auth').toggle(
       function() {
           $(".top-auth").attr("id","active-button");
           $("#block-top-auth").fadeIn(200);
       },
       function() {
           $(".top-auth").attr("id","");
           $("#block-top-auth").fadeOut(200);  
       }
    );
 
 //Показ-скрытие пароля в форме авторизации
 
 $('#button-pass-show-hide').click(function(){
 var statuspass = $('#button-pass-show-hide').attr("class");
   
    if (statuspass == "pass-show")
    {
       $('#button-pass-show-hide').attr("class","pass-hide");
        
                            var $input = $("#auth_pass");
                            var change = "text";
                            var rep = $("<input placeholder='Пароль' type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                            $input.remove();
                            $input = rep;
         
    }else
    {
        $('#button-pass-show-hide').attr("class","pass-show");
         
                            var $input = $("#auth_pass");
                            var change = "password";
                            var rep = $("<input placeholder='Пароль' type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                            $input.remove();
                            $input = rep;        
        
    }
    });
    
    //Сценарий при нажатие на кнопку ВХОД(проверки введенных данных и ссылка на обработчик)
 
 $("#button-auth").click(function() {
         
 var auth_login = $("#auth_login").val();
 var auth_pass = $("#auth_pass").val();
 
  
 if (auth_login == "" || auth_login.length > 30 )
 {
    $("#auth_login").css("borderColor","#FDB6B6");
    send_login = 'no';
 }else {
     
   $("#auth_login").css("borderColor","#DBDBDB");
   send_login = 'yes'; 
      }
 
  
if (auth_pass == "" || auth_pass.length > 15 )
 {
    $("#auth_pass").css("borderColor","#FDB6B6");
    send_pass = 'no';
 }else { $("#auth_pass").css("borderColor","#DBDBDB");  send_pass = 'yes'; }
 
 
 
 if ($("#rememberme").prop('checked'))
 {
    auth_rememberme = 'yes';
 
 }else { auth_rememberme = 'no'; }
 
 
 if ( send_login == 'yes' && send_pass == 'yes' )
 { 
  $("#button-auth").hide();
  $(".auth-loading").show();
     
    $.ajax({
  type: "POST",
  url: "/include/auth.php",
  data: "login="+auth_login+"&pass="+auth_pass+"&rememberme="+auth_rememberme,
  dataType: "html",
  cache: false,
  success: function(data) {
 
  if (data == 'yes_auth')
  {
      location.reload();
  }else
  {
      $("#message-auth").slideDown(400);
      $(".auth-loading").hide();
      $("#button-auth").show();
       
  }
   
}
});  
}
}); 
 
 //Шаблон проверки email на правильность
    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    }
 // Контактные данные
  $('#confirm-button-next').click(function(e){   
 
   var order_fio = $("#order_fio").val();
   var order_email = $("#order_email").val();
   var order_phone = $("#order_phone").val();
   var order_address = $("#order_address").val();
    
 if (!$(".order_delivery").is(":checked"))
 {
    $(".label_delivery").css("color","#E07B7B");
    send_order_delivery = '0';
 
 }else { $(".label_delivery").css("color","black"); send_order_delivery = '1';
 
   
  // Проверка ФИО 
 if (order_fio == "" || order_fio.length > 50 )
 {
    $("#order_fio").css("borderColor","#FDB6B6");
   send_order_fio = '0';
    
 }else { $("#order_fio").css("borderColor","#DBDBDB");  send_order_fio = '1';}
 
   
 //проверка email
 if (isValidEmailAddress(order_email) == false)
 {
    $("#order_email").css("borderColor","#FDB6B6");
  send_order_email = '0';   
 }else { $("#order_email").css("borderColor","#DBDBDB"); send_order_email = '1';}
   
 // Проверка телефона
  
  if (order_phone == "" || order_phone.length > 50)
 {
    $("#order_phone").css("borderColor","#FDB6B6");
    send_order_phone = '0';   
 }else { $("#order_phone").css("borderColor","#DBDBDB"); send_order_phone = '1';}
  
 // Проверка Адресса
  
  if (order_address == "" || order_address.length > 150)
 {
    $("#order_address").css("borderColor","#FDB6B6");
    send_order_address = '0';   
 }else { $("#order_address").css("borderColor","#DBDBDB"); send_order_address = '1';}
   
} 
 // Глобальная проверка
 if (send_order_delivery == "1" && send_order_fio == "1" && send_order_email == "1" && send_order_phone == "1" && send_order_address == "1")
 {
    // Отправляем форму
   return true;
 }
 
e.preventDefault();
 
});
 
 //Сценарий нажатия на кнопку "добавить в корзину"
 
 $('.add-cart-style-list, .add-cart-style-grid, .add-cart, .random-add-cart').click(function(){
               
 var  tid = $(this).attr("tid");
 
 $.ajax({
  type: "POST",
  url: "/include/addtocart.php", //ссылка на обработчик
  data: "id="+tid,
  dataType: "html",
  cache: false,
  success: function(data) { 
  loadcart();
      }
});
 
});
 //создаем функцию проверки пустая или полная корзина
function loadcart(){
     $.ajax({
  type: "POST",
  url: "/include/loadcart.php",
  dataType: "html",
  cache: false,
  success: function(data) {
     
  if (data == "0")
  {
   
    $("#block-basket > a").html("Корзина пуста");
     
  }else
  {
    $("#block-basket > a").html(data);
 
  }  
     
      }
});    
        
}
 
 
 function fun_group_price(intprice) {  
    // Группировка цифр по разрядам (аналог функции на пхп)
  var result_total = String(intprice);
  var lenstr = result_total.length;
   
    switch(lenstr) {
  case 4: {
  groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4);
    break;
  }
  case 5: {
  groupprice = result_total.substring(0,2)+" "+result_total.substring(2,5);
    break;
  }
  case 6: {
  groupprice = result_total.substring(0,3)+" "+result_total.substring(3,6); 
    break;
  }
  case 7: {
  groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4)+" "+result_total.substring(4,7); 
    break;
  }
  default: {
  groupprice = result_total;  
  }
}  
    return groupprice;
    }
 
 
});