<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <h1>Inscription</h1>
    <form action="traitement_creation_compte.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="confirmpass" placeholder="confirmation password">
        <input type="submit" value="cree">
    </form>
</div>
<?php
if(isset($_GET['reg_err'])){
    $err = htmlspecialchars(filter_input(INPUT_GET,'reg_err'));
    switch($err){
        case 'already':
            ?>
            <div class="alert alert-danger">
                <strong>Erreur</strong> le compte ayant cette identifiant est deja existant
            </div>
            <?php
            break;
        case 'identifiant_length':
            ?>
            <div class="alert alert-danger">
                <strong>Erreur</strong> veuillez renseigner un identifiant
            </div>
            <?php
            break;
        case 'password':
            ?>
            <div class="alert alert-danger">
                <strong>Erreur</strong> la confirmation du mot de pass n'est pas correct
            </div>
            <?php
            break;
        case 'no_password_or_confirmation':
            ?>
            <div class="alert alert-danger">
                <strong>Erreur</strong> veuillez saisir le mot de pass ou la confirmation du mot de pass
            </div>
            <?php
            break;
        case 'champs_no_remplis':
            ?>
            <div class="alert alert-danger">
                <strong>Erreur</strong> veuillez remplir tous les champs
            </div>
            <?php
            break;
    }
}
?>
</body>