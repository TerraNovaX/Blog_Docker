<?php
session_start();
if(!$_SESSION['password']){
    header('location: index.php');
}
//echo $_SESSION['username'];
$pdo = new PDO("mysql:host=database;dbname=data", "root", "password",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
if(isset($_POST['envoyer'])){
    if(!empty($_POST['message'])){
        $message = nl2br(htmlspecialchars(filter_input(INPUT_POST, 'message')));
        $username = $_SESSION['username'];

        $insertmessage = $pdo->prepare('INSERT INTO messagerie(username, message) VALUES(?, ?)');
        $insertmessage->execute(array($username, $message));
    }else{
        echo "veuillez remplir le champs message";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<h1>BIENVENUE <?= $_SESSION['username']?></h1>
<div>
    <a href="deconnexion.php"><button id="deconnexion">Se déconnecter</button></a>
</div>
<form method="post" action="" id="formulaire">
    <div id="user">
        <?php echo $_SESSION['username'] ?>
    </div>
    <textarea name="message"></textarea>
    <input type="submit" name="envoyer">
</form>
<section id="messages"></section>
<script>
    setInterval('load_messages()', 500);
    function load_messages(){
        $('#messages').load('load_messages.php');
    }
</script>
</body>
</html>
