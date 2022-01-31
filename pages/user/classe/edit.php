<?php 


define('BASE',$_SERVER['DOCUMENT_ROOT']);



session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;

try{

    // recuperer les donnees depuis le lien 
  $id_classe=$_GET['id_classe'];
//    echo "id_classe est $id_classe";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
 $r=$cnx->prepare("select *  from classe where id_classe=?");
    //execution de la requete 
    $r->execute([$id_classe]);
   $classe= $r->fetch();
//    var_dump($client);
    // header("location:index.php");
}catch (PDOException $e) {
    echo "  erreur de modification   ".$e->getMessage() ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification de la claase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form  action="update.php" method="POST">
  <div class="row">
      <div class="col-md-6 mx-auto mt-4">
    
      <input type="hidden" name="id_classe" value="<?=$etudiant['id_etudiant']?>" class="form-control"  aria-describedby="textHelp">
    <input type="text" name="nomclasse" value="<?=$classe['nomclasse']?>" class="form-control"  aria-describedby="textHelp">
   
  <button type="submit" class="btn btn-primary">valider</button>
  </div>
  </div>
</form>  
</body>
</html>