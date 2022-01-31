<?php 

define('BASE',$_SERVER['DOCUMENT_ROOT']);

include (BASE.'/pages/user/config.php');
// var_dump(BASE);
// exit;
try{

    // recuperer les donnees depuis formulaire 

        $login = $_POST['login']; 
        $pass = $_POST['pwd'];

        //$pass=md5($pass);
        $type_connection = $_POST['type_connection'];
    
        if ($type_connection=="user")
         $requete="select * from ".$type_connection." where login='$login' and mot_de_passe='$pass'";
    
     if ($type_connection=="prof")
    $requete="select * from ".$type_connection." where email='$login' and pass='$pass'"; 
    
    if ($type_connection=="etudiant")
    $requete="select * from ".$type_connection."  where email='$login' and pass='$pass'"; 
    
   
    
    $r = $cnx->prepare($requete);
    $r->execute();
    $resultat = $r->fetch();
    session_start ();
    		$_SESSION['login'] = $_POST['login'];
    		$_SESSION['pwd'] = $_POST['pwd'];
            $_SESSION['id_etudiant']=$resultat['id_etudiant'];
            $_SESSION['role']=$resultat['role'];
            $_SESSION['pseudo'] = $resultat['pseudo'];
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['nom'] = $resultat['nom'];
            $_SESSION['id_prof']=$resultat['id_prof'];
            
    if (!empty($resultat) &&  $type_connection==$resultat['role']) {
        header("Location:../pages/".$type_connection."/".$type_connection.".php");
        echo "vous n'etes pas autoriser à acceder a cette page";
        # code...
    }
   
                
            
           
         
        
    else {
            header("Location:login.php?req=e")   ; 
    
            
         }
        
}catch (PDOException $e) {
    echo "  erreur de login/mot de passe   ".$e->getMessage() ;
}

?>









