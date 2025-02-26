<?php

function userConnected(){
    if(isset($_SESSION['user'])) return true;
    else
    return false;
}

function adminConnected(){
    if(userConnected() && $_SESSION['user']['status'] == 'admin') return true;
    else
    return false;
}

?>