<div class="col-sm-5">
     <div class="panel panel-primary">
        <div class="panel-heading">
           Ubah Data
        </div>
    <div class="panel-body">
       <?php 
       
       //validasi data tidak boleh kosong
       echo validation_errors('<div class="alert alert-danger alert-dismissable">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
      
      //notofikasi bahwa data tersimpan

      if ($this->session->flashdata('pesan')); {

         echo '<div class="alert alert-success alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';

         echo $this->session->flashdata('pesan');
         echo '</div>';
      }


      echo form_open('user/edit/'.$user->id_user); 
       
      ?>

     <div class="form-group">
        <label>Nama User</label>
        <input name="nama_user" placeholder="Nama User" value="<?= $user->nama_user ?>" class="form-control" />
        
     </div>

     <div class="form-group">
        <label>username</label>
        <input name="username" placeholder="username" value="<?= $user->username ?>" class="form-control" />
        
     </div>

     <div class="form-group">
        <label>password</label>
        <input name="password" placeholder="password" value="<?= $user->password ?>" class="form-control" />
        
     </div>

     <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        <button type="reset" class="btn btn-sm btn-success">Reset</button>
        
        
     </div>

      <?php echo form_close(); ?>

   </div>
                      
    </div>