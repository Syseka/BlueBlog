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
	$aut = $db->prepare(
	"SELECT * FROM `user-list`
	WHERE `login` = :log;"); // `password` = :pas
	$aut->BindParam(':log', $l);
	$aut->execute();
	$fet = $aut->fetchAll(PDO::FETCH_ASSOC);

//  число постов у полльзователя с логиином :log
	$con = $db->prepare("
		SELECT COUNT(`autor`) 
		AS `count` 
		FROM `postes` 
		WHERE `autor` = :log");
	$con->BindParam(':log', $l);
	$con->execute();
	$fcon = $con->fetchAll(PDO::FETCH_ASSOC);	
	$count = $fcon[0]['count'];

// дата последнего сообщения от юзера :log
	$tim = $db->prepare("
		SELECT `time-post` AS `time`
		FROM `postes` 
		WHERE `autor` = :log 
		ORDER BY `id` DESC");
	$tim->BindParam(':log', $l);
	$tim->execute();
	$ftim = $tim->fetchAll(PDO::FETCH_ASSOC);

// если массивы не пустые:	
		if ($ftim[0]['time'] and $fcon[0]['count'])
			{
				$count = $fcon[0]['count'];
				$time = $ftim[0]['time'];
			}
// в ином случае переменные счета и времени получают это:
		else
			{
				$count = "Постов нет.";
				$time = "Постов нет.";
			}
	
// Форма заполнена:
	if ($l or $p)
	{
// Логин и пароль совпали с БД:
		if ($fet[0]['login'] == $l and $fet[0]['password'] == $p)
		{
			$_SESSION['user'] = $fet[0]['login'];
			
			print "<table align='center' cellpadding='15px' style='
			margin-top: 12%;
			background-color: rgba(0, 0, 0, 0.3);
			border: 2px solid black;
			width: max-content;'>
		
			<tbody>
			<tr>
				<td>Имя: </td><td>{$l}</td>
			</tr>
			<tr>
				<td>Число постов: </td><td>{$count}</td>
			</tr>
			<tr>
				<td>Последний пост: </td><td>{$time}</td>
			</tr>
			<tr>
				<td colspan='2'>
				<a href='tr-posts.php'><span style='background: white;'>Страница с сообщениями.</span></a>
				</td>
			</tr>
			</tbody></table>";
        }
// Логин или пароль не верно введен:
		elseif ($fet[0]['login'] != $l or $fet[0]['password'] != $p)
		{
			print "
			<table align='center' cellpadding='5px' 
			style='
			margin-top: 12%;
			border-radius: 15px;
			background-color: rgba(0, 0, 0, 0.3);
			border: 2px solid black;
			width: max-content;'>

			<tr>
				<td>
				<div style='
				padding: 2%;
				border-right: 2px solid grey;
				float: left;'>
			<form method='post' class='form-signin'>
				<h1 class='h3 mb-3 font-weight-normal'>Регистрация</h1>
				<input class='form-control' name='rlog' type='text' placeholder='Логин'><br>
				<input class='form-control' name='rpas' type='password' placeholder='Пароль'><br>
				<button type='submit' value='true' name='rbtn' class='btn-block'>Регистрация</button><br>
			</form>
			</div>
				</td>

				<td>
				<div style='
				padding: 2%;
				border-left: 2px solid grey;
				float: right;'>
     
				<form method='post' class='form-signin'>
					<h1 class='h3 mb-3 font-weight-normal'>Авторизация</h1>
					<input class='form-control' name='alog' type='text' placeholder='Логин'><br>
					<input class='form-control' name='apas' type='password' placeholder='Пароль'><br>
					<button type='submit' value='true' name='abtn' class='btn-block'>Войти</button><br>
				</form>
				</div>
				</td>
			</tr>

			<tr>
				<!-- <div style=' 
				border-style: dashed;
				border-width: 2px; 
				border-radius: 10px;
				border-color: red;
				margin: 9px;
				//color: red;'> -->
	
				<td colspan='2'>
				Логин или пароль введен неверно.</td>

			</div></tr>";
		}
	}
// Пустая форма:
	else
		{
			print "
			<table align='center' cellpadding='5px' 
			style='
			margin-top: 12%;
			border-radius: 15px;
			background-color: rgba(0, 0, 0, 0.3);
			border: 2px solid black;
			width: max-content;'>

			<tr>
				<td>
				<div style='
				padding: 2%;
				border-right: 2px solid grey;
				float: left;'>
			<form method='post' class='form-signin'>
				<h1 class='h3 mb-3 font-weight-normal'>Регистрация</h1>
				<input class='form-control' name='rlog' type='text' placeholder='Логин'><br>
				<input class='form-control' name='rpas' type='password' placeholder='Пароль'><br>
				<button type='submit' value='true' name='rbtn' class='btn-block'>Регистрация</button><br>
			</form>
			</div>
				</td>

				<td>
				<div style='
				padding: 2%;
				border-left: 2px solid grey;
				float: right;'>
     
				<form method='post' class='form-signin'>
					<h1 class='h3 mb-3 font-weight-normal'>Авторизация</h1>
					<input class='form-control' name='alog' type='text' placeholder='Логин'><br>
					<input class='form-control' name='apas' type='password' placeholder='Пароль'><br>
					<button type='submit' value='true' name='abtn' class='btn-block'>Войти</button><br>
				</form>
				</div>
				</td>
			</tr>

			<tr>
				<!-- <div style='
				border-style: dashed;
				border-width: 2px; 
				border-radius: 10px;
				border-color: red;
				margin: 9px;
				//color: red;'> -->
	
				<td colspan='2'><b>[Авторизация]</b>: Данные не введены.</td></div>
			</tr>";
		}
}




// РЕГИСТРАЦИЯ
// РЕГИСТРАЦИЯ
// РЕГИСТРАЦИЯ
// РЕГИСТРАЦИЯ

function adduser ($l, $p, $db)
{
    $prep = $db->prepare(
	"SELECT * FROM `user-list` 
	WHERE `login` = :log");
    $prep->bindParam(':log', $l);
    $prep->execute();
    $res = $prep->fetchAll(PDO::FETCH_ASSOC);

//print_r($res); echo ' - fetchAll<br>';
// Проверяю, что упало в fetchAll.

    if ($res[0]['login'] != $l and $p)
        {
            $nUs = $db->prepare(
			"INSERT INTO `user-list` 
			(`login`, `password`, `posts`)
			VALUES (?, ?, 0)");
            $nUs->bindParam(1, $l);
            $nUs->bindParam(2, $p);
            $adUs = $nUs->execute();

        if ($adUs)
            {
// Если execute вернула TRUE => запрос выполнен
                print "
			<table align='center' cellpadding='5px' 
			style='
			margin-top: 12%;
			border-radius: 15px;
			background-color: rgba(0, 0, 0, 0.3);
			border: 2px solid black;
			width: max-content;'>

			<tr>
				<td>
				<div style='
				padding: 2%;
				border-right: 2px solid grey;
				float: left;'>
			<form method='post' class='form-signin'>
				<h1 class='h3 mb-3 font-weight-normal'>Регистрация</h1>
				<input class='form-control' name='rlog' type='text' placeholder='Логин'><br>
				<input class='form-control' name='rpas' type='password' placeholder='Пароль'><br>
				<button type='submit' value='true' name='rbtn' class='btn-block'>Регистрация</button><br>
			</form>
			</div>
				</td>

				<td>
				<div style='
				padding: 2%;
				border-left: 2px solid grey;
				float: right;'>
     
				<form method='post' class='form-signin'>
					<h1 class='h3 mb-3 font-weight-normal'>Авторизация</h1>
					<input class='form-control' name='alog' type='text' placeholder='Логин'><br>
					<input class='form-control' name='apas' type='password' placeholder='Пароль'><br>
					<button type='submit' value='true' name='abtn' class='btn-block'>Войти</button><br>
				</form>
				</div>
				</td>
			</tr>

			<tr>
				<!-- <div style='
				border-style: dashed;
				border-width: 2px; 
				border-radius: 10px;
				border-color: red;
				margin: 9px;
				//color: red;'> -->
	
				<td colspan='2'>Регистрация прошла успешно.<br>Нужно авторизоваться.</td></div>
				</tr>";
            }
		else
			{
				print 
				"Произошла некоторая ошибка. 
				Регистрация не произошла.<br>";
			}
        }
    elseif ($p == NULL or $l == NULL)
        { 
// если не введен пароль или логин
			print "
			<table align='center' cellpadding='5px' 
			style='
			margin-top: 12%;
			border-radius: 15px;
			background-color: rgba(0, 0, 0, 0.3);
			border: 2px solid black;
			width: max-content;'>

			<tr>
				<td>
				<div style='
				padding: 2%;
				border-right: 2px solid grey;
				float: left;'>
			<form method='post' class='form-signin'>
				<h1 class='h3 mb-3 font-weight-normal'>Регистрация</h1>
				<input class='form-control' name='rlog' type='text' placeholder='Логин'><br>
				<input class='form-control' name='rpas' type='password' placeholder='Пароль'><br>
				<button type='submit' value='true' name='rbtn' class='btn-block'>Регистрация</button><br>
			</form>
			</div>
				</td>

				<td>
				<div style='
				padding: 2%;
				border-left: 2px solid grey;
				float: right;'>
     
				<form method='post' class='form-signin'>
					<h1 class='h3 mb-3 font-weight-normal'>Авторизация</h1>
					<input class='form-control' name='alog' type='text' placeholder='Логин'><br>
					<input class='form-control' name='apas' type='password' placeholder='Пароль'><br>
					<button type='submit' value='true' name='abtn' class='btn-block'>Войти</button><br>
				</form>
				</div>
				</td>
			</tr>

			<tr>
				<!-- <div style='
				border-style: dashed;
				border-width: 2px; 
				border-radius: 10px;
				border-color: red;
				margin: 9px;
				//color: red;'> -->
	
				<td colspan='2'><b>[Регистрация]</b>: Данные не введены.</td></div>
				</tr>";
        }
// Введенный логин совпал с тем, что БД
    elseif($res[0]['login'] == $l)
        {
            print "
			<table align='center' cellpadding='5px' 
			style='
			margin-top: 12%;
			border-radius: 15px;
			background-color: rgba(0, 0, 0, 0.3);
			border: 2px solid black;
			width: max-content;'>

			<tr>
				<td>
				<div style='
				padding: 2%;
				border-right: 2px solid grey;
				float: left;'>
			<form method='post' class='form-signin'>
				<h1 class='h3 mb-3 font-weight-normal'>Регистрация</h1>
				<input class='form-control' name='rlog' type='text' placeholder='Логин'><br>
				<input class='form-control' name='rpas' type='password' placeholder='Пароль'><br>
				<button type='submit' value='true' name='rbtn' class='btn-block'>Регистрация</button><br>
			</form>
			</div>
				</td>

				<td>
				<div style='
				padding: 2%;
				border-left: 2px solid grey;
				float: right;'>
     
				<form method='post' class='form-signin'>
					<h1 class='h3 mb-3 font-weight-normal'>Авторизация</h1>
					<input class='form-control' name='alog' type='text' placeholder='Логин'><br>
					<input class='form-control' name='apas' type='password' placeholder='Пароль'><br>
					<button type='submit' value='true' name='abtn' class='btn-block'>Войти</button><br>
				</form>
				</div>
				</td>
			</tr>

			<tr>
				<!-- <div style='
				border-style: dashed;
				border-width: 2px; 
				border-radius: 10px;
				border-color: red;
				margin: 9px;
				//color: red;'> -->
	
				<td colspan='2'>Имя <b><font color='black'>$l</font></b> уже занято.<br></td></div>
				</tr>";
        }
}


// ПОСТЫ
// ПОСТЫ
// ПОСТЫ
// ПОСТЫ

function show_posts($db)
	{
		$gettype = $_GET['typo'];
		
		if ($_SESSION['user'])
			{
				if ($gettype == "all" or $gettype == NULL)
				{
// показывает все посты, если тип не выбран или выбран "все"
					$sh_po = $db->prepare(
					"SELECT * FROM `postes` 
					ORDER BY `id` DESC");
// ORDER BY `id` DESC - сортировка по убыванию
					$ex_po = $sh_po->execute();
					$fa_po = $sh_po->fetchAll(PDO::FETCH_ASSOC);
	
					$co_po = count($fa_po);
					$n = 0;

					while ($n < $co_po)
					{	
						echo "<div class='mess'>";
						print 
						"<p class='head'><b>Пост #".$fa_po[$n]['id'].
						" </b>". 
						"<span class='typ'>Тип: " .$fa_po[$n]['type']. "</span></p>";
	
						if (!empty($fa_po[$n]['pict']))
						{
							print "
							<img class='pict' src='picture/".
							$fa_po[$n]['pict']."'>";
						}

							print "<p class='letter'>".$fa_po[$n]['letter']."</p>".
							"<p class='autor'>Годнопостил: <b>".$fa_po[$n]['autor'].
							"</b> во время: ".$fa_po[$n]['time-post']."</p>";
							echo "</div>";
							$n++;
						}
				}			

// показывает посты категорий 1 или 2				
				elseif ($gettype)
				{
					$sh_po = $db->prepare(
					"SELECT * FROM `postes` WHERE `type`=?
					ORDER BY `id` DESC");
					$sh_po->bindParam(1, $gettype);
					$ex_po = $sh_po->execute();
					$fa_po = $sh_po->fetchAll(PDO::FETCH_ASSOC);
	
					$co_po = count($fa_po);
					$n = 0;

					while ($n < $co_po)
					{	
						echo "<div class='mess'>";
						print 
						"<p class='head'><b>Пост #".$fa_po[$n]['id'].
						" </b>". 
						"<span class='typ'>Тип: " .$fa_po[$n]['type'].
						"</span></p>";
						
							if (!empty($fa_po[$n]['pict']))
							{
								print "
								<img class='pict' src='picture/".
								$fa_po[$n]['pict']."'>";
							}

						print "<p class='letter'>".$fa_po[$n]['letter']."</p>".
						"<p class='autor'>Годнопостил: <b>".$fa_po[$n]['autor'].
						"</b> во время: ".$fa_po[$n]['time-post']."</p>";
						echo "</div>";
						$n++;
					}
				}
			}
		else
			{print "Ты не залогинился для годнопостинга.";}
	}
	
	

// ПУБЛИКАЦИЯ
// ПУБЛИКАЦИЯ
// ПУБЛИКАЦИЯ
// ПУБЛИКАЦИЯ

function go_post($sp, $nam, $tp, $tm, $fl, $db)
	{
		if (!empty($tp))
			{
				$sp = strip_tags($sp);
				$ad_po = $db->prepare(
				"INSERT INTO `postes` 
				(`autor`,`letter`,`type`, `time-post`, `pict`) 
				VALUE (?, ?, ?, ?, ?)");
				$ad_po->BindParam(1, $nam);
				$ad_po->BindParam(2, $sp);
				$ad_po->BindParam(3, $tp);
				$ad_po->BindParam(4, $tm);
				$ad_po->BindParam(5, $fl);
				$ex = $ad_po->execute();
				/*if ($ex)
					{
						return null;
					}
				else
					{
						print '123';
					}*/
			}
		else
			{
				print "Нечего постить.";
			}
	}