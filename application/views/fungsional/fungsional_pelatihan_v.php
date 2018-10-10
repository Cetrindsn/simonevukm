<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Daftar Pelatihan Divisi <?php echo $this->session->userdata("divisi"); ?></h4>
        </div>
    <div class="panel-body">
    <div class="table-responsive">

<!--KONTEN TARO DISINI-->
    <!--  Modals-->
  

<table class="table table-striped table-bordered table-hover table-responsive">
  <thead class="thead-dark">
    <tr class="table-primary">
      <th>Nama Kegiatan</th>
      <th>Tanggal Kegiatan</th>
    </tr>
  </thead>
  <?php
  $total = array();
  if ($pelatihan->result() == null) {
    echo "<tr><td colspan='2'><center>Belum ada Kegiatan</center></td></tr>";
  }else{
    foreach ($pelatihan->result() as $pernilai) {
      echo "<tr><td>".$pernilai->namapelatihan."</td>
                <td>".$pernilai->tanggalpelatihan."</td>

                </tr>";
    }
  }
  ?>

</table>

<?php
require_once('required/footer.php');
?>
