<!DOCTYPE html>
<html>
<head>
	<title>Основная страница</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Пока что просто покидаю ссылки на то, что сделано и работает более-менее.</h2>
	<div>
		Авторизация - <a href='login.php'>Тык</a><br>
		Регистрация - <a href='regis.php'>Тык</a><br>
		Годнопосты - <a href='tr-posts.php'>Тык</a><br>
	</div>
</body>
</html>

<?php
// .htaccess
// php_value display_errors on
// php_value display_startup_errors on

/*
//Вот у тебя массив
//$elem[];
// заполняем его на несколько уровней (будет многоуровневым)

    $elem['lvl']['lvl1'] = "уровень1";
    $elem['lvl']['lvl2'] = "уровень2";
	
    $elem['grade']['grade1'] = "степень1";
    $elem['geade']['grade2'] = "степень2";

//И ты пишешь:

foreach ($elem as $key1 => $value) // key и value - условны, можешь писать свои
// Тут мы устанавливаем связь между первым уровнем массива и его значением
// то есть $elem => lvl1 
	{
		foreach ($value as $key2 => $elements)
			{
// тут уже иде глубже, связь между
// индексами 0-3 и их элементами (элемент1-4)
				print 
				"Ключ 1 - " .$key1. 
				", ключ2 - " .$key2. 
				", элеемент - " .$elements ."<br>" ;
			}
	}

$table = array
(
	'str1' => array(
	'ноль', 'целковый', 'чекушка'
	),
	'str2' => array(
	'пердушка', 'засерушка', 'паучек'
	),
	'str3' => array(
	'казачок', 'хуй', 'воротничок'
	)
);
//var_dump($table);

foreach ($table as $key1 => $va1)
	{
		print $key1 . ':<br>';
		foreach ($va1 as $key2 => $va2)
			{
				print '-'.$va2 . '<br>';
			}
		print "<br>";
	}*/
?>