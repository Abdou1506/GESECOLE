
<?php


define('BASE',$_SERVER['DOCUMENT_ROOT']);



session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;

//connexion bd
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>LTG</title>

    <!-- Font Awesome Icons -->

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
        <?php include_once 'header.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row">
                  
                </div>
              </div>
              <h1 class="m-0 text-dark">Ajouter un etudiant </h1>
        <!-- /.col -->
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="user.php btn-success">Home</a></li>
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


<form  action="store.php" method="POST">
  <div class="row">
      <div class="col-md-6 mx-auto mt-4">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   <label for="exampleInputEmail1" class="form-label">mot de passe</label>
    <input type="password" name="pass" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    classe : <select class="form-select form-control" type="number" name="id_classe" id="">
        <option value="" selected>....</option>
        <?php foreach($classes as $c){?><option value="<?=$c['id_classe']?>"><?=$c['nomclasse']?> 
        </option>
        <?php } ?>
</select>
<label for="exampleInputEmail1" class="form-label">role</label>
<input type="text" name="role" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    
  <button type="submit" class="btn btn-primary my-3">envoyer</button>
  </div>
  </div>
</form> 
 

</div>
    </section>








    <!-- /.content -->
</div>
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
         
    

          <!-- <script>
function verifier(){
let email=document.getElementById('email');
let pass=document.getElementById('pass');
let confirmer=document.getElementById('confirmer');
if(email.value==""){
  alert("email Requis");
}
if(pass.value=="" || confirmer.value==""){
  pass.innerHTML+="pass n'est pas valide");
}
if(pass.value!=confirmer.value ){
  alert("erreur de confirmation ");
}

  } 
</script>  -->
    
</body>
</html>