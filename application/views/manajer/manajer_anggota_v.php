<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('required/head.php');
require_once('required/header.php');
require_once('required/nav.php');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Daftar Anggota</h4>
    </div>
<div class="panel-body">
<div class="table-responsive">

<!--KONTEN TARO DISINI-->
    <!--  Modals-->
    <?php
    require_once('required/modals_anggota.php');
     ?>

<div class="form-row">
<form role="form" action="<?php echo site_url('manajer/anggota'); ?>" method="post">
  <div class="form-group">
        <label class="col-xs-1 control-label">Divisi</label>
         <div class="col-xs-5 selectContainer">
             <select class="form-control" name="divisi">
                <option value="" disabled selected>Pilih Divisi..</option>
                 <option value="1">BPH</option>
                 <option value="2">Badan Internal</option>
                 <option value="3">Ekonomi Bisnis</option>
                 <option value="4">PSDM</option>
             </select>
         </div>
     </div>
     <button type="submit" name="button" class="btn btn-primary"><div class="glyphicon glyphicon-search"></div></button>
     </form>
  </div>
<br>
<?php foreach ($nilai->result() as $value) {
  if ($value->id_divisi == 1) {
    echo "<center><h3>Divisi BPH</h3></center>";
    break;
  }elseif ($value->id_divisi == 2) {
    echo "<center><h3>Divisi Badan Internal</h3></center>";
    break;
  }elseif ($value->id_divisi == 3) {
    echo "<center><h3>Divisi Ekonomi Bisnis</h3></center>";
    break;
  }elseif ($value->id_divisi == 4) {
    echo "<center><h3>Divisi PSDM</h3></center>";
    break;
  }

} ?>
<br>
<table class="table table-striped table-bordered table-hover table-responsive">
  <thead class="thead-dark">
    <tr class="table-primary">
      <th>Nama</th>
      <th>No. Telepon</th>
      <th>Jabatan</th>
    </tr>
  </thead>
  <?php
  $total = array();
  if ($nilai->result() == null) {
    echo "<tr><td colspan='4'><center>Belum ada Anggota</center></td></tr>";
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
                <td>".$pernilai->notelp."</td>
                <td>".$levelnav."</td>";?>
                    <?php echo "
                  </tr>";
    }
  }
  ?>

</table>

<?php
require_once('required/footer.php');
?>
