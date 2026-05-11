<?php

require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../View/ViewShowTodolist.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";

addTodolist("Belajar PHP Dasar");
addTodolist("Belajar PHP OOP");
addTodolist("Belajar PHP Database");
addTodolist("Belajar PHP Web");
addTodolist("Belajar PHP Composer");

viewShowTodolist();
