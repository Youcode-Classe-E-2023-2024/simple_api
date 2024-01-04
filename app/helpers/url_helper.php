<?php

/**
 * Simple page redirect.
 * @param string $page
 * @return void
 */
function redirect($page){
    header('location: ' . URL_ROOT . '/' . $page);
}
