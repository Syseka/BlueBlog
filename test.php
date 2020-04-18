<?php

$logdb= "id12618943_wp_7251b53f00c70dc36fc0c75bf34c8e20";
$passdb ="passdb";

$db_user = new PDO ("mysql:host=localhost;dbname=id12618943_wp_7251b53f00c70dc36fc0c75bf34c8e20; charset=utf8","$logdb", "$passdb");
$db_user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($db_user->query("SELECT * FROM `user-list`") as $udat)
    {
       print count($udat['login']).'<br>';
    }
