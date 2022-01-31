<?phP


define('BASE',$_SERVER['DOCUMENT_ROOT']);



session_start();
if (!$_SESSION['login'] && !$_SESSION['pass'] ) 

header("Location:../../session/login.php") ;

//connexion bd
try{
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$id_classe=$_POST['id_classe'];
$role=$_POST['role'];


$cnx=new PDO("mysql:host=localhost;dbname=gesecole", "root","");
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//preparation de la requette sql
$r=$cnx->prepare("insert into etudiant (prenom,nom,email,pass,id_classe,role) values(?,?,?,?,?,?)");
//ouverture de la connexion
$r->execute([$prenom,$nom,$email,$pass,$id_classe,$role]);
header("location:index.php?m=ok");
} catch (PDOException $e) {
    echo 'erreur d\'ajout : ' . $e->getMessage();
}
 

?>