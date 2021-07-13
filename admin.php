<?php
    require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kelola Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Stock <sup>Lab</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Stock Alat Lab</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="masuk.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Alat Masuk</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="keluar.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Alat Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <span>Admin</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>Hikmatuz Zahra</strong><br>2000018180</p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 align-right"><br>Kelola Admin</h1>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myMod">
                                    Tambah Admin
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Email Admin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambiladmin = mysqli_query($conn, "select * from llogin");
                                        $i = 1;
                                        while($data = mysqli_fetch_array($ambiladmin)){
                                            $em = $data['email'];
                                            $pw = $data['password'];
                                            $iduser = $data['iduser'];
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$em;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$iduser;?>">
                                                    Edit
                                                </button>
                                                <input type="hidden" name="id" value="<?=$iduser;?>">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iduser;?>">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$iduser;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Admin</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        <input type="email" name="emailbaru" value="<?=$em;?>" placeholder="Email" class="form-control" required><br>
                                                        <input type="password" name="passwordbaru" value="<?=$pw;?>" placeholder="Password Baru" class="form-control"><br>
                                                        <input type="hidden" name="id" value="<?=$iduser;?>">
                                                        <button type="submit" class="btn btn-primary" name="updateadmin">Submit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete<?=$iduser;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Admin</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        Apakah Anda yakin ingin Menghapus <?=$em;?>?
                                                        <br><br>
                                                        <input type="hidden" name="em" value="<?=$em;?>">
                                                        <input type="hidden" name="id" value="<?=$iduser;?>">
                                                        <button type="submit" class="btn btn-danger" name="hapusadmin">Hapus</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>

                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Hikmatuz Zahra.2000018180.Teknik Informatika.UAD2021 </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

  <!-- The Modal -->
  <div class="modal fade" id="myMod">
        <div class="modal-dialog">
        <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Admin</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
              <input type="email" name="email" placeholder="Email" class="form-control" required><br>
              <input type="password" name="password" placeholder="Password" class="form-control" required><br>
              <button type="submit" class="btn btn-primary" name="addnewadmin">Submit</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</html>