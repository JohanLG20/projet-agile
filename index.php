<?php

session_start();

include('cls/config.php');

include(ROOT . '/cls/router.php');

if(isset($_GET['action']) && !isset($_SESSION['connexion'])){
    ROUTER::redirect($_GET['action']);
}

else if(isset($_GET['action']) && isset($_SESSION['connexion'])){
    ROUTER::redirect($_GET['action'], $_SESSION['connexion']);
}

else{
    ROUTER::redirect();
}