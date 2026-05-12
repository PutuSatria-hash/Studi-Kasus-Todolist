<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['todolist'])) {
    $_SESSION['todolist'] = [
        1 => "Belajar PHP Dasar",
        2 => "Membuat Aplikasi Todolist",
        3 => "Mendesain Tampilan Web"
    ];
}

if (!isset($_SESSION['completed_todolist'])) {
    $_SESSION['completed_todolist'] = [];
}

// Sinkronisasi untuk kompatibilitas CLI
$todolist = &$_SESSION['todolist'];
$completed_todolist = &$_SESSION['completed_todolist'];
