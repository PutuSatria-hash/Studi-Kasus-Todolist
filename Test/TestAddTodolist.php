<?php

require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodolist.php";

addTodolist("Eko");
addTodolist("Kurniawan");
addTodolist("Khannedy");

showTodolist();
