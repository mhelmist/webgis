<div class="col-sm-5">
     <div class="panel panel-primary">
        <div class="panel-heading">
           Input File Peta
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

      
      echo form_open('upload/input'); 
      ?>
      
     <div class="form-group">
        <label>Nama Sekolah</label>
        <input name="nama_sekolah" placeholder="Nama Sekolah" value="<?= set_value('nama_sekolah') ?>" class="form-control" />
        
     </div>

     <div class="form-group">
        <label>File Peta</label>
        <input type="file" name="peta" placeholder="File Peta" value="<?= set_value('peta') ?>" class="form-control" />
        
     </div>
     <div class="form-group">
        <label>Warna</label>
        <input name="warna" placeholder="Warna Peta" value="<?= set_value('warna') ?>" class="form-control" />
        
     </div>

     <div class="form-group">
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        <button type="reset" class="btn btn-sm btn-success">Reset</button>
        
        
     </div>

      <?php echo form_close(); ?>

    </div>
                       
     </div>
</div>