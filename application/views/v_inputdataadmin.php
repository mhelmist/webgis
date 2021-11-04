<div class="col-sm-5">
     <div class="panel panel-primary">
        <div class="panel-heading">
           Input Data
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


       echo form_open('admin/input'); 
       
       ?>

      <div class="form-group">
         <label>Nama Admin</label>
         <input name="nama" placeholder="Nama Admin" value="<?= set_value('nama_user') ?>" class="form-control" />
         
      </div>

      <div class="form-group">
         <label>username</label>
         <input name="username" placeholder="username" value="<?= set_value('username') ?>" class="form-control" />
         
      </div>

      <div class="form-group">
         <label>password</label>
         <input name="password" placeholder="password" value="<?= set_value('password') ?>" class="form-control" />
         
      </div>

      <div class="form-group">
         <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
         <button type="reset" class="btn btn-sm btn-success">Reset</button>
         
         
      </div>

       <?php echo form_close(); ?>

    </div>
                       
     </div>
</div>






<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[-6.598599, 106.805622];	
}

var mymap = L.map('mapid').setView([-6.598599, 106.805622], 14);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
}).addTo(mymap);

mymap.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	mymap.panTo(position);
});
mymap.addLayer(marker);

</script>