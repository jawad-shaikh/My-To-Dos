<?php
header('Access-Control-Allow-Origin: *');

include 'usersClass.php';

$user = new User();

if ($_GET['type'] == 'signup') {
    echo $user->signUp($_POST);
}

if ($_GET['type'] == 'login') {
    echo $user->login($_POST);
}
