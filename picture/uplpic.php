<?php

//$uplpic = "Полет нормальный.";
//print $uplpic;

if ($_FILES)
    {
    $f_name = $_FILES['pict']['name'];
    switch($_FILES['pict']['type'])
        {
        case 'image/jpeg': $ext = 'jpg'; break;
        case 'image/gif': $ext = 'gif'; break;
        case 'image/png': $ext = 'png'; break;
        default: $ext = ''; break;
        }
    if ($ext)
        {
            $picn = "$f_name";
            move_uploaded_file($_FILES['pict']['tmp_name'], 'picture/'.$picn);
        }
	else echo "'$f_name' — ничего не получено или ты необучаемый.<br>";
    }
//var_dump($_FILES); echo "<br><br>";
?>