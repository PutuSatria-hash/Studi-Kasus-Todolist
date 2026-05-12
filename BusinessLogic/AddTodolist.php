<?php

/**
 * Menambah todo ke list
 */
function addTodolist(string $todo)
{
    $number = count($_SESSION['todolist']) + 1;
    $_SESSION['todolist'][$number] = $todo;
}
