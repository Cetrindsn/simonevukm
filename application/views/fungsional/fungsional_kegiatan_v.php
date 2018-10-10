<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Daftar Kegiatan Umum UKM</h4>
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
                  <?php echo "</td>
                </tr>";
    }
  }
  ?>

</table>

<?php
require_once('required/footer.php');
?>
