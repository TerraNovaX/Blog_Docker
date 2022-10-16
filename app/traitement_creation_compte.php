<?php
session_start();
$pdo = new PDO("mysql:host=database;dbname=data", "root", "password",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
if(isset($_POST['username']) || isset($_POST['lastname']) || isset($_POST['firstname']) || isset($_POST['password']) || isset($_POST['confirm-pass'])) {
    $username = htmlspecialchars(filter_input(INPUT_POST, "username"));
    $lastname = htmlspecialchars(filter_input(INPUT_POST, "lastname"));
    $firstname = htmlspecialchars(filter_input(INPUT_POST, "firstname"));
    $password = htmlspecialchars(filter_input(INPUT_POST, "password"));
    $confirmpass = htmlspecialchars(filter_input(INPUT_POST, "confirmpass"));
    $check = $pdo->prepare('SELECT username, password FROM utilisateur WHERE username = ? ');
    $check->execute(array($username));
    $data = $check->fetch();
    $row = $check->rowCount();
    if ($row == 0) {
        if (strlen($username)) {
            if (isset($password) && isset($confirmpass)) {
                if ($password == $confirmpass) {
                    $password = sha1($password);
                    $insert = $pdo->prepare('INSERT INTO utilisateur(username,lastname,firstname,password) VALUES(:username, :lastname, :firstname, :password)');
                    $insert->execute(array(
                        'username' => $username,
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'password' => $password,
                    ));
                    header('Location: index.php?reg_err=success');
                } else header('Location: page_inscription.php?reg_err=password');
            } else header('Location: page_inscription.php?reg_err=no_password_or_confirmation');
        } else header('Location: page_inscription.php?reg_err=identifiant_length');
    } else header('Location: page_inscription.php?reg_err=already');
} else header('Location: page_inscription.php?reg_err=champs_no_remplis');