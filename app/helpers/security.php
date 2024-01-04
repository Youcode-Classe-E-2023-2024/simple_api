<?php

/**
 * Prevent inputs from XSS vulnerability.
 *
 * @param string $str
 * @return string
 */
function str_secure($str) {
    return trim(htmlspecialchars($str));
}
