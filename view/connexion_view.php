<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="static/CSS/style.css">
</head>

<body>
    <h1>Entrez vos identifiants ici</h1>
    <form action="index.php?action=connexion" method="post">
        <label for="">Username <input type="text" name="DB_USER"></label>
        <label for="">Password <input type="password" name="DB_PASSWORD"></label>
        <input type="hidden" name="connexion">
        <button type="submit" class="btn btn-primary">Se connecter</button>
        <?php if (isset($errors["connexion"])): ?>
            <p class="error"><?= $errors['connexion'] ?></p>
        <?php endif; ?>
    </form>

</body>

</html>