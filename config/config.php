<?php 

    $host = 'localhost';
    $db = '4hds';
    $user = 'root';
    $psw = '';

    $param = "mysql:host=$host; dbname=$db";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
