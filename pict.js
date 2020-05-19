// Честно спизженный js-кот из инторнетов этих ваших

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



/*

try{eval("(()=>{const t=t=>{if(!window.matchMedia(\"(min-width: 360px)\").matches)return;
const e=t.currentTarget.querySelector(\".thumb\"),n=e.src==e.dataset.fullSrc,i=n?e.dataset.thumbWidth:e.dataset.fullWidth,a=n?e.dataset.thumbHeight:e.dataset.fullHeight;
e.setAttribute(\"width\",i),e.setAttribute(\"height\",a),n?e.style=\"\":(e.style.width=i+\"px\",e.style.height=\"auto\"),e.src=n?e.dataset.thumbSrc:e.dataset.fullSrc,t.preventDefault()},e=e=>{const n=(e||document).querySelectorAll(\".thumb\");for(const e of n){const n=e.parentNode;
if(!n)continue;
const i=n.href.split(\".\").pop();if(![\"jpg\",\"jpeg\",\"gif\",\"png\",\"webp\"].includes(i))continue;
e.dataset.thumbWidth=e.getAttribute(\"width\"),e.dataset.thumbHeight=e.getAttribute(\"height\"),e.dataset.thumbSrc=e.src,e.dataset.fullSrc=n.href;
const a=n.parentNode;
if(!a)continue;
const d=a.querySelector(\".filesize > em\");if(!d)continue;
const s=d.innerText.match(/(\\d+)x(\\d+)/);null!==s&&(e.dataset.fullWidth=s[1],e.dataset.fullHeight=s[2],n.addEventListener(\"click\",t))}},n=()=>document.body.classList.contains(\"de-runned\")||!!document.body.querySelector(\"#de-main\"),i=()=>{
	if(!n()&&!(()=>JSON.parse(window.localStorage.getItem(\"iichan_settings\")||\"{}\"))().disable_expand_images&&(document.head.insertAdjacentHTML(\"beforeend\",'<style type=\"text/css\">\\n      @media only screen and (min-width: 360px) {\\n        a img.thumb[src*=\"/src/\"] {\\n          max-width: calc(100% - 8px);\\n          max-height: initial;\\n        }\\n        a img.thumb {\\n          margin: 0;\\n          padding: 2px 4px;\\n        }\\n      }\\n      @media only screen and (min-width: 480px) {\\n        a img.thumb[src*=\"/src/\"] {\\n          max-width: calc(100% - 40px);\\n          max-height: initial;\\n        }\\n        a img.thumb {\\n          margin: 0;\\n          padding: 2px 20px;\\n        }\\n      }\\n    </style>'),e(),\"MutationObserver\"in window)){if(n())return;
new MutationObserver(t=>{t.forEach(t=>{for(const n of t.addedNodes){if(!n.querySelectorAll)return;
e(n)}})}).observe(document.body,{childList:!0,subtree:!0})}};
document.body?i():document.addEventListener(\"DOMContentLoaded\",i)})();");}
catch(e){}
*/