<?php

if(isset($_GET['login'])) {
    $login = $_GET['login'];
    }
    if(isset($_GET['password'])) {
        $password = $_GET['password'];
        }
        echo "<p>{$login} {$password}</p>"
    ?>