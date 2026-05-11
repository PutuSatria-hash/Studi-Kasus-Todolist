<?php

require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";
require_once __DIR__ . "/../BusinessLogic/RemoveTodolist.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodolist.php";

addTodolist("Belajar PHP Dasar");
addTodolist("Belajar PHP OOP");
addTodolist("Belajar PHP Database");
addTodolist("Belajar PHP Web");
addTodolist("Belajar PHP Composer");

showTodolist();

removeTodolist(3);
showTodolist();

removeTodolist(2);
showTodolist();

$success = removeTodolist(4);
var_dump($success);
showTodolist();
