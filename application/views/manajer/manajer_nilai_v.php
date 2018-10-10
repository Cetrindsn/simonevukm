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

<?php
$nilaidivisi=0;
foreach ($nilai->result() as $pernilai) {
  $nilaidivisi = $nilaidivisi+$pernilai->nilai;
}
if (sizeof($nilai->result()) == 0) {
  $nilaidivisi = 0;
}else{
  $nilaidivisi = $nilaidivisi/sizeof($nilai->result());
}

?>

<center><b><h3>Divisi <?php echo $this->session->userdata("divisi"); ?></h3></b></center>
<center><h5>Nilai Divisi : <?php echo $nilaidivisi ?></h5></center>
</center>
<center><a href="<?php echo site_url('Manajer/aksiUpdateNilaiDivisi/'.$this->session->userdata("id_divisi").'/'.$nilaidivisi) ?>" type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Perbarui Nilai Divisi</a>
</center>
<center><i><h5>Anda dapat <b>memberi/mengubah</b> Nilai Keaktifan anggota divisi anda.</h5></i></center>
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
    echo "<tr><td colspan='5'><center>Belum ada Data</center></td></tr>";
  }else{
    foreach ($nilai->result() as $pernilai) {

      $levelnav;
      if ($pernilai->level == 1) {
        $levelnav="Eksekutif";
      }else if ($pernilai->level == 2) {
        $levelnav="Manajer";
      }else{
        $levelnav="Anggota";
      }
      echo "<tr><td>".$pernilai->nama."</td>
                <td>".$pernilai->nilaianggota."</td>
                <td>".$pernilai->nilaiaktif."</td>
                <td>".$pernilai->nilai."</td>
                <td>";?> <!--$pernilai->id-->
                  <a href="<?php echo site_url('Manajer/aksiUpdateNilaiManajer/'.$pernilai->id.'/'.$this->session->userdata("id_divisi").'/'.$nilaidivisi) ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Penilaian</a>
                  <?php echo "</td>
                  </tr>";
    }
  }
  ?>

</table>

<?php
require_once('required/footer.php');
?>
