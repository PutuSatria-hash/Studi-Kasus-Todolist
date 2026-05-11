<?php

/**
 * Menghapus todo dari list
 */
function removeTodolist(int $number): bool
{
    global $todolist;

    if ($number > count($todolist)) {
        return false;
    }

    for ($i = $number; $i < count($todolist); $i++) {
        $todolist[$i] = $todolist[$i + 1];
    }

    unset($todolist[count($todolist)]);

    return true;
}
