<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
  <h4 class="col-md-9">Daftar Kegiatan Umum</h4>
    <div class="panel-heading">
      <div class="form form-inline ">
        <button type="button" name="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><div class="glyphicon glyphicon-plus"></div> Tambah Kegiatan</button>
      </div>
    </div>
<div class="panel-body">
<div class="table-responsive">

<!--KONTEN TARO DISINI-->
    <!--  Modals-->
    <?php
    require_once('required/modals_kegiatan.php');
     ?>
<table class="table table-striped table-bordered table-hover table-responsive">
  <thead class="thead-dark">
    <tr class="table-primary">
      <th>Nama Kegiatan</th>
      <th>Tanggal Kegiatan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <?php
  $total = array();
  if ($kegiatan->result() == null) {
    echo "<tr><td colspan='2'><center>Belum ada Kegiatan</center></td></tr>";
  }else{
    foreach ($kegiatan->result() as $pernilai) {
      echo "<tr><td>".$pernilai->namakegiatan."</td>
                <td>".$pernilai->tanggalkegiatan."</td>
                <td>";?>
                  <a href="<?php echo site_url('Eksekutif/aksiUpdateKegiatanEksekutif/'.$pernilai->id) ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo site_url('Eksekutif/aksiDeleteKegiatanEksekutif/'.$pernilai->id) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus kegiatan ini?')"><i class="fa fa-trash"></i></a>
                  <?php echo "</td>
                </tr>";
    }
  }
  ?>

</table>

<?php
require_once('required/footer.php');
?>
