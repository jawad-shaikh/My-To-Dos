<?php
header('Access-Control-Allow-Origin: *');

include 'todosClass.php';

$toDo = new ToDo();

if ($_GET['type'] == 'create') {
    echo $toDo->createToDo($_POST);
}

if ($_GET['type'] == 'get') {
    echo $toDo->getAllToDos();
}

if ($_GET['type'] == 'delete') {
    echo $toDo->deleteToDo($_POST);
}
