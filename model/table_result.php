<?php

require(MODEL . '/dbconnexion.php');

class DBResults
{

    public static function addResult(array $results)
    {
        try {
            $db = DBConnexion::getInstance()->getConnexion();
            $query = $db->prepare("INSERT INTO `RESULTS`(`prenom`, `nom`, `resultat`, `temps`, `date`)
                            VALUES (:prenom , :nom, :resultat, :temps, NOW())");

            $query->execute([
                ":prenom" => $results['prenom'],
                ":nom" => $results['nom'],
                ":resultat" => $results['resultat'],
                ":temps" => $results['temps']
            ]);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

        public static function getAllResults() : array
    {
        try {
            $db = DBConnexion::getInstance()->getConnexion();
            $query = $db->prepare("SELECT * FROM RESULTS");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
