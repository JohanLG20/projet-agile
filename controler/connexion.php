<?php

if (isset($_POST['connexion'])) {
    $_SESSION['DB_USER'] = htmlspecialchars($_POST['DB_USER']);
    $_SESSION['DB_PASSWORD'] = htmlspecialchars($_POST['DB_PASSWORD']);
    try {
        require_once(MODEL . "/dbconnexion.php");
        DBConnexion::getInstance()->getConnexion();
        $_SESSION['connexion'] = true;
        header("Location: index.php?action=backoffice");
    } catch (PDOException $e) {
        $errors['connexion'] = $e->getMessage();
    }
}




include(VIEW . "/connexion_view.php");
