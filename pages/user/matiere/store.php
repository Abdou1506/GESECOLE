<?php
//connexion bd
try{

$nommatiere=$_POST['nommatiere'];



$cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//preparation de la requette sql
$r=$cnx->prepare("insert into matiere (nommatiere) values(?)");
//ouverture de la connexion
$r->execute([$nommatiere]);
} catch (PDOException $e) {
    echo 'erreur d\'ajout : ' . $e->getMessage();
}
header("location:../../index.php?m=ok");

?>