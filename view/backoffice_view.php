<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="static/CSS/style.css">
</head>

<body>
    <h1>Resultats</h1>

    <table>
        <thead>
            <tr>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Résultat</th>
                <th scope="col">Temps</th>
                <th scope="col">Date de passage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?= $result['prenom'] ?></th>
                    <td><?= $result['nom'] ?></td>
                    <td><?= $result['resultat'] ?></td>
                    <td><?= $result['temps'] ?></td>
                    <td><?= $result['date'] ?></td>

                </tr>

            <?php endforeach ?>
        </tbody>


    </table>
</body>

</html>