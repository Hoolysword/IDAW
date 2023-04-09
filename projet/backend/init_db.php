<?php
require_once('config.php');
$connectionString = "mysql:host=" . _MYSQL_HOST;
if (defined('_MYSQL_PORT'))
    $connectionString .= ";port=" . _MYSQL_PORT;
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
$info = new PDO("mysql:host="._MYSQL_HOST.";port=". _MYSQL_PORT.";dbname=information_schema",_MYSQL_USER,_MYSQL_PASSWORD,$options);
$drop =$info->prepare("DROP DATABASE ". _MYSQL_DBNAME);
$drop->execute();
$create =$info->prepare("CREATE DATABASE " . _MYSQL_DBNAME);
$create->execute();
$pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = file_get_contents(__DIR__ . "/sql/idaw.sql");
$pdo->exec($sql);
