<!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <!-- konten modal-->
     <div class="modal-content">
       <!-- heading modal -->
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Kegiatan UKM</h4>
       </div>
       <!-- body modal -->
       <div class="modal-body">

           <form action="<?php echo site_url('fungsional/aksiAddKegiatanfungsional') ?>" method="post">
               <div class="form-row">
               <div class="form-group col-md-12">
                   <label for="exampleInputEmail1">Nama Kegiatan</label>
                      <input type="text" name="namakegiatan" class="form-control" placeholder="Nama Kegiatan.." required/>
               </div>
             </div>
             <div class="form-row">
               <div class="form-group col-md-12">
                 <label for="exampleInputEmail1">Jadwal Kegiatan</label>
                 <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                   <input class="form-control" type="text" name="tanggalkegiatan" required>

                 </div>
               </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-12">
                 <button type="submit" class="btn btn-primary col-md-12">Tambah</button></div>
             </div>
         </form>
       </div>
       <!-- footer modal -->
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
       </div>
     </div>
   </div>
 </div>
<!-- End Modals-->
