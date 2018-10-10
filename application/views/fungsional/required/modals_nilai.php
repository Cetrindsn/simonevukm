<!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <!-- konten modal-->
     <div class="modal-content">
       <!-- heading modal -->
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Nilai Keaktifan</h4>
       </div>
       <!-- body modal -->
       <div class="modal-body">
                      <center><h4>Nilai :</h4></center>
                      <center><h1><?php echo $key->nilai; ?></h1></center>
                      <center><h5><i>Komposisi :</i></h5></center>
                      <center>
                        <b><div><?php echo "Nilai Anggota : ".$key->nilaianggota; ?></div></b>
                        <b><div><?php echo "Nilai Keaktifan : ".$key->nilaiaktif; ?></div></b>
                      
</center>

       </div>
       <!-- footer modal -->
       <div class="modal-footer">
       </div>
     </div>
   </div>
 </div>
<!-- End Modals-->
