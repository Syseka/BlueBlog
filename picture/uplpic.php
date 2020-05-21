<?php

//$uplpic = "Полет нормальный.";
//print $uplpic;

if ($_FILES)
    {
    $f_name = $_FILES['pict']['name'];
// получаю файл из хтмл-формы ввода
    switch($_FILES['pict']['type'])
        {
        case 'image/jpeg': $ext = 'jpg'; break;
        case 'image/gif': $ext = 'gif'; break;
        case 'image/png': $ext = 'png'; break;
        default: $ext = 0; break;
// проверка форматов
        }
// финальная проверка перед загрузкой
    if ($ext)
        {
            $picn = "$f_name";
            move_uploaded_file($_FILES['pict']['tmp_name'], 'picture/'.$picn);
// перемещает файлы в нужную мне папку
        }
	else echo "<h1>'$f_name' — ничего не получено или расширение файла неподходящее.</h1><br>";
    }
//var_dump($_FILES); echo "<br><br>";
?>