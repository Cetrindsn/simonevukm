<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Penilaian</h4>
    </div>
<div class="panel-body">
<div class="table-responsive">

  <form action="<?php echo site_url('Fungsional/aksiAfterEditNilaiFungsional') ?>" method="post">
    <input type="hidden" name="id" value="<?php echo($id) ?>">
<input type="hidden" name="nilaiaktif" value="<?php echo($nilaiaktif) ?>">

  <center><h5>Beri <b>Nilai Anggota</b> untuk <b><?php echo($nama) ?></b></h5></center>
      <div class="form-row">
      <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Nilai Anggota Lain</label>
             <input type="text" name="nilaianggota" class="form-control" placeholder="Nilai Anggota.." value="<?php echo ($nilaianggota) ?>" required/>
      </div>
    </div>



    <div class="form-row">
      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary col-md-12">Nilai</button></div>
    </div>
  </form>

<?php
require_once('required/footer.php');
?>
