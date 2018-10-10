<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Edit Pelatihan Divisi</h4>
    </div>
<div class="panel-body">
<div class="table-responsive">

  <form action="<?php echo site_url('manajer/aksiAfterEditPelatihanManajer') ?>" method="post">
    <input type="hidden" name="id" value="<?php echo($id) ?>">

      <div class="form-row">
      <div class="form-group col-md-12">
          <label>Nama Pelatihan</label>
             <input type="text" name="namapelatihan" class="form-control" placeholder="Nama Pelatihan.." value="<?php echo ($namapelatihan) ?>" required/>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Jadwal Pelatihan</label>
        <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
          <input class="form-control" type="text" name="tanggalpelatihan" required value="<?php echo ($tanggalpelatihan) ?>">

        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary col-md-12">Perbaharui</button></div>
    </div>
  </form>

<?php
require_once('required/footer.php');
?>
