<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
  <title>GIS - UMKM Bontang Barat</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- Leaflet CSS & JS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
</head>

<body>

  <div class="d-flex ">
    <div class="col-5 vh-100 d-flex justify-content-center align-items-center flex-column">
      <img src="./assets/img/logo-bontang.png" alt="Kota Bontang" width="180" />
      <div class="text-center pt-4">
        <h4 class="fw-bold"> Sistem Informasi Geografis</h4>
        <p style="font-size: 18px; font-weight: 500;">Usaha Mikro Kecil Dan Menengah <strong>(UMKM)</strong> Bontang Barat</p>
      </div>
    </div>
    <div class="col-7">
      <div id="map" class="vh-100 border-start" style="box-shadow: -1px -1px 15px 1px rgba(0, 0, 0, 0.13);"></div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <!-- geoJson Bontang Barat -->
  <script src="./assets/js/bontang-barat.js"></script>
  <!-- Config Leaflet JS -->
  <script>
    const map = L.map('map', {
      attributionControl: false,
      zoomControl: false,
    }).setView([0.1372358, 117.4548496], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);
    const barat = L.geoJson(bontangBarat);
    barat.addTo(map);

    var popup = L.popup()
      .setLatLng([0.1372358, 117.4548496])
      .setContent("Kawasan Kecamatan Bontang Barat")
      .openOn(map);
  </script>
</body>

</html>