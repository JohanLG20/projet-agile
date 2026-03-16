<?php
/*
 * Contrôle de qualité du questionnaire
 * Tester les champs (nom + prénom, boutons radio)
 */

class Quizz
{
    public array $errors = [];
    protected string $nom = '';
    protected string $prenom = '';

    protected array $input = [
        'q1' => null,
        'q2' => null,
        'q3' => null,
        'q4' => null,
        'q5' => null,
        'q6' => null,
        'q7' => null,
        'q8' => null,
        'q9' => null,
        'q10' => null,
    ];
    protected array $reponses = [
        'q1' => 4,
        'q2' => 2,
        'q3' => 3,
        'q4' => 3,
        'q5' => 4,
        'q6' => 2,
        'q7' => 2,
        'q8' => 2,
        'q9' => 3,
        'q10' => 2,
    ];
    protected int $score;


    public function __construct()
    {
        // Contrôle de qualité (trouve les erreurs et ajoute les messages dans le tableau $errors)
        if (!empty($_POST)) {
            $this->nom = htmlspecialchars($_POST['nom']) ?? null;
            $this->prenom = htmlspecialchars($_POST['prenom']) ?? null;
            $this->input['q1'] = htmlspecialchars($_POST['q1']) ?? null;
            $this->input['q2'] = htmlspecialchars($_POST['q2']) ?? null;
            $this->input['q3'] = htmlspecialchars($_POST['q3']) ?? null;
            $this->input['q4'] = htmlspecialchars($_POST['q4']) ?? null;
            $this->input['q5'] = htmlspecialchars($_POST['q5']) ?? null;
            $this->input['q6'] = htmlspecialchars($_POST['q6']) ?? null;
            $this->input['q7'] = htmlspecialchars($_POST['q7']) ?? null;
            $this->input['q8'] = htmlspecialchars($_POST['q8']) ?? null;
            $this->input['q9'] = htmlspecialchars($_POST['q9']) ?? null;
            $this->input['q10'] = htmlspecialchars($_POST['q10']) ?? null;


            if (!$this->input['nom']) {
                $this->errors['nom'] = "Requis";
            } else  if (strlen(trim($this->input['nom'])) < 3) {
                $this->errors['nom'] = "Au moins 3 caractères";
            } else if (strlen(trim($this->input['nom'])) > 50) {
                $this->errors['nom'] = "Moins de 50 caractères";
            }

            if (!$this->input['prenom']) {
                $this->errors['prenom'] = "Requis";
            } else  if (strlen(trim($this->input['prenom'])) < 3) {
                $this->errors['prenom'] = "Au moins 3 caractères";
            } else if (strlen(trim($this->input['prenom'])) > 50) {
                $this->errors['prenom'] = "Moins de 50 caractères";
            }

            if (!$this->input['q1']) {
                $this->errors['price'] = "Requis";
            } else if (preg_match('/^[1-4]$/', $this->input['q1']) == 0) { // Teste que la valeur soit un int entre 1 et 4
                $this->errors['price'] = "Valeur incorrecte";
            } else if ($this->input['q1'] === $this->reponses['q1']) {
                $this->score + 1;
            }

            
            foreach ($this->input as $key => $value) {
                if (!$value) {
                    $this->errors['price'] = "Requis";
                } else if (preg_match('/^[1-4]$/', $value) == 0) { // Teste que la valeur soit un int entre 1 et 4
                    $this->errors['price'] = "Valeur incorrecte";
                } else if ($value === $this->reponses[$key]) {
                    $this->score + 1;
                }
            }
        }

        // Si $_POST est vide (début) ou qu'il y a des erreurs, affiche la page du questionnaire
        if (empty($_POST) || !empty($this->errors)) {
            require VIEW . '/questionnaire_view.php';
        }
        // Si le $_POST est rempli sans erreurs, envoie les résultats dans la BDD et affiche la page de validation
        else {
            require MODEL . '/table_result.php'; // envoie le produit sur la bdd
            require VIEW . '/questionnaire_fini_vue.php'; // affiche page succès
        }
    }
}
