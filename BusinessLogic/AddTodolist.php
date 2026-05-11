<?php

/**
 * Menambah todo ke list
 */
function addTodolist(string $todo)
{
    global $todolist;

    $number = count($todolist) + 1;
    $todolist[$number] = $todo;
}
