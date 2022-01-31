<?php
//connexion bd
try{

$nomclasse=$_POST['nomclasse'];



$cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//preparation de la requette sql
$r=$cnx->prepare("insert into classe (nomclasse) values(?)");
//ouverture de la connexion
$r->execute([$nomclasse]);
header("location:create.php?m=ok");
} catch (PDOException $e) {
    echo 'erreur d\'ajout : ' . $e->getMessage();
} 

?>