<?php
header('Access-Control-Allow-Origin: *');

include 'todosClass.php';
$toDo = new ToDo();

if($_GET['type'] == 'create') {
    $category = $_POST["category"];
    $thingy = $_POST["thingy"];

    if() {
        $toDo->createToDo($category, $thingy);
        return;
    }
}

if($_GET['type'] == 'get') {
    if() {
        $toDo->getAllToDos();
        return;
    }
}

if($_GET['type'] == 'delete') {
    $id = $_POST["id"];
    
    if() {
        $toDo->deleteToDo($id);
        return;
    }
}
