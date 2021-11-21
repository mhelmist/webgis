<div class="col-sm-12">
    <?php 
        //notofikasi bahwa data tersimpan

      if ($this->session->flashdata('pesan')); {

        echo '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';

        echo $this->session->flashdata('pesan');
        echo '</div>';
     }
    ?>
<table class="table table-responsive table-bordered">
        <thead>
                            
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>username</th>
                <th>password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($user as $key => $value) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $value->nama_user; ?></td>
                <td><?php echo $value->username; ?></td>
                <td><?php echo $value->password; ?></td>
                <td>
                    <a href="<?= base_url('user/edit/'.$value->id_user) ?>" class="btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('user/hapus/'.$value->id_user) ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
                
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>