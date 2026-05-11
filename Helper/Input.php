<?php

/**
 * Mengambil input dari terminal
 */
function input(string $info): string
{
    echo "$info : ";
    $result = fgets(STDIN);
    return trim($result);
}
