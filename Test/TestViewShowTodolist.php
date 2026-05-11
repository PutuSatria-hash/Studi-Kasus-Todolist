<?php

require_once __DIR__ . "/../Model/Todolist.php";
require_once __DIR__ . "/../View/ViewShowTodolist.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";

addTodolist("Eko");
addTodolist("Kurniawan");
addTodolist("Khannedy");
addTodolist("Budi");
addTodolist("Joko");

viewShowTodolist();
