<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Quiz sur la sécurité</title>
    <link rel="stylesheet" href="static/CSS/style.css">
</head>

<body>

    <h1>Quiz sur la sécurité</h1>

    <form action="index.php" method="post">
        <?php if (!$this->questionnaireFinished): ?>
            Temps écoulé : <span id="chrono">0</span> s
            <h2>Informations</h2>
            <div class="info">

                <div>
                    <label>Nom :</label>
                    <input type="text" name="nom" required>
                </div>

                <div>
                    <label>Prénom :</label>
                    <input type="text" name="prenom" required>
                </div>
            </div>
        <?php else: ?>
            <h2>Résultats</h2>
            <div class="info">

                <div>
                    <label>Nom : <?= $_POST['nom'] ?></label>
                </div>

                <div>
                    <label>Prénom : <?= $_POST['prenom'] ?></label>
                </div>
                <div>
                    <label>Résultat : <?= $this->score ?></label>
                </div>
            </div>
        <?php endif; ?>
        <h3>Questions</h3>
        <p class="question">Question 1 : Quel serait le meilleur choix de mot de passe ?
        </p>
        <?php if (isset($this->errors['q1'])): ?>
            <p><?= $this->errors['q1'] ?></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q1'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q1" value="a" <?= isset($this->input['q1'][0]) && $this->input['q1'][0] == 'a' ? 'checked' : '' ?>>
            jmmouquet<br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q1'][0] == 'b' ? 'incorrect' : '' ?>">
            <input type="radio" name="q1" value="b" <?= isset($this->input['q1'][0]) && $this->input['q1'][0] == 'b' ? 'checked' : '' ?>>02101987<br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q1'][0] == 'c' ? 'incorrect' : '' ?>">
            <input type="radio" name="q1" value="c" <?= isset($this->input['q1'][0]) && $this->input['q1'][0] == 'c' ? 'checked' : '' ?>>JmMouquet<br>
        </label>

        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q1" value="d" <?= isset($this->input['q1'][0]) && $this->input['q1'][0] == 'd' ? 'checked' : '' ?>>Jm-02#M0uqu3T<br>
        </label>


        <p class="question">Question 2 : Mr. Mouquet est parti en vacances. Afin que ses collègues puissent accéder aux dossiers nécessaires pendant son absence, que doit-il faire ?</p>
        <?php if (isset($this->errors['q2'])): ?>
            <p class="error"><small><?= $this->errors['q2'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && isset($this->input['q2'][0]) && $this->input['q2'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q2" value="a" <?= isset($this->input['q2'][0]) && $this->input['q2'][0] == 'a' ? 'checked' : '' ?>>Écrire son mot de passe sur un post-it et le laisser sur son bureau.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q2" value="b" <?=isset($this->input['q2'][0]) && $this->input['q2'][0] == 'b' ? 'checked' : '' ?>>Envoyer ses dossiers par mail au chef de projet.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q2'][0] == 'c' ? 'incorrect' : '' ?>">
            <input type="radio" name="q2" value="c" <?= isset($this->input['q2'][0]) && $this->input['q2'][0] == 'c' ? 'checked' : '' ?>>Donner son mot de passe à un collègue de confiance.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q2'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q2" value="d" <?= isset($this->input['q2'][0]) && $this->input['q2'][0] == 'd' ? 'checked' : '' ?>>Ne pas verrouiller son poste de travail.<br>
        </label>

        <p class="question">Question 3 : Quel mot de passe est le plus important ?</p>
        <?php if (isset($this->errors['q3'])): ?>
            <p class="error"><small><?= $this->errors['q3'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q3'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q3" value="a" <?= isset($this->input['q3'][0]) && $this->input['q3'][0] == 'a' ? 'checked' : '' ?>>Celui de son compte bancaire.<br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q3'][0] == 'b' ? 'incorrect' : '' ?>">
            <input type="radio" name="q3" value="b" <?= isset($this->input['q3'][0]) && $this->input['q3'][0] == 'b' ? 'checked' : '' ?>>Celui de son compte Netflix.<br>
        </label>

        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q3" value="c" <?= isset($this->input['q3'][0]) && $this->input['q3'][0] == 'c' ? 'checked' : '' ?>>Celui de son compte de messagerie.<br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q3'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q3" value="d" <?= isset($this->input['q3'][0]) && $this->input['q3'][0] == 'd' ? 'checked' : '' ?>>Celui de mon compte copain d’avant.<br>
        </label>

        <p class="question">Question 4 : Quel site est le plus sécurisé ?</p>
        <?php if (isset($this->errors['q4'])): ?>
            <p class="error"><small><?= $this->errors['q4'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q4'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q4" value="a" <?= isset($this->input['q4'][0]) && $this->input['q4'][0] == 'a' ? 'checked' : '' ?>><code>http://netfliix.com</code><br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q4'][0] == 'b' ? 'incorrect' : '' ?>">
            <input type="radio" name="q4" value="b" <?= isset($this->input['q4'][0]) && $this->input['q4'][0] == 'b' ? 'checked' : '' ?>><code>http://net-flix.fr</code><br>
        </label>

        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q4" value="c" <?= isset($this->input['q4'][0]) && $this->input['q4'][0] == 'c' ? 'checked' : '' ?>><code>https://netflix.com</code><br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q4'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q4" value="d" <?= isset($this->input['q4'][0]) && $this->input['q4'][0] == 'd' ? 'checked' : '' ?>><code>https://netflx.com</code><br>
        </label>


        <p class="question">Question 5 : J’ai reçu un mail m’indiquant un lien, dans le but de faire un don pour l’acteur Brad Pitt actuellement hospitalisé. Que dois-je faire ?</p>
        <?php if (isset($this->errors['q5'])): ?>
            <p class="error"><small><?= $this->errors['q5'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q5'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q5" value="a" <?= isset($this->input['q5'][0]) && $this->input['q5'][0] == 'a' ? 'checked' : '' ?>>Je clique tout de suite sur le bouton car c’est mon acteur favori.<br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q5'][0] == 'b' ? 'incorrect' : '' ?>">
            <input type="radio" name="q5" value="b" <?= isset($this->input['q5'][0]) && $this->input['q5'][0] == 'b' ? 'checked' : '' ?>>Je réponds au mail pour demander des informations complémentaire <i>(et peut-être un petit autographe)</i><br>
        </label>

        <label class="<?= $this->questionnaireFinished && $this->input['q5'][0] == 'c' ? 'incorrect' : '' ?>">
            <input type="radio" name="q5" value="c" <?= isset($this->input['q5'][0]) && $this->input['q5'][0] == 'c' ? 'checked' : '' ?>>Je le transfère à tous mes collègues.<br>
        </label>

        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q5" value="d" <?= isset($this->input['q5'][0]) && $this->input['q5'][0] == 'd' ? 'checked' : '' ?>>Je supprime ou signale le mail comme phishing.<br>
        </label>

        <p class="question">Question 6 : Comment puis-je me rappeler de tous mes mots de passe ?</p>
        <?php if (isset($this->errors['q6'])): ?>
            <p class="error"><small><?= $this->errors['q6'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q6'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q6" value="a" <?= isset($this->input['q6'][0]) && $this->input['q6'][0] == 'a' ? 'checked' : '' ?>>En utilisant toujours le même, c’est plus simple.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q6" value="b" <?= isset($this->input['q6'][0]) && $this->input['q6'][0] == 'b' ? 'checked' : '' ?>>Utiliser un gestionnaire de mot de passe.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q6'][0] == 'c' ? 'incorrect' : '' ?>">
            <input type="radio" name="q6" value="c" <?= isset($this->input['q6'][0]) && $this->input['q6'][0] == 'c' ? 'checked' : '' ?>>Ecrire tous mes mots de passe sur un papier.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q6'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q6" value="d" <?= isset($this->input['q6'][0]) && $this->input['q6'][0] == 'd' ? 'checked' : '' ?>>Utiliser mon nom ainsi que mon année de naissance.<br>
        </label>


        <p class="question">Question 7 : Que signifie l’authentification à deux facteurs ?</p>
        <?php if (isset($this->errors['q7'])): ?>
            <p class="error"><small><?= $this->errors['q7'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q7'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q7" value="a" <?= isset($this->input['q7'][0]) &&  $this->input['q7'][0] == 'a' ? 'checked' : '' ?>>Utiliser deux mots de passe différents.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q7" value="b" <?= isset($this->input['q7'][0]) && $this->input['q7'][0] == 'b' ? 'checked' : '' ?>>Se connecter avec un mot de passe et un second code de vérification.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q7'][0] == 'c' ? 'incorrect' : '' ?>">
            <input type="radio" name="q7" value="c" <?= isset($this->input['q7'][0]) && $this->input['q7'][0] == 'c' ? 'checked' : '' ?>>Avoir deux comptes différents.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q7'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q7" value="d" <?= isset($this->input['q7'][0]) &&  $this->input['q7'][0] == 'd' ? 'checked' : '' ?>>Changer son mot de passe deux fois par an.<br>
        </label>

        <p class="question">Question 8 : Je pense que mon mot de passe a été compromis, que dois-je faire ?</p>
        <?php if (isset($this->errors['q8'])): ?>
            <p class="error"><small><?= $this->errors['q8'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q8'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q8" value="a" <?= isset($this->input['q8'][0]) && $this->input['q8'][0] == 'a' ? 'checked' : '' ?>>Ne rien faire.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q8" value="b" <?= isset($this->input['q8'][0]) && $this->input['q8'][0] == 'b' ? 'checked' : '' ?>>Changer immédiatement son mot de passe.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q8'][0] == 'c' ? 'incorrect' : '' ?>">
            <input type="radio" name="q8" value="c" <?= isset($this->input['q8'][0]) && $this->input['q8'][0] == 'c' ? 'checked' : '' ?>>Créer un nouveau compte.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q8'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q8" value="d" <?= isset($this->input['q8'][0]) && $this->input['q8'][0] == 'd' ? 'checked' : '' ?>>Eteindre son ordinateur.<br>
        </label>

        <p class="question">Question 9 : J’ai trouvé une clé USB dans le parking de mon entreprise. Que dois-je faire ?</p>
        <?php if (isset($this->errors['q9'])): ?>
            <p class="error"><small><?= $this->errors['q9'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q9'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q9" value="a" <?= isset($this->input['q9'][0]) && $this->input['q9'][0] == 'a' ? 'checked' : '' ?>>Vous la branchez pour voir ce qu’elle contient.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q9'][0] == 'b' ? 'incorrect' : '' ?>">
            <input type="radio" name="q9" value="b" <?= isset($this->input['q9'][0]) && $this->input['q9'][0] == 'b' ? 'checked' : '' ?>>Vous la gardez.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q9" value="c" <?= isset($this->input['q9'][0]) && $this->input['q9'][0] == 'c' ? 'checked' : '' ?>>Vous la remettez au service informatique.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q9'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q9" value="d" <?= isset($this->input['q9'][0]) && $this->input['q9'][0] == 'd' ? 'checked' : '' ?>>Vous la jetez à la poubelle.<br>
        </label>

        <p class="question">Question 10 : Pourquoi faut-il faire les mises à jour de son ordinateur ?</p>
        <?php if (isset($this->errors['q10'])): ?>
            <p class="error"><small><?= $this->errors['q10'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished && $this->input['q10'][0] == 'a' ? 'incorrect' : '' ?>">
            <input type="radio" name="q10" value="a" <?= isset($this->input['q10'][0]) && $this->input['q10'][0] == 'a' ? 'checked' : '' ?>>Pour changer l’apparence du système.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="radio" name="q10" value="b" <?= isset($this->input['q10'][0]) && $this->input['q10'][0] == 'b' ? 'checked' : '' ?>>Pour corriger des failles de sécurité.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q10'][0] == 'c' ? 'incorrect' : '' ?>">
            <input type="radio" name="q10" value="c" <?= isset($this->input['q10'][0]) && $this->input['q10'][0] == 'c' ? 'checked' : '' ?>>Pour ralentir l’ordinateur.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && $this->input['q10'][0] == 'd' ? 'incorrect' : '' ?>">
            <input type="radio" name="q10" value="d" <?= isset($this->input['q10'][0]) && $this->input['q10'][0] == 'd' ? 'checked' : '' ?>>Pour supprimer des fichiers.<br>
        </label>

        <p class="question">Question 11 : Pour protéger mes usages numériques pro/perso :</p>
        <?php if (isset($this->errors['q11'])): ?>
            <p class="error"><small><?= $this->errors['q11'] ?></small></p>
        <?php endif; ?>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="checkbox" name="q11[]" value="a" <?= isset($this->input['q8'][0]) && in_array('a', $this->input['q11']) ? 'checked' : '' ?>>J’utilise un stockage de données professionnelles distinct du stockage de données personnelles.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="checkbox" name="q11[]" value="b" <?= isset($this->input['q8'][0]) && in_array('a', $this->input['q11']) ? 'checked' : '' ?>>J’utilise ma connexion professionnelle uniquement pour mes besoins professionnels.<br>
        </label>
        <label class="<?= $this->questionnaireFinished && in_array('c', $this->input['q11']) ? 'incorrect' : '' ?>">
            <input type="checkbox" name="q11[]" value="c" <?= isset($this->input['q8'][0]) && in_array('c', $this->input['q11'])? 'checked' : '' ?>>J’utilise mon matériel professionnel pour des besoins personnels.<br>
        </label>
        <label class="<?= $this->questionnaireFinished ? 'correct' : '' ?>">
            <input type="checkbox" name="q11[]" value="d" <?= isset($this->input['q8'][0]) && in_array('d', $this->input['q11']) ? 'checked' : '' ?>>J’effectue les mises à jour de mes systèmes très régulièrement.<br>
        </label>


        <input type="hidden" name="time" id="time">
        <button type="submit">Envoyer</button>
    </form>
</body>
<?php if (!$this->questionnaireFinished): ?>
    <script>
        let debut = Date.now();

        document.querySelector("form").addEventListener("submit", function() {

            let fin = Date.now();
            let timeLeft = Math.floor((fin - debut) / 1000);

            document.getElementById("time").value = timeLeft
        });

        setInterval(function() {
            let maintenant = Date.now();
            let time = Math.floor((maintenant - debut) / 1000);
            document.getElementById("chrono").textContent = time;
        }, 1000);
    </script>
<?php else: ?>
    <script>
        let radiosButtons = document.querySelectorAll("input[type='radio']")
        radiosButtons.forEach((elem) => elem.disabled = true)
    </script>
<?php endif; ?>


</html>