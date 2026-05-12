<?php

/**
 * Menyelesaikan todo dari list
 */
function completeTodolist(int $number): bool
{
    if (!isset($_SESSION['todolist'][$number])) {
        return false;
    }

    // Ambil item yang akan diselesaikan
    $todo = $_SESSION['todolist'][$number];

    // Tambahkan ke completed_todolist
    $_SESSION['completed_todolist'][] = $todo;

    // Hapus dari todolist menggunakan fungsi removeTodolist yang sudah ada
    // Namun kita perlu logika geser yang sama agar index tetap urut
    return removeTodolist($number);
}
