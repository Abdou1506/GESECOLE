<?php
try {
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', 'root', '');
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
} catch (PDOException $e) {
    echo 'erreur de connexion : ' . $e->getMessage();
} ?>

