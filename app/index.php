<?php
session_start();
$pdo = new PDO("mysql:host=database;dbname=data","root","password",
[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = htmlspecialchars(filter_input(INPUT_POST,"username"));
    $password = htmlspecialchars(filter_input(INPUT_POST,"password"));
    $password = sha1($password);
    $statement1 = $pdo->prepare("SELECT * FROM utilisateur WHERE username = ? AND password = ?");
    $statement1->execute(array($username,$password));
    $row = $statement1->rowCount();
    if ($row > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location:page_utilisateur.php");
    }else{
        echo "votre mot de passe ou votre identifiant n'est pas correct";
    }
}else{
    echo "veuillez compléter tous les champs";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <div>
            <h1>Connexion</h1>
            <form action="" method="post">
                <input type="text" name="username" placeholder="username" autocomplete="off">
                <input type="password" name="password" placeholder="password" autocomplete="off">
                <input type="submit" value="connexion">
            </form>
            <a href="page_inscription.php">creation de compte</a>
        </div>
    </body>
</html>