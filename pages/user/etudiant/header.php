<link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
<script src="Bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="Bootstrap/js/bootstrap.bundle.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="../user.php" class="nav-link">accueil</a>
        </li>
       
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="../../../session/deconnect.php"> <i class="fas fa-sign-out-alt"></i> &nbsp; Se deconnecter
            </a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
        <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-4" style="opacity: .7">
        <span class="brand-text font-weight-light">Level Tech</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="" class="d-block"><?=$_SESSION['pseudo'] ?>

</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBORD
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!--lien vers la page d'ajoute d'utilisateur-->
                            <a href="#" class="nav-link" id="bouton_ajouter">
                            <button class="btn btn-success">   <i class="fas fa-plus nav-icon"></i> &nbsp; 
                             Ajouter etudiant</button>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="../prof/create.php" class="nav-link">
                            <button class="btn btn-success"> <i class="fa fa-plus nav-icon"></i>
                             Ajouter prof</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../classe/create.php" class="nav-link">
                            <button class="btn btn-success"> <i class="fa fa-plus nav-icon"></i>
                             Ajouter classe</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../cour/create.php" class="nav-link">
                            <button class="btn btn-success"> <i class="fa fa-plus nav-icon"></i>
                             Ajouter cour</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../prof/index.php" class="nav-link">
                            <button class="btn btn-success"> <i class="fa fa-plus nav-icon"></i>
                             liste des prof</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../classe/index.php" class="nav-link">
                            <button class="btn btn-success"> <i class="fa fa-plus nav-icon"></i>
                             liste des classe</button>
                            </a>
                        </li>
                        
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>