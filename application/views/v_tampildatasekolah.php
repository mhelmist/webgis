<div class="col-sm-12">
    <?php 
        //notifikasi bahwa data tersimpan

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
                <th>Nomor</th>
                <th>Nomor ID</th>
                <th>Nama Sekolah</th>
                <th>Alamat Sekolah</th>
                <th>Jenis Sekolah</th>
                <th>Kepala Sekolah</th>
                <th>Keterangan</th>
                <?php if($this->session->userdata('username')<>''){?>
                <th>Aksi</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($sekolah as $key => $value) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->nama; ?></td>
                <td><?php echo $value->alamat; ?></td>
                <td><?php echo $value->jenis; ?></td>
                <td><?php echo $value->kepala_sekolah; ?></td>
                <td><?php echo $value->keterangan; ?></td>
                <?php if($this->session->userdata('username')<>''){?>
                <td>
                    <a href="<?= base_url('sekolah/edit/'.$value->id) ?>" class="btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('sekolah/hapus/'.$value->id) ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
                <?php } ?>
                
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>