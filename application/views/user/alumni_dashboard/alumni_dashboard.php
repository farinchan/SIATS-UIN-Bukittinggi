<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('user/partisi/head.php') ?>

<body>

  <?php $this->load->view('user/partisi/navbar.php') ?>

  <main id="main">
    <?php echo $content; ?>
  </main>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form_update_foto" method="post">
            <div class="mb-3">
              <input class="form-control" type="file" id="formFile" name="myFile" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span> Edit
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view('user/partisi/footer.php') ?>
  <?php $this->load->view('user/partisi/js.php') ?>
  <script src="<?php echo base_url(); ?>assets/js/dropzone.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

 

  <script>
    if (document.getElementById('latitude') != 0) {
      var initialLocation = {
        lat: document.getElementById('latitude').value,
        lng: document.getElementById('longitude').value
      };
      var map = L.map('map').setView([initialLocation.lat, initialLocation.lng], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(map);
      var customIcon = L.icon({
        iconUrl: "<?php echo base_url(); ?>assets/user/placeholder.png", // Ubah path sesuai dengan lokasi gambar ikon marker Anda
        iconSize: [42, 42], // Ukuran ikon marker
        iconAnchor: [16, 32] // Posisi anchor ikon marker
      });
      var marker = L.marker([initialLocation.lat, initialLocation.lng], {
        draggable: true,
        icon: customIcon
      }).addTo(map); // Ganti latitude dan longitude dengan koordinat yang diinginkan
      marker.on('dragend', function(e) {
        var latLng = e.target.getLatLng();
        console.log("Latitude : " + latLng.lat + " longitude : " + latLng.lng);
        document.getElementById('latitude').value = latLng.lat;
        document.getElementById('longitude').value = latLng.lng;
      });
    } else {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var initialLocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          document.getElementById('latitude').value = initialLocation.lat;
          document.getElementById('longitude').value = initialLocation.lng;

          var map = L.map('map').setView([initialLocation.lat, initialLocation.lng], 13); // Koordinat default Jakarta, bisa disesuaikan

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
          }).addTo(map);
          var customIcon = L.icon({
            iconUrl: "<?php echo base_url(); ?>assets/user/placeholder.png", // Ubah path sesuai dengan lokasi gambar ikon marker Anda
            iconSize: [42, 42], // Ukuran ikon marker
            iconAnchor: [16, 32] // Posisi anchor ikon marker
          });
          var marker = L.marker([initialLocation.lat, initialLocation.lng], {
            draggable: true,
            icon: customIcon
          }).addTo(map); // Ganti latitude dan longitude dengan koordinat yang diinginkan
          marker.on('dragend', function(e) {
            var latLng = e.target.getLatLng();
            console.log("Latitude : " + latLng.lat + " longitude : " + latLng.lng);
            document.getElementById('latitude').value = latLng.lat;
            document.getElementById('longitude').value = latLng.lng;
          });


        });
      } else {
        // Handle jika geolocation tidak didukung oleh browser
        var initialLocation = {
          lat: -6.175392,
          lng: 106.827153
        };
        var map = L.map('map').setView([initialLocation.lat, initialLocation.lng], 13); // Koordinat default Jakarta, bisa disesuaikan

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        var customIcon = L.icon({
          iconUrl: "<?php echo base_url(); ?>assets/user/placeholder.png", // Ubah path sesuai dengan lokasi gambar ikon marker Anda
          iconSize: [42, 42], // Ukuran ikon marker
          iconAnchor: [16, 32] // Posisi anchor ikon marker
        });
        var marker = L.marker([initialLocation.lat, initialLocation.lng], {
          draggable: true,
          icon: customIcon
        }).addTo(map); // Ganti latitude dan longitude dengan koordinat yang diinginkan
        marker.on('dragend', function(e) {
          var latLng = e.target.getLatLng();
          console.log("Latitude : " + latLng.lat + " longitude : " + latLng.lng);
          document.getElementById('latitude').value = latLng.lat;
          document.getElementById('longitude').value = latLng.lng;
        });
      }
    }
  </script>

  <script>
    var initialLocation = {
      lat: document.getElementById('latitude').value,
      lng: document.getElementById('longitude').value
    };
    var map = L.map('map_viewonly').setView([initialLocation.lat, initialLocation.lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    var customIcon = L.icon({
      iconUrl: "<?php echo base_url(); ?>assets/user/placeholder.png", // Ubah path sesuai dengan lokasi gambar ikon marker Anda
      iconSize: [42, 42], // Ukuran ikon marker
      iconAnchor: [16, 32] // Posisi anchor ikon marker
    });
    var marker = L.marker([initialLocation.lat, initialLocation.lng], {
      icon: customIcon
    }).addTo(map);
  </script>

  <script>
    $("#textarea_diskusi").each(function() {
      this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    }).on("input", function() {
      this.style.height = "auto";
      this.style.height = (this.scrollHeight) + "px";
    });

    $(document).on('click', '.toggle-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $("#password");
      input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
    });
  </script>
  <script>
    $('#spinner').hide();

    $(document).ready(function() {

      $('body').on("change", "#combobox_provinsi", function() {
        $('#combobox_kabupaten').empty().append('<option value="">Pilih Kabupaten</option>');
        var id = $(this).val();
        var data = "id=" + id + "&data=kabupaten";
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url('main/get_data_wilayah') ?>',
          data: data,
          success: function(hasil) {
            var data = JSON.parse(hasil);
            var list_kabupaten = "";
            for (let i = 0; i < data.kabupaten.length; i++) {
              list_kabupaten += '<option value=' + data.kabupaten[i].kode + '>' + data.kabupaten[i].nama + '</option>';
            }
            $('#combobox_kabupaten').append(list_kabupaten);
          }
        });
      });

      $('body').on("change", "#combobox_kabupaten", function() {
        $('#combobox_kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
        var id = $(this).val();
        var data = "id=" + id + "&data=kecamatan";
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('main/get_data_wilayah') ?>",
          data: data,
          success: function(hasil) {
            var data = JSON.parse(hasil);
            var list_kecamatan = "";
            for (let i = 0; i < data.kecamatan.length; i++) {
              list_kecamatan += '<option value=' + data.kecamatan[i].kode + '>' + data.kecamatan[i].nama + '</option>';
            }
            $('#combobox_kecamatan').append(list_kecamatan);
          }
        });
      });

    });

    $('#form_update_foto').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url('main/updatefotoprofil') ?>',
        type: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#spinner').show();
        },
        complete: function() {
          $('#spinner').hide();
        },
        success: function(data) {
          $('#form_update_foto').trigger("reset");
          swal(data)
            .then((value) => {
              location.reload();
            });
        },
        error: function(data) {
          console.log(data);
        }
      });
    });


    $('#updateprofil_form').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url('main/updateprofil_action'); ?>',
        type: 'POST',
        data: $('#updateprofil_form').serialize(),
        beforeSend: function() {
          $('#spinner').show();
        },
        complete: function() {
          $('#spinner').hide();
        },
        success: function(data) {
          swal(data)
            .then((value) => {
              location.reload();
            });
        },
        error: function(data) {
          console.log(data);
        }
      });
    });
  </script>

<script>
    var currentURL = window.location.href;
    if (currentURL === "<?= base_url("main/editprofil/tidaklengkap"); ?>") {
      swal({
        title: "Data Pribadi Belum lengkap...",
        text: "Kami Mohon Kepada Anda Untuk Dapat Melengkapi Data Pribadi anda, Terima kasih😊",
        icon: "warning",
        dangerMode: true,

      })
    }
  </script>
</body>

</html>