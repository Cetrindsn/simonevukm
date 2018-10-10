<!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <!-- konten modal-->
     <div class="modal-content">
       <!-- heading modal -->
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Anggota UKM</h4>
       </div>
       <!-- body modal -->
       <div class="modal-body">

           <form action="<?php echo site_url('Eksekutif/aksiAddAnggotaEksekutif') ?>" method="post">
               <div class="form-row">
               <div class="form-group col-md-12">
                   <label for="exampleInputEmail1">Username</label>
                      <input type="text" name="username" class="form-control" placeholder="Username.." required/>
               </div>
             </div>
               <div class="form-row">
               <div class="form-group col-md-12">
                   <label for="exampleInputEmail1">Password</label>
                      <input type="text" name="password" class="form-control" placeholder="Password.." required/>
               </div>
             </div>

               <div class="form-row">
               <div class="form-group col-md-6">
                   <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama.." required/>
               </div>
               <div class="form-group col-md-6">
                   <label for="exampleInputEmail1">No. Telp</label>
                      <input type="text" name="notelp" class="form-control" placeholder="No. Telepon.." required/>
               </div>
             </div>
             <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="inputPassword4">Divisi</label>
                        <div class="">
                            <select class="form-control" name="divisi" required>
                               <option value="" disabled selected>Pilih Divisi..</option>
                                <option value="1">BPH</option>
                                <option value="2">Badan Internal</option>
                                <option value="3">Ekonomi Bisnis</option>
                                <option value="4">PSDM</option>
                            </select>
                        </div>
               </div>
               <div class="form-group col-md-6 ">
                 <label for="inputPassword4">Jabatan</label>
                        <div class="">
                            <select class="form-control" name="jabatan" required>
                               <option value="" disabled selected>Pilih Jabatan..</option>
                                <option value="2">Manajer</option>
                                <option value="3">Anggota</option>
                            </select>
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
