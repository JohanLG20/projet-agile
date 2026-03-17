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
    protected array $errors = [];

    protected $nom = '';
    protected $prenom = '';

    protected array $input = [
        'q1' => [],
        'q2' => [],
        'q3' => [],
        'q4' => [],
        'q5' => [],
        'q6' => [],
        'q7' => [],
        'q8' => [],
        'q9' => [],
        'q10' => [],
        'q11' => [],
    ];
    protected array $reponses = [
        'q1' => ['d', 1],
        'q2' =>  ['b', 1],
        'q3' =>  ['c', 1],
        'q4' =>  ['c', 1],
        'q5' =>  ['d', 1],
        'q6' =>  ['b', 1],
        'q7' =>  ['b', 1],
        'q8' =>  ['b', 1],
        'q9' =>  ['c', 1],
        'q10' => ['b', 1],
        'q11' => [['a', 'b', 'd'], 1],
    ];
    protected int $score = 0;

    protected int $time = 0;

    protected bool $questionnaireFinished = false;

    public function __construct()
    {


        if (!empty($_POST)) {
            foreach ($_POST as $key => $post_element) {
                // Regarde si l'élément est un tableau pour remplir les réponses utilisateur dans $input
                if (is_array($post_element)) {
                    foreach ($post_element as $value) {
                        array_push($this->input[$key], htmlspecialchars($value));
                    };
                }
                // Sinon
                else {
                    switch ($key) {
                        case 'time':
                            $this->time = intval(htmlspecialchars($_POST['time']));
                            break;
                        case 'nom':
                            $this->nom = htmlspecialchars($post_element);
                            break;
                        case 'prenom':
                            $this->prenom = htmlspecialchars($post_element);
                            break;
                        default:
                            array_push($this->input[$key], htmlspecialchars($post_element));
                    }
                }
            }

            /*
             * Contrôle de qualité (trouve les erreurs et ajoute les messages dans le tableau $errors)
             */
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
             * -- Test du questionnaire --
             * Boucle foreach qui teste chaque réponse utilisateur et la compare aux bonnes réponses
             */
            foreach ($this->input as $key => $value) {
                // Si l'utilisateur n'a pas coché de réponse
                if (empty($value[0])) {
                    $this->errors[$key] = "Requis";
                    // Si la question correspondante a des réponses multiples
                } else if (is_array($this->reponses[$key][0])) {
                    foreach ($value[0] as $user_answer) {
                        foreach ($this->reponses[$key][0] as $reponse) {
                            if ($user_answer == $reponse) {
                                // calcul score bonne réponse qcm
                                // TODO : diviser les points du poids de la question par le nombre de bonnes réponses
                                $this->score += 0.33;
                            }
                        }
                    }
                } else if (preg_match('/^[a-d]$/', $value) == 0) { // Teste que la valeur soit entre 'a' et 'd'
                    $this->errors[$key] = "Valeur incorrecte";
                } else if ($value[0] === $this->reponses[$key]) { // Si la réponse est bonne, incrémente le score
                    $this->score += $this->reponses[$key][1];
                } else {   // Si la réponse est mauvaise, pénalise le score
                    $this->score -= 1;
                }
            }
            // arrondit le score
            $this->score = round($this->score);

            if (!$this->time) {
                $this->errors['time'] = "Temps introuvable";
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

            $this->questionnaireFinished = true;
            require VIEW . '/questionnaire_view.php'; // affiche page succès
        }
    }
}
new Quizz;
