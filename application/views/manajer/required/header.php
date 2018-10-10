<!--HEADER-->
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
              <div class="fa fa-bar-chart"></div>  <span class="h3"><b>SIMONEV UKM</b></span>
</a>
        </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
<?php echo $this->session->userdata("nama"); ?>
 |
<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date('F, d M Y');
echo $tgl_sekarang;
?>

&nbsp;
<a href="<?php echo site_url('Welcome/logout')?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
