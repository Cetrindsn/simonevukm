<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Grafik Nilai Keaktifan Divisi <?php echo $this->session->userdata("divisi");?></h4>
    </div>
<div class="panel-body">
<div class="table-responsive">
<center>
  <div id="chartContainer"></div>
  <select id="type">
			<option value="column2d"> Column 2D </option>
			<option value="column3d"> Column 3D </option>
			<option value="bar2d"> Bar 2D </option>
			<option value="bar3d"> Bar 3D </option>
			<option value="line"> Line </option>
			<option value="area2d"> Area 2D </option>
			<option value="doughnut2d"> Doughnut 2D </option>
			<option value="doughnut3d"> Doughnut 3D </option>
			<option value="pie2d"> Pie 2D </option>
			<option value="pie3d"> Pie 3D </option>
			<option value="pareto2d"> Pareto 2D </option>
			<option value="pareto3d"> Pareto 3D </option>
		</select>
</center>

<div class="form-row">
  <div class="form-group col-md-6">
    <center><a href="<?php echo site_url('Manajer/pdf') ?>" type="button" class="btn btn-default"><i class="fa fa-print"></i> Laporan Keaktifan Divisi (PDF)</a>

  </div>
  <div class="form-group col-md-6 ">
    <center><a href="<?php echo site_url('Manajer/export') ?>" type="button" class="btn btn-default"><i class="fa fa-download"></i> Laporan Keaktifan Divisi (Excel)</a>

  </div>
</div>
<?php
require_once('required/footer.php');
?>
