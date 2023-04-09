<?php

switch(getenv('SERVER_NAME')) {
    case 'io':
        // nom de la machine prof
        define('_MYSQL_HOST','mysql');
        define('_MYSQL_PORT',3306);
        define('_MYSQL_DBNAME','FABRESSE-Luc');
        define('_MYSQL_USER','root');
        define('_MYSQL_PASSWORD','root');
        break;
    case 'TheDadi':
        // nom de la machine prof
        define('_MYSQL_HOST','mysql');
        define('_MYSQL_PORT',3306);
        define('_MYSQL_DBNAME','idaw_1');
        define('_MYSQL_USER','root');
        define('_MYSQL_PASSWORD','');
        break;
    case 'Holysword':
        // nom de la machine prof
        define('_MYSQL_HOST','mysql');
        define('_MYSQL_PORT',3306);
        define('_MYSQL_DBNAME','idaw');
        define('_MYSQL_USER','root');
        define('_MYSQL_PASSWORD','');
        break;
    // à vous d'ajouter les infos spécifiques à votre machine ici
    default:
        define('_MYSQL_HOST','127.0.0.1'); 
        define('_MYSQL_PORT',3306); 
        define('_MYSQL_DBNAME','idaw_1');
        define('_MYSQL_USER','root');
        define('_MYSQL_PASSWORD',''); 
        break;
}
?>