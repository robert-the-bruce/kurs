<?php
/**
 * Created by PhpStorm.
 * User: rsalc
 * Date: 25.03.2019
 * Time: 19:41
 */

$db = 'kurse';
$user = 'root';
$pass = '';

try {
    $con = new PDO('mysql:host=localhost;dbname='. $db , $user, $pass);

} catch (exception $e) {
    echo $e->getMessage();

    switch($e->getCode())
    {
        case 2002:
            echo 'Verbindung zum Server nicht möglich!<br>';
            break;
        case 1044:
            echo 'Probleme beim Zugriff mit Benutzer: <b>' . $user . '</b>';
            break;
        case 1045:
            echo 'Passwort evt. falsch für Benutzer: ' . $user . '! Zugriff abgelehnt!<br>';
            break;
        case 1049:
            echo 'Die Datenbank <b>' . $db . '</b> existiert nicht!<br>';
            break;
        default:
            echo $e->getMessage();
    }

}


