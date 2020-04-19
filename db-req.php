<?php
session_start();
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
						WHERE `login` = :log"); // `password` = :pas
	$aut->BindParam(':log', $l);
	$aut->execute();
	$fet = $aut->fetchAll(PDO::FETCH_ASSOC);
	
if ($fet[0]['login'] == $l and $fet[0]['password'] == $p)
		{
// при успехе дает доступ на страницу с постами <- ЭТУ СТРАНИЦУ НАДО СДЕЛАТЬ
// надо сделать ==> header('tr-posts.php');
// header не работает, пусть будет ссылка до лучших времен
				
			print "Авторизация прошла успешно.<br> 
		Пользователь: <font color=#000EE5><b>{$fet[0]['login']}</b></font>, 
		id: <font color=#e70000><b>{$fet[0]['id']}</b></font><br>
			А теперь упердывай ==> ";
			print "<a href='tr-posts.php'>Страница с сообщениями.</a><br>";

/*			
			$host  = $_SERVER['HTTP_HOST'];
			$url   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$pos="tr-posts.php";
			header("Location: http://$host$url/$pos");
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
            $nUs = $db->prepare("INSERT INTO `user-list` (`login`, `password`, `posts`)
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


// ПОСТЫ
// ПОСТЫ
// ПОСТЫ
// ПОСТЫ
function show_posts($db)
	{
		$sh_po = $db->prepare("SELECT * FROM `postes` ORDER BY `id` DESC");
		$ex_po = $sh_po->execute();
		$fa_po = $sh_po->fetchAll(PDO::FETCH_ASSOC);
	
$co_po = count($fa_po);
$n = 0;

	while ($n < $co_po)
		{
			echo "<div class='mess'>";
			print 
		"<h3>Сообщение #".$fa_po[$n]['id']."</h3>".
//"Категория: ". $posts['type']. "<br>".
//пока без нее тошно
		"<p class='letter'>".$fa_po[$n]['letter']."</p>".
		"<p class='autor'>от: ".$fa_po[$n]['autor']."</p>";
		echo "</div>";
		$n++;
		}
	}
	
	

// ПУБЛИКАЦИЯ
// ПУБЛИКАЦИЯ
// ПУБЛИКАЦИЯ
// ПУБЛИКАЦИЯ

function go_post($sp, $nam, $db)
	{
		if ($sp)
			{
				$ad_po = $db->prepare(
				"INSERT INTO `postes` (`autor`,`letter`,`type`) 
				VALUE (?, ?, 'type1')");
				$ad_po->BindParam(1, $nam);
				$ad_po->BindParam(2, $sp);
				$posEx = $ad_po->execute();
				
				//$db->query("INSERT INTO `postes` (`autor`, `letter`, `type`) 
				//VALUE ('$nam', '$sp', 'type1')");
			}
		else
			{
				print "Нечего постить.";
			}
	}

















