<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css';?>">
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">DASHBOARD KEDAI KOPI</h2>
                        <h3 class="text-center pt-4 pb-4">LOGIN</h3>
                        <?php 
                        if(isset($_GET['pesan'])) {
                            if($_GET['pesan'] == "gagal") {
                                echo "<div class='alert alert-danger text-center'>Login gagal! Username atau Password yang Anda masukkan salah</div>";
                            } else if($_GET['pesan'] == "logout") {
                                echo "<div class='alert alert-warning text-center'>Anda telah logout</div>";
                            } else if($_GET['pesan'] == "belum-login") {
                                echo "<div class='alert alert-warning text-center'>Silahkan login terlebih dahulu</div>";
                            } else if($_GET['pesan'] == "login") {
                                echo "<div class='alert alert-success text-center'>Anda telah berhasil login</div>";
                            }
                        }
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <br>
                                <form action="<?php echo base_url().'welcome/login'?>" method="post">
                                <div class="form-group mb-4 w-16">
                                    <input type="text" name="username"  class="form-control" placeholder="Username" >
                                    <?php echo form_error('username');?>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <?php echo form_error('password');?>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <input type="submit" value="Login" class="btn btn-primary w-50">
                                    </center>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
