<?php
session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;
$etu=$_SESSION['id_etudiant'];
try{
    $cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$r=$cnx->prepare(" SELECT e.prenom,e.nom,m.nommatiere,c.note FROM etudiant e JOIN control c ON e.id_etudiant=c.id_etudiant JOIN matiere m ON m.id_matiere=c.id_matiere where e.id_etudiant=?"); 
$r->execute([$_SESSION['id_etudiant']]);
$etudiants= $r->fetchAll();
// print_r($etudiants);
// die();
} catch (PDOException $e) {
    echo 'erreur d\'ajout : ' . $e->getMessage();
}
?>
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
              <h1 class="m-0 text-dark">CONSULTATION DES NOTES </h1>
        <!-- /.col -->
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item btn-success"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
        </ol>
                <!-- /.col -->
                <!-- /.row -->
                <!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
        <!--lien vers la page d'ajoute d'utilisateur-->
        <!-- <a href="#" class="btn btn-large btn-info" id="bouton_ajouter">
            <i class="fas fa-plus"></i> &nbsp; Ajouter un client
        </a> -->
<div class="content">
      <div class="container">
        <div class="page-header">
          
        </div>
        <div class="row">
          <div class="span12">
            <div class="widget-body">
              <div class="rigth-align">
 



  <table class="table table-dark table-hover" id="etudiant">
  <thead>
    <tr>
     
      <th scope="col">PRENOM</th>
      <th scope="col">NOM</th>
      <th scope="col">NOMMATIERE</th>
      <th scope="col">NOTE</th>
     
     
    </tr>
    </thead>
  
     <?php foreach($etudiants as $c) {?>
 <tbody>
    <tr>
      
      <td><?=$c['prenom']?></td>
      <td><?=$c['nom']?></td>
      <td><?=$c['nommatiere']?></td>
      <td><?=$c['note']?></td>
    </tr>
    </tbody>
  
  <?php }?>
</table>
</div>
</div>
</div>          
</div>
</div>
</div> 
</section>








<!-- /.content -->
</div>

<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
<div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
</div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<?php include_once 'footer.php'; ?>
</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="http://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>



</body>

