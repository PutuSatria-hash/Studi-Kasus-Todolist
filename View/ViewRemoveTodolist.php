<?php

require_once __DIR__ . "/../Helper/Input.php";
require_once __DIR__ . "/../BusinessLogic/RemoveTodolist.php";

/**
 * Menampilkan view hapus todo
 */
function viewRemoveTodolist()
{
    echo "MENGHAPUS TODOLIST" . PHP_EOL;

    $pilihan = input("Nomor (x untuk batal)");

    if ($pilihan == "x") {
        echo "Batal menghapus todo" . PHP_EOL;
    } else {
        $success = removeTodolist($pilihan);

        if ($success) {
            echo "Sukses menghapus todo nomor $pilihan" . PHP_EOL;
        } else {
            echo "Gagal menghapus todo nomor $pilihan" . PHP_EOL;
        }
    }
}
