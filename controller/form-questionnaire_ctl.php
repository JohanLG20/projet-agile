<?php
/*
 * Contrôle de qualité du questionnaire
 * Tester les champs (nom + prénom, boutons radio)
 */

class Quizz
{
    public $errors = [];
    public array $reponses = [
        'nom' => null,
        'prenom' => null,
        'q1' => null,
    ];

    public function __construct()
    {
        // Contrôle de qualité (trouve les erreurs et ajoute les messages dans le tableau $errors)
        if (!empty($_POST)) {
            $this->reponses['nom'] = htmlspecialchars($_POST['nom']) ?? null;
            $this->reponses['prenom'] = htmlspecialchars($_POST['prenom']) ?? null;
            $this->reponses['q1'] = htmlspecialchars($_POST['q1']) ?? null;

            if (!$this->reponses['nom']) {
                $this->errors['nom'] = "Requis";
            } else  if (strlen(trim($this->reponses['nom'])) < 3) {
                $this->errors['nom'] = "Au moins 3 caractères";
            } else if (strlen(trim($this->reponses['nom'])) > 50) {
                $this->errors['nom'] = "Moins de 50 caractères";
            }
            if (!$this->reponses['prenom']) {
                $this->errors['prenom'] = "Requis";
            } else  if (strlen(trim($this->reponses['prenom'])) < 3) {
                $this->errors['prenom'] = "Au moins 3 caractères";
            } else if (strlen(trim($this->reponses['prenom'])) > 50) {
                $this->errors['prenom'] = "Moins de 50 caractères";
            }

            if (!$this->reponses['q1']) {
                $this->errors['price'] = "Requis";
            } else if (preg_match('placeholder', $this->reponses['q1']) == 0) { // mettre regex pour les options possibles
                $this->errors['price'] = "Valeur incorrecte";
            }
        }

        // Si $_POST est vide (début) ou qu'il y a des erreurs, affiche la page du questionnaire
        if (empty($_POST) || !empty($this->errors)) {
            require './vue/questionnaire_vue.php';
        }
        // Si le $_POST est rempli sans erreurs, envoie les résultats dans la BDD et affiche la page de validation
        else {
            require './model/table_result.php'; // envoie le produit sur la bdd
            require './vue/questionnaire_fini_vue.php'; // affiche page succès
        }
    }
}