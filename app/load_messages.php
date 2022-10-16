<?php
session_start();
$pdo = new PDO("mysql:host=database;dbname=data", "root", "password",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
$messages_reçu = $pdo->query('SELECT * FROM messagerie');
while($message = $messages_reçu->fetch()){
    ?>
    <div>
        <h4><?=$message['username']?></h4>
        <p><?=$message['message']?></p>
    </div>

<?php
}
