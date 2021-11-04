<div class="col-sm-5">
     <div class="panel panel-primary">
        <div class="panel-heading">
           Login
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


       echo form_open('login/index'); 
       
       ?>

      <div class="form-group">
         <label>username</label>
         <input name="username" placeholder="username" value="<?= set_value('username') ?>" class="form-control" />
         
      </div>

      <div class="form-group">
         <label>password</label>
         <input type="password" name="password" placeholder="password" value="<?= set_value('password') ?>" class="form-control" />
         
      </div>

      <div class="form-group">
         <button type="submit" class="btn btn-sm btn-primary">Login</button>
              
         
      </div>

       <?php echo form_close(); ?>

    </div>
                       
     </div>
</div>