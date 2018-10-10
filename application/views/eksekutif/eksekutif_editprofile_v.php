<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Edit Profile</h4>
    </div>
<div class="panel-body">
<div class="table-responsive">

  <form action="<?php echo site_url('Eksekutif/aksiAfterEditProfileEksekutif') ?>" method="post">
    <input type="hidden" name="id" value="<?php echo($id) ?>">

      <div class="form-row">
      <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Username</label>
             <input type="text" name="username" class="form-control" placeholder="Username.." value="<?php echo ($username) ?>" required/>
      </div>
    </div>
      <div class="form-row">
      <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Password</label>
             <input type="text" name="password" class="form-control" placeholder="Password.." value="<?php echo ($password) ?>" required/>
      </div>
    </div>

      <div class="form-row">
      <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Nama</label>
             <input type="text" name="nama" class="form-control" placeholder="Nama.." value="<?php echo ($nama) ?>" required/>
      </div>
      <div class="form-group col-md-6">
          <label for="exampleInputEmail1">No. Telp</label>
             <input type="text" name="notelp" class="form-control" placeholder="No. Telepon.." value="<?php echo ($notelp) ?>" required/>
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
