<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMONEV UKM</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <!-- TABLE STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  </head>

  <body>
    <div class="container" style="margin-top:20px;">

      <div class="jumbotron">
        <h1 class="text-center"><div class="fa fa-bar-chart"></div><b>  SIMONEV UKM</b></h1>
        <p class="text-center">Sistem Informasi Monitoring dan Evaluasi Unit Kegiatan Mahasiswa</p>
      </div>

    <div class="row text-center ">
    </div>
    <div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
    <div class="panel panel-default">
    <div class="panel-heading" align="center">
    <strong>LOGIN SIMONEV UKM</strong>
    </div>
    <div class="panel-body">

    <form role="form" action="<?php echo site_url('Welcome/login'); ?>" method="post">
       <br />
     <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username" required/>
        </div>
         <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
            <input type="password" name="password" class="form-control"  placeholder="Password" required/>
        	</div>
    <div class="form-group">


        </div>

     	<input type="submit" name="submit" value="Log In" class="btn btn-primary col-md-12">
    </form>
    </div>
    </div>
    </div>
    </div>
    <div class="text-center"><b>Dicky Eka Ramadhan & Yosua Raka Justiko</b></div>
    <div class="text-center">Manajemen Informatika '52'</div>
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/custom.js"></script>

  </body>
</html>
