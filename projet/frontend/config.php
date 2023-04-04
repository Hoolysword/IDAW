<?php
    switch($_ENV['SERVER_NAME']) {
            case 'io':
                // nom de la machine prof
                define('_MYSQL_HOST','mysql');
                define('_MYSQL_PORT',3306);
                define('_MYSQL_DBNAME','FABRESSE-Luc');
                define('_MYSQL_USER','root');
                define('_MYSQL_PASSWORD','root');
                break;
            // à vous d'ajouter les infos spéficiques à votre machine ici
            default:
                define('_MYSQL_HOST','127.0.0.1'); 
                define('_MYSQL_PORT',8889); 
                define('_MYSQL_DBNAME','projet_idaw');
                define('_MYSQL_USER','root');
                define('_MYSQL_PASSWORD','root'); 
                break;
        }
?>