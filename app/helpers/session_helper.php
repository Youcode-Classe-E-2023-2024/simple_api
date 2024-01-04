<?php

session_start();

function adminIsLoggedIn(){
    if(isset($_SESSION['user_id']) && ($_SESSION['roleId'] ===1 || $_SESSION['roleId'] ===2)){
        return true;
    } else {
        return false;
    }

}

function clientIsLoggedIn(){
    if(isset($_SESSION['user_id']) && $_SESSION['roleId'] ===3){
        return true;
    } else {
        return false;
    }
}
