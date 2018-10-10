<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
    <div class="panel-heading">
    </div>
<div class="panel-body">
<div class="table-responsive">
<!--KONTEN TARO DISINI-->

<div class="form-row">
  <div class="form-group col-md-5">
             <img src="<?php echo base_url()?>assets/welcome.jpg" alt="">
  </div>
  <div class="form-group col-md-6 ">
    <?php foreach ($user->result() as $key) {
      $divreal;
    if ($key->id_divisi == 1)
      $divreal = "BPH";
      elseif ($key->id_divisi == 2)
        $divreal = "Badan Internal";
        elseif ($key->id_divisi == 3)
          $divreal = "Ekonomi Bisnis";
          elseif ($key->id_divisi == 4)
            $divreal = "PSDM";
      ?>

    <div class="h2">Selamat Datang, <b><?php echo $key->nama ?>!</b></div>


    <div class="h5">
      <i>Anda adalah <b><?php echo $divreal; ?></b> <b>Eksekutif</b></i>
    </div>
    <div>
      <div class="input-group col-md-8">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
        <input class="form-control" type="text" name="tanggalkegiatan" value="<?php echo $key->notelp ?>" disabled>
    </div>
    <br>
    <div>
      <a href="<?php echo site_url('Eksekutif/aksiUpdateProfileEksekutif/'.$key->id) ?>" type="button" name="button" class="btn btn-primary"><div class="glyphicon glyphicon-pencil"></div> Edit Profile</a>
    </div>
  </div>
</div>










<?php } ?>



<?php
require_once('required/footer.php');
?>
