// Честно спизженный js-кот из инторнетов этих ваших


/*
$(function(){
  $('.pict').click(function(event) {
    var i_path = $(this).attr('src');
    $('body').append('<div id="overlay"></div><div id="magnify"><img src="'+i_path+'"><div id="close-popup"><i></i></div></div>');
    $('#magnify').css({
	    left: ($(document).width() - $('#magnify').outerWidth())/2,
	    // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
            top: ($(window).height() - $('#magnify').outerHeight())/2
	  });
    $('#overlay, #magnify').fadeIn('fast');
  });
  
  $('body').on('click', '#close-popup, #overlay', function(event) {
    event.preventDefault();
 
    $('#overlay, #magnify').fadeOut('fast', function() {
      $('#close-popup, #magnify, #overlay').remove();
    });
  });
});
*/


$(document).ready(function() 
	{ // Ждём загрузки страницы
		$(".pict").click(function()
			{	
// Событие клика на маленькое изображение
				var img = $(this);	
// Получаем изображение, на которое кликнули
				var src = img.attr('src'); 
// Достаем из этого изображения путь до картинки
				$("body").append("<div class='popup'>"+ 
//Добавляем в тело документа разметку всплывающего окна
				"<div class='popup_bg'></div>"+ 
// Блок, который будет служить фоном затемненным
				"<img src='"+src+"' class='popup_img' />"+ 
// Само увеличенное фото
				"</div>"); 
				$(".popup").fadeIn(120); 
// Медленно выводим изображение
				$(".popup_bg").click(function()
					{	
// Событие клика на затемненный фон	   
						$(".popup").fadeOut(120);	
// Медленно убираем всплывающее окно
						setTimeout(function() 
							{	
// Выставляем таймер
								$(".popup").remove(); 
// Удаляем разметку всплывающего окна
							}, 120);
					});
			});
	
	});
