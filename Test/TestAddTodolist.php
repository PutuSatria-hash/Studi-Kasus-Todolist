<?php

require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodolist.php";

addTodolist("Belajar PHP Dasar");
addTodolist("Belajar PHP OOP");
addTodolist("Belajar PHP Database");

showTodolist();
