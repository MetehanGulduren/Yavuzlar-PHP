<?php

session_start();

$_SESSION['kullanici_adi'] = 'metehan';
$_SESSION['parola'] = 'metehan';

//unset($_SESSION['parola']);

print_r($_SESSION);

//echo $_SESSION['kullanici_adi'];

//session_destroy();

?>