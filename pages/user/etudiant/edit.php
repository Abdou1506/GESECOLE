<?php 
try{

    // recuperer les donnees depuis le lien 
  $id_etudiant=$_GET['id_etudiant'];
//    echo "id_etudiant est $id_etudiant";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
 $r=$cnx->prepare("select *  from etudiant where id_etudiant=?");
    //execution de la requete 
    $r->execute([$id_etudiant]);
   $etudiant= $r->fetch();
//    var_dump($client);
    // header("location:index.php");
}catch (PDOException $e) {
    echo "  erreur de modification   ".$e->getMessage() ;
}
try{
    $cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparation de la requette sql
     $r=$cnx->prepare("select * from classe ");
    //ouverture de la connexion
    $r->execute();
    $classes=$r->fetchall();
    //header("location:create.php.php?m=ok");
    } catch (PDOException $e) {
        echo 'erreur d\'ajout : ' . $e->getMessage();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification de l'etudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form  action="update.php" method="POST">
  <div class="row">
      <div class="col-md-6 mx-auto mt-4">
    
    <input type="hidden" name="id_etudiant" value="<?=$etudiant['id_etudiant']?>" class="form-control"  aria-describedby="textHelp">
    <label  class="form-label">Prenom</label>
    <input type="text" name="prenom" value="<?=$etudiant['prenom']?>" class="form-control"  aria-describedby="textHelp">
    <label  class="form-label">Nom</label>
    <input type="text" name="nom" value="<?=$etudiant['nom']?>"  class="form-control"  aria-describedby="textHelp">
    <label  class="form-label">Email</label>
    <input type="email" name="email" value="<?=$etudiant['email']?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   <label  class="form-label">mot de passe</label>
    <input type="password" name="pass" value="<?=$etudiant['pass']?>"  class="form-control"  aria-describedby="textHelp">
    classe : <select class="form-select"  type="number"  name="id_classe" id="">
        <option value="" selected>....</option>
        <?php foreach($classes as $c){?><option value="<?=$c['id_classe']?>"><?=$c['nomclasse']?> 
        </option>
        <?php } ?>
</select>
  <button type="submit" class="btn btn-primary">valider</button>
  </div>
  </div>
</form>  
</body>
</html>