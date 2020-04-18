<?php

include 'notes.php';

$db_user = new PDO ( $infdb, $logdb, $passdb);
$db_user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// АВТОРИЗАЦИЯ
// АВТОРИЗАЦИЯ
// АВТОРИЗАЦИЯ
// АВТОРИЗАЦИЯ

function logtest ($l, $p, $db)
{
	$aut = $db->prepare("SELECT * FROM `user-list` 
						WHERE `login` = :log "); // `password` = :pas
	$aut->BindParam(':log', $l);
	//$aut->BindParam(':pas', $p);
	$aut->execute();
	$fet = $aut->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($fet);
	
if ($fet[0]['login'] == $l and $fet[0]['password'] == $p)
		{
// при успехе дает доступ на страницу с постами <- ЭТУ СТРАНИЦУ НАДО СДЕЛАТЬ
// надо сделать ==> header('0Nblog/post/posts.php');
// header не работает, пусть будет ссылка до лучших времен
			
// пока будет кастыль через ссылкой на файл posts.php
			print "Авторизация прошла успешно.<br> 
		Пользователь: <font color=#000EE5><b>{$fet[0]['login']}</b></font>, 
		id: <font color=#e70000><b>{$fet[0]['id']}</b></font><br>
		<p>Оцени этот <b><font color='yellow'>диза<font color='blue'>йнер</font>ский</font></b> 
		<font color='red'>высер</font></p>
			А теперь упердывай ==> ";
			print "<a href='tr-posts.php'>Страница с сообщениями.</a><br>";
/*			
			$host  = $_SERVER['HTTP_HOST'];
			$url   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$pos="tr-posts.php";
var_dump($host); echo ' - host<br>';
var_dump($url); echo ' - url<br>';
var_dump($pos); echo ' - pos<br>';
print "И получается же, блять, это говно: $host$url/$pos. 
Хули ты не переходишь, header ебаный?";
			header("Location: http://$host$url/$pos");
			//header("http://$host$url/$pos");
			exit;*/
        }
    else
        {
// при обсере выводит текст и просит повторить ввод
            print "Данные неверны или что-то пошло не так.<br>Повторите попытку.";
			}
}



// РЕГИСТРАЦИЯ
// РЕГИСТРАЦИЯ
// РЕГИСТРАЦИЯ
// РЕГИСТРАЦИЯ

function adduser ($l, $p, $db)
{
    $prep = $db->prepare("SELECT * FROM `user-list` WHERE `login` = :log");
    $prep->bindParam(':log', $l);
    $prep->execute();
    $res = $prep->fetchAll(PDO::FETCH_ASSOC);

//print_r($res); echo ' - fetchAll<br>';
// Проверяю, что упало в fetchAll.

    if ($res[0]['login'] != $l and $p)
        {
            $nUs = $db->prepare("INSERT INTO `user-list` (`login`, `password`, posts)
			VALUES (?, ?, 0)");
            $nUs->bindParam(1, $l);
            $nUs->bindParam(2, $p);
            $adUs = $nUs->execute();
        //var_dump($adUs); echo ' - execute<br>';
        if ($adUs)
            {
// Если execute вернула TRUE => запрос выполнен
                print "Регистрация прошла успешно.<br>
				Перейдите на страницу <a href='login.php'>авторизации</a> для входа.";
            }
		else
			{
				print "Произошла некоторая ошибка. Регистрация не произошла.<br>";
			}
        }
    elseif ($p == NULL)
        {
// если не введен пароль
			print "Нужен пароль.<br>";
        }
// Введенный логин совпал с тем, что БД
    elseif($res[0]['login'] == $l)
        {
            print "Имя <b>$l</b> уже занято.<br>";
        }
}
