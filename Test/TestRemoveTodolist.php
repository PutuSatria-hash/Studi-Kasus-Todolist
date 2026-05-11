<?php

require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";
require_once __DIR__ . "/../BusinessLogic/RemoveTodolist.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodolist.php";

addTodolist("Eko");
addTodolist("Kurniawan");
addTodolist("Khannedy");
addTodolist("Budi");
addTodolist("Joko");

showTodolist();

removeTodolist(3);
showTodolist();

removeTodolist(2);
showTodolist();

$success = removeTodolist(4);
var_dump($success);
showTodolist();
