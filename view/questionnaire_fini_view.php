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
        <h2>Informations</h2>
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
        <h3>Questions</h3>
        <p>1. Quel serait le meilleur choix de mot de passe ?
        </p>
        <input type="radio" name="q1" value="a">jmmouquet<br>
        <input type="radio" name="q1" value="b">02101987<br>
        <input type="radio" name="q1" value="c">JmMouquet<br>
        <input type="radio" name="q1" value="d">Jm-02#M0uqu3T<br>

        <p>2. Mr. Mouquet est parti en vacances. Afin que ses collègues puissent accéder aux dossiers nécessaires pendant son absence, que doit-il faire ?</p>
        <input type="radio" name="q2" value="a">Écrire son mot de passe sur un post-it et le laisser sur son bureau.<br>
        <input type="radio" name="q2" value="b">Envoyer ses dossiers par mail au chef de projet.<br>
        <input type="radio" name="q2" value="c">Donner son mot de passe à un collègue de confiance.<br>
        <input type="radio" name="q2" value="d">Ne pas verrouiller son poste de travail.<br>

        <p>3. Quel mot de passe est le plus important ?</p>
        <input type="radio" name="q3" value="a">Celui de son compte bancaire.<br>
        <input type="radio" name="q3" value="b">Celui de son compte Netflix.<br>
        <input type="radio" name="q3" value="c">Celui de son compte de messagerie.<br>
        <input type="radio" name="q3" value="d">Celui de mon compte copain d’avant.<br>

        <p>4. Quel site est le plus sécurisé ?</p>
        <input type="radio" name="q4" value="a"><code>http://netfliix.com</code><br>
        <input type="radio" name="q4" value="b"><code>http://net-flix.fr</code><br>
        <input type="radio" name="q4" value="c"><code>https://netflix.com</code><br>
        <input type="radio" name="q4" value="d"><code>https://netflx.com</code><br>


        <p>5. J’ai reçu un mail m’indiquant un lien, dans le but de faire un don pour l’acteur Brad Pitt actuellement hospitalisé. Que dois-je faire ?</p>
        <input type="radio" name="q5" value="a">Je clique tout de suite sur le bouton car c’est mon acteur favori.<br>
        <input type="radio" name="q5" value="b">Je réponds au mail pour demander des informations complémentaire <i>(et peut-être un petit autographe)</i><br>
        <input type="radio" name="q5" value="c">Je le transfère à tous mes collègues.<br>
        <input type="radio" name="q5" value="d">Je supprime ou signale le mail comme phishing.<br>

        <p>6. Comment puis-je me rappeler de tous mes mots de passe ?</p>
        <input type="radio" name="q6" value="a">En utilisant toujours le même, c’est plus simple.<br>
        <input type="radio" name="q6" value="b">Utiliser un gestionnaire de mot de passe.<br>
        <input type="radio" name="q6" value="c">Ecrire tous mes mots de passe sur un papier.<br>
        <input type="radio" name="q6" value="d">Utiliser mon nom ainsi que mon année de naissance.<br>

        <p>7. Que signifie l’authentification à deux facteurs ?</p>
        <input type="radio" name="q7" value="a">Utiliser deux mots de passe différents.<br>
        <input type="radio" name="q7" value="b">Se connecter avec un mot de passe et un second code de vérification.<br>
        <input type="radio" name="q7" value="c">Avoir deux comptes différents.<br>
        <input type="radio" name="q7" value="d">Changer son mot de passe deux fois par an.<br>

        <p>8. Je pense que mon mot de passe a été compromis, que dois-je faire ?</p>
        <input type="radio" name="q8" value="a">Ne rien faire.<br>
        <input type="radio" name="q8" value="b">Changer immédiatement son mot de passe.<br>
        <input type="radio" name="q8" value="c">Créer un nouveau compte.<br>
        <input type="radio" name="q8" value="d">Eteindre son ordinateur.<br>

        <p>9. J’ai trouvé une clé USB dans le parking de mon entreprise. Que dois-je faire ?</p>
        <input type="radio" name="q9" value="a">Vous la branchez pour voir ce qu’elle contient.<br>
        <input type="radio" name="q9" value="b">Vous la gardez.<br>
        <input type="radio" name="q9" value="c">Vous la remettez au service informatique.<br>
        <input type="radio" name="q9" value="d">Vous la jetez à la poubelle.<br>

        <p>Question 10 : Pourquoi faut-il faire les mises à jour de son ordinateur ?</p>
        <input type="radio" name="q10" value="a">Pour changer l’apparence du système.<br>
        <input type="radio" name="q10" value="b">Pour corriger des failles de sécurité.<br>
        <input type="radio" name="q10" value="c">Pour ralentir l’ordinateur.<br>
        <input type="radio" name="q10" value="d">Pour supprimer des fichiers.<br>
    </form>
</body>
</html>