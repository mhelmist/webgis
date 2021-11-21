<div id="mapid" style="height: 500px;"></div>
<script>
var mymap = L.map('mapid').setView([-6.598599, 106.805622], 14);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
       
}).addTo(mymap);

//menampilkan geojson dari database

<?php foreach ($peta as $key => $value){ ?>



$.getJSON("<?= base_url('geojson/'. $value->peta) ?>", function($data)
{
    geoLayer = L.geoJson($data,{
        style: function(feature){
        return{
            
            opacity: 1.0,
            color: 'black',
            fillOpacity: 1.0,
            fillColor: '<?= $value->warna ?>',
        }
        },
    }).addTo(mymap);

    geoLayer.eachLayer(function(layer){
        layer.bindPopup("Wilayah Zonasi : <?= $value->nama_sekolah ?>")
    });
});
<?php } ?>
</script>