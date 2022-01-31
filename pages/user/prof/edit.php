<?php


define('BASE',$_SERVER['DOCUMENT_ROOT']);



session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;

try{

    // recuperer les donnees depuis le lien 
  $id_prof=$_GET['id_prof'];
//    echo "id_prof est $id_prof";

//    exit();
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
 $r=$cnx->prepare("select *  from prof where id_prof=?");
    //execution de la requete 
    $r->execute([$id_prof]);
   $prof= $r->fetch();
//    var_dump($prof);
    // header("location:index.php");
}catch (PDOException $e) {
    echo "  erreur de modification   ".$e->getMessage() ;
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
        <?php include('../include/header.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row">
                  
                </div>
              </div>
              
                <h1 class="m-0 text-dark">Ajouter un prof </h1>
                <!-- /.col -->
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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

        <div class="col-md-12 col-xs-12">
<form  action="update.php" method="POST">
  <div class="row">
      <div class="col-md-6 mx-auto mt-4">
    
    <input type="hidden" name="id" value="<?=$prof['id_prof']?>" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" name="prenom" value="<?=$prof['prenom']?>" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" name="nom" value="<?=$prof['nom']?>"  class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" value="<?=$prof['email']?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   <label for="exampleInputEmail1" class="form-label">mot de passe</label>
    <input type="password" name="pass" value="<?=$prof['pass']?>"  class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    
  <button type="submit" class="btn btn-primary">valider</button>
  </div>
  </div>
</form>  
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
<?php include_once '../include/footer.php'; ?>
</div>
</div>
<!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
          <script src="http://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
         
   
    
</body>
</html>