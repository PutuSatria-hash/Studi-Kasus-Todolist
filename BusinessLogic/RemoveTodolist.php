<?php

/**
 * Menghapus todo dari list
 */
function removeTodolist(int $number): bool
{
    if ($number > count($_SESSION['todolist'])) {
        return false;
    }

    for ($i = $number; $i < count($_SESSION['todolist']); $i++) {
        $_SESSION['todolist'][$i] = $_SESSION['todolist'][$i + 1];
    }

    unset($_SESSION['todolist'][count($_SESSION['todolist'])]);

    return true;
}
