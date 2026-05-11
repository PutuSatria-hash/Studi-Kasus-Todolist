<?php

require_once __DIR__ . "/../Helper/Input.php";
require_once __DIR__ . "/../BusinessLogic/AddTodolist.php";

/**
 * Menampilkan view tambah todo
 */
function viewAddTodolist()
{
    echo "MENAMBAH TODOLIST" . PHP_EOL;

    $todo = input("Todo (x untuk batal)");

    if ($todo == "x") {
        echo "Batal menambah todo" . PHP_EOL;
    } else {
        addTodolist($todo);
    }
}
