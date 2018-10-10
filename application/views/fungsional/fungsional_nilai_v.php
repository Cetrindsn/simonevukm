<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Daftar Nilai</h4>
    </div>
<div class="panel-body">
<div class="table-responsive">

  <!--KONTEN TARO DISINI-->
      <!--  Modals-->



<center><h3>Divisi <?php echo $this->session->userdata("divisi"); ?></h3></center>
<center><i><h5>Anda dapat <b>memberi/mengubah</b> Nilai Anggota teman divisi anda.</h5></i></center>
<center><h6>Persentase Nilai Total : <b>70% Nilai Keaktifan</b> & <b>30% Nilai Anggota Lain</b>.</h6></center>
<br>
<table class="table table-striped table-bordered table-hover table-responsive">
  <thead class="thead-dark">
    <tr class="table-primary">
      <th>Nama</th>
      <th>Nilai Anggota Lain</th>
      <th>Nilai Keaktifan</th>
      <th>Nilai Total</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <?php
  $total = array();
  if ($nilai->result() == null) {
    echo "<tr><td colspan='4'><center>Belum ada Anggota</center></td></tr>";
  }else{
    foreach ($nilai->result() as $pernilai) {

      echo "<tr><td>".$pernilai->nama."</td>
                <td>".$pernilai->nilaianggota."</td>
                <td>".$pernilai->nilaiaktif."</td>
                <td>".$pernilai->nilai."</td>
                <td>";?> <!--$pernilai->id-->
                  <a href="<?php echo site_url('Fungsional/aksiUpdateNilaiFungsional/'.$pernilai->id) ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Penilaian</a>
                  <?php echo "</td>
                  </tr>";
    }
  }
  ?>

</table>

<?php
require_once('required/footer.php');
?>
