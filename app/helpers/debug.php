<?php

/**
 * Dump and die.
 *
 * @param $var
 * @return void
 */
function dd($var) {
    echo '<pre>';
    echo '<code>';
    var_dump($var);
    echo '</code>';
    echo '</pre>';
    die();
}
