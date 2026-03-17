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
        'q11' => [],
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
        'q11' => ['a', 'b', 'd'],
    ];
    protected int $score = 0;

    protected int $time = 0;

    protected bool $isFinished = false;

    public function __construct()
    {

        /*
         * Contrôle de qualité (trouve les erreurs et ajoute les messages dans le tableau $errors)
         * Le nom des éléments du $_POST DOIT correspondre aux noms des propriétés respectives
         */
        if (!empty($_POST)) {
            foreach ($_POST as $key => $post_element) {
                if (is_array($post_element)) {  // Regarde si l'élément est un tableau pour obtenir les input sur les questions à choix multiples
                    foreach ($post_element as $value) {
                        array_push($this->input[$key], htmlspecialchars($value));
                    };
                } else {
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
                            $this->input[$key] = htmlspecialchars($post_element);
                    }
                }
            }

            echo var_dump($_POST['q11']) . '<br>';
            var_dump($this->input);

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
                } else if (is_array($this->reponses[$key])) {
                    if (is_string($value)) { // si il n'y a qu'une seule réponse dans la question à choix multiple
                        foreach ($this->reponses[$key] as $reponse) {
                            if ($value == $reponse) {
                                $this->score += 1;
                            };
                        }
                    } else {
                        foreach ($value as $choice) {
                            foreach ($this->reponses[$key] as $reponse) {
                                if ($choice == $reponse) {
                                    $this->score += 1;
                                }
                            }
                        }
                    }
                } else if (preg_match('/^[a-d]$/', $value) == 0) { // Teste que la valeur soit entre 'a' et 'd'
                    $this->errors[$key] = "Valeur incorrecte";
                } else if ($value === $this->reponses[$key]) { // Si la réponse est bonne, incrémente le score
                    $this->score += 1;
                } else {   // Si la réponse est mauvaise, pénalise le score
                    $this->score -= 1;
                }
            }

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

            $this->isFinished = true;
            require VIEW . '/questionnaire_fini_view.php'; // affiche page succès
        }
    }
}
new Quizz;
