<?php
/*
 * Contrôle de qualité du questionnaire
 * Tester les champs (nom + prénom, boutons radio)
 */

class Quizz
{
    /* 
     * Si des erreurs sont détectées, $errors sera rempli de façon :
     * ['q1' => 'message d'erreur',
     * 'q2' => 'message d'erreur',]
     */
    public array $errors = [];

    public bool $questionnaireFinished = false;

    protected $nom = '';
    protected $prenom = '';

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
        'q1' => 'd',
        'q2' => 'b',
        'q3' => 'c',
        'q4' => 'c',
        'q5' => 'd',
        'q6' => 'b',
        'q7' => 'b',
        'q8' => 'b',
        'q9' => 'c',
        'q10' => 'b',
    ];
    protected int $score = 0;

    protected int $time = 0;




    public function __construct()
    {
        // Contrôle de qualité (trouve les erreurs et ajoute les messages dans le tableau $errors)
        if (!empty($_POST)) {
            $this->nom = htmlspecialchars($_POST['nom'] ?? null);
            $this->prenom = htmlspecialchars($_POST['prenom'] ?? null);

            $this->input['q1'] = htmlspecialchars($_POST['q1'] ?? null);
            $this->input['q2'] = htmlspecialchars($_POST['q2'] ?? null);
            $this->input['q3'] = htmlspecialchars($_POST['q3'] ?? null);
            $this->input['q4'] = htmlspecialchars($_POST['q4'] ?? null);
            $this->input['q5'] = htmlspecialchars($_POST['q5'] ?? null);
            $this->input['q6'] = htmlspecialchars($_POST['q6'] ?? null);
            $this->input['q7'] = htmlspecialchars($_POST['q7'] ?? null);
            $this->input['q8'] = htmlspecialchars($_POST['q8'] ?? null);
            $this->input['q9'] = htmlspecialchars($_POST['q9'] ?? null);
            $this->input['q10'] = htmlspecialchars($_POST['q10'] ?? null);

            $this->time = intval(htmlspecialchars($_POST['time'] ?? null));


            if (!$this->nom) {
                $this->errors['nom'] = "Requis";
            } else  if (strlen(trim($this->nom)) < 1) {
                $this->errors['nom'] = "Au moins 1 caractères";
            } else if (strlen(trim($this->nom)) > 50) {
                $this->errors['nom'] = "Moins de 50 caractères";
            }

            if (!$this->prenom) {
                $this->errors['prenom'] = "Requis";
            } else if (strlen(trim($this->prenom)) < 1) {
                $this->errors['prenom'] = "Au moins 1 caractères";
            } else if (strlen(trim($this->prenom)) > 50) {
                $this->errors['prenom'] = "Moins de 50 caractères";
            }

            /*
             * Boucle foreach qui teste chaque réponse utilisateur et la compare aux bonnes réponses
             */
            foreach ($this->input as $key => $value) {
                if (!$value) {
                    $this->errors[$key] = "Requis";
                } else if (preg_match('/^[a-d]$/', $value) == 0) { // Teste que la valeur soit entre 'a' et 'd'
                    $this->errors[$key] = "Valeur incorrecte";
                } else if ($value === $this->reponses[$key]) { // Si la réponse est bonne, incrémente le score
                    $this->score += 1;
                }
            }
            if (!$this->time) {
                $this->errors['time'] = "Temps introuvable";
            } else if ($this->time > 1000) {
                $this->errors['time'] = "Vous ne devez pas prendre plus de 100 ans";
            } else if ($this->time < 0) {
                $this->errors['time'] = "Vous allez trop vite";
            }
        }

        // Debug
        // var_dump($this->errors);
        // echo '<br>';
        // var_dump($this->input['q1']);
        // echo '<br>';
        // var_dump($this->time);

        // Si $_POST est vide (début) ou qu'il y a des erreurs, affiche la page du questionnaire
        if (empty($_POST) || !empty($this->errors)) {
            require VIEW . '/questionnaire_view.php';
        }
        // Si le $_POST est rempli sans erreurs, envoie les résultats dans la BDD table `RESULTS` et affiche la page de validation
        else {
            require MODEL . '/table_result.php'; // envoie le produit sur la bdd
            // Créée tableau results
            $results = [
                'prenom' => $this->prenom,
                'nom' => $this->nom,
                'resultat' => $this->score,
                'temps' => $this->time,
            ];
            DBResults::addResult($results);
            require VIEW . '/questionnaire_fini_view.php'; // affiche page succès
        }
    }
}
new Quizz;
