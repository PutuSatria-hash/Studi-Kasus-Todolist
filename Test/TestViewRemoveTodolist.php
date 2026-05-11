<?php

require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../View/ViewRemoveTodolist.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodolist.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";

addTodolist("Eko");
addTodolist("Kurniawan");
addTodolist("Khannedy");

showTodolist();

viewRemoveTodolist();

showTodolist();
