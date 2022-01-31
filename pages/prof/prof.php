<?php
session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;
$prof=$_SESSION['id_prof'];
try{
    $cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$r=$cnx->prepare(" SELECT e.prenom,e.nom,c.nomclasse,m.nommatiere FROM etudiant e JOIN classe c on e.id_classe=c.id_classe LEFT JOIN enseigner n on c.id_classe=n.id_classe LEFT JOIN matiere m ON n.id_matiere=m.id_matiere WHERE id_prof=?;"); 
$r->execute([$_SESSION['id_prof']]);
$profs= $r->fetchAll();
// print_r($profs);
// die();
} catch (PDOException $e) {
    echo 'erreur d\'ajout : ' . $e->getMessage();
}
?>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>LTG</title>
 <!-- Font Awesome Icons -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
</head>
<body>
<div class="wrapper">

<!-- Navbar -->
<?php include  ('header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          
        </div>
      </div>
      
       
        <!-- /.col -->
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
    <table class="table table-dark table-hover" id="etudiant">
  <thead>
    <tr>
     
      <th scope="col">PRENOM</th>
      <th scope="col">NOM</th>
      <th scope="col">CLASSE</th>
      <th scope="col">MATIERE</th>
     
     
    </tr>
    </thead>
  
     <?php foreach($profs as $c) {?>
 <tbody>
    <tr>
      
      <td><?=$c['prenom']?></td>
      <td><?=$c['nom']?></td>
      <td><?=$c['nomclasse']?></td>
      <td><?=$c['nommatiere']?></td>
    </tr>
    </tbody>
  
  <?php }?>
</table>  


<!-- Main Footer -->
<?php include_once 'footer.php'; ?>

    
</body>
</html>