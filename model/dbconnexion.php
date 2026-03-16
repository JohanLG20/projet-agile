<?php

/**
 * A class that can be instanciate to create a connexion on the database.
 * Once it is create, functions allows different types of behaviors.
 */
class DBConnexion
{
    private static ?DBConnexion $instance = null;
    private PDO $connexion;

    private function __construct()
    {
        try {

            $this->connexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, $_SESSION['DB_USER'], $_SESSION['DB_PASSWORD']);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException("Identifiant ou mot de passe incorrect" . $e->getMessage());
        }
    }

    public static function getInstance(): DBConnexion
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function getConnexion() : PDO
    {
        return $this->connexion;
    }


}
