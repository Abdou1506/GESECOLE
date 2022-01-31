<?php
define('BASE',$_SERVER['DOCUMENT_ROOT']);



session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;
if(isset($_POST['id_matiere']) && isset($_POST['id_etudiant'])){
    try{

        // recuperer les donnees du formulaires (par leurs name )
        $id_etudiant=$_POST['id_etudiant'];
        $id_matiere=$_POST['id_matiere'];
        $note=$_POST['note'];
        
       
         //connexion bd
         $cnx = new PDO('mysql:host=localhost;dbname=gesecole', "root", "");
         $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         // preparation de la requete sql
         $r=$cnx->prepare("insert into control (id_etudiant,id_matiere,note) values(?,?,?)");
         //execution de la requete 
         $r->execute([$id_etudiant,$id_matiere,$note]);
         //header("location:create.php?m=ok");
     }catch (PDOException $e) {
         echo "Erreur : d'ajout de la metiere  dans cour".$e->getmessage() ;
     }
  
}
 //liste des etudiants
 try
 {
    
     
     $cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
     $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //preparation de la requette sql
     if(isset($_GET['id_classe']) ){
       $r=$cnx->prepare("SELECT * from etudiant where id_classe=? ");
       $r->execute([$_GET['id_classe']]);
       
      }else {
      $r=$cnx->prepare("SELECT * from etudiant");
     //ouverture de la connexion
     $r->execute();

    }

     $etudiants=$r->fetchAll();
     // header("location:index.php?m=ok");
 } catch (PDOException $e)
   {
         echo 'erreur de selection des etudiant dans cour : ' . $e->getMessage();
   }
 
//liste des matiere 
try
{
   
    
    $cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparation de la requette sql
     $r=$cnx->prepare("SELECT *from matiere");
    //ouverture de la connexion
    $r->execute();
    $matieres=$r->fetchAll();
    // header("location:index.php?m=ok");
} catch (PDOException $e)
  {
        echo 'erreur de selection des matiere dans cour : ' . $e->getMessage();
  }
  try
{
   
    
    $cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparation de la requette sql
     $r=$cnx->prepare("SELECT *from classe");
    //ouverture de la connexion
    $r->execute();
    $classes=$r->fetchAll();
    // header("location:index.php?m=ok");
} catch (PDOException $e)
  {
        echo 'erreur de selection de la classe dans cour : ' . $e->getMessage();
  }
 
 

//connexion bd
try{
    $cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparation de la requette sql

     $r=$cnx->prepare("select e.prenom, e.nom, m.nommatiere, e.nom, c.note from etudiant e join control c on e.id_etudiant=c.id_etudiant join matiere m on c.id_matiere=m.id_matiere");
    //ouverture de la connexion
    $r->execute();



    
    $resultat=$r->fetchall();
    //header("location:create.php.php?m=ok");
       } catch (PDOException $e) {
        echo 'erreur d\'ajout : ' . $e->getMessage();
       }

?>
<!DOCTYPE html>
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
        <?php include_once '../../prof/header.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row">
                  
              
                </div>
              </div>
                
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="etudiant.php">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
                <!-- /.col -->
                <!-- /.row -->
                
                <!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main content -->
            
                <!--lien vers la page d'ajoute d'utilisateur-->
                <!-- <a href="#" class="btn btn-large btn-info" id="bouton_ajouter">
                    <i class="fas fa-plus"></i> &nbsp; Ajouter un client
                </a> -->
                
        <div class="row  mt-3">
           <div class="col-md-6 mx-auto">
                <form action="create.php" id="fclasse">

                  CLASSE : <select class="form-select form-control" type="number" name="id_classe" onchange="document.getElementById('fclasse').submit()" >
                    <option value="" selected>....</option>
                    <?php foreach($classes as $p){?>
                      <option value="<?=$p['id_classe']?>"   <?php if( isset($_GET['id_classe']) && $p['id_classe']==$_GET['id_classe']) echo "selected" ?>> <?=$p['nomclasse']?>
                    </option>
                    <?php } ?>
                  </select>
                </form>
                </div>
             
        </div>
    <div class="container ">
        <div class="row  mt-3">
            <div class="col-md-6 border mx-auto">
                <form action="create.php" method="post">
                etudiant : <select class="form-select form-control" type="number" name="id_etudiant" id="">
                 <option value="" selected>....</option>
                 <?php foreach($etudiants as $p){?>
                    <option value="<?=$p['id_etudiant']?>"> <?=$p['prenom']?> <?=$p['nom']?>
                 </option>
                  <?php } ?>
                  </select>

                 matiere : <select class="form-select form-control" type="number" name="id_matiere" id="">
                  <option value="" selected>....</option>
                  <?php foreach($matieres as $c){?>
                    <option value="<?=$c['id_matiere']?>"> <?=$c['nommatiere']?> 
                   </option>
                 <?php } ?> 
                 </select>
                 <label for="exampleInputEmail1" class="form-label">note</label>
                 <input type="number" name="note" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
                  <button class="btn btn-danger my-3">ajouter</button>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-dark table-hover" border="1">
  <thead>
    <tr>

    
      <th scope="col">etudiant</th>
      <th scope="col">nommatiere</th>
      <th scope="col">note</th>
      
       
      
    </tr>
  </thead>
  <tbody>
      <?php
     foreach($resultat as $ligne) { ?> 
     <tr>
       <td scope="col"><?=$ligne['prenom']?>  <?=$ligne['nom']?></td>
      <td scope="col"><?=$ligne['nommatiere']?> </td>
      <td scope="col"><?=$ligne['note']?> </td>
      </tr>
     <?php }?>
   </tbody>
  </table>
  </div>
            
        
    
            <!-- /.content -->
                

    
             
            
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
            </div>
            </div>
            </div>
            <!-- Main Footer -->
            <?php include_once '../include/footer.php'; ?>
            
            <!-- ./wrapper -->
                <!-- REQUIRED SCRIPTS -->
                <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
                     
                  
                
            </body>
            </html>