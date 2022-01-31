<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>LTG</title>

    <!-- Font Awesome Icons -->
<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
</head>

<body>
   
       
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="ltg.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
        <?php if(isset($_GET['cn']) && $_GET['cn']=='no') { ?>
<h4>login/mot de passe non valide</h4>
       <?php } ?>
					<form action="check.php" method="POST">
            <h2>level tech group</h2>
						<div class="input-group mb-3 my-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="login" class="form-control input_user" value="" placeholder="login">
						</div>
						<div class="input-group mb-2 my-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pwd" class="form-control input_pass" value="" placeholder="mot de passe">
						</div>
            <div class="input-group mb-3 my-3" >
							<div class="input-group-append">
								<span class="input-group-text"><i class="far fa-check-square"></i></span>
							</div>
							 <select class="form-select form-control" name="type_connection">
              <option value="" selected>------</option>
                <option value="etudiant">Etudiant</option>
                <option value="user">User</option>
                <option value="prof">Prof</option>
              </select>
						</div>

						
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">connecter</button>
				   </div>
					</form>
				</div>
		
				
			</div>
		</div>
	</div>

</body>
