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
    <link rel="stylesheet" href="./assets/css/jquery.dataTables.min.css">
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <!-- Core CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        header {
            height: 100vh;
            background-image: url('./assets/img/bontang.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header-overlay {
            height: 100vh;
            background-color: rgba(29, 53, 87, .9);
        }

        .active {
            font-weight: 500;
        }

        .hero {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
        }

        .about {
            height: 50vh;
            margin: 60px 0;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }

        .kategori {
            background-image: url('./assets/img/bontang.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .kategori-color {
            /* background-color: rgba(0, 0, 0, 0.6); */
            background-color: rgba(29, 53, 87, 0.8);
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="header-overlay">
            <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top" style="box-shadow: 0 4px 20px rgba(0, 0, 0, .08); padding: 20px 0;">
                <div class="container-fluid container">
                    <a class="navbar-brand" href="#" style="font-weight: 500;">SIG <span style="font-weight: 700; letter-spacing: .2rem; color: #1d3557;">UMKM</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#maps">Maps</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#umkm">UMKM</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <section class="hero">
                <h2>Sistem Informasi Geografis</h2>
                <h1 style="font-weight: 600; margin: 10px 0 20px;">Usaha Mikro Kecil Dan Menengah (UMKM)</h1>
                <h2>Kecamatan Bontang Barat - Kota Bontang</h2>
            </section>
        </div>
    </header>

    <section class="about" id="about" style="background-color: #ffffff;">
        <div class="d-flex container">
            <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center">
                <img src="./assets/img/logo-bontang.png" alt="" width="85" class="my-2">
                <h4 style="font-weight: 500;">SIG UMKM BONTANG BARAT</h4>
            </div>
            <div class="col-md-6 col-12 d-flex flex-column justify-content-center" style="text-align: justify;">
                <p>Sistem Informasi Geografis UMKM Bontang Barat Merupakan Website Pemetaan Geografis UMKM Di Wilayah Kecamatan Bontang Barat, Kota Bontang. Website SIG UMKM Bontang Barat Berisikan Informasi Dan Lokasi Dari UMKM Di Kecamatan Bontang Barat, Kota Bontang.</p>
                <span style="font-size: 14px;"><i>~ Informasi Dapat Berubah Sewaktu-waktu</i></span>
            </div>
        </div>
    </section>

    <section class="kategori d-flex align-items-center text-center" id="kategori" style="background-color: #1d3557; height: 20vh;">
        <div class="kategori-color">
            <div class="d-flex container justify-content-evenly text-white">
                <div class="col-3">
                    <h4>0</h4>
                    <span style="font-size: 14px;">Kategori Industri</span>
                </div>
                <div class="col-3">
                    <h4>0</h4>
                    <span style="font-size: 14px;">Kategori Dagang</span>
                </div>
                <div class="col-3">
                    <h4>0</h4>
                    <span style="font-size: 14px;">Kategori Jasa</span>
                </div>
            </div>
        </div>
    </section>

    <section class="maps d-flex justify-content-center align-items-center" id="maps" style="height: 75vh; background-color: #F6F6F7;">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div id="map" style="height: 60vh; width: 100%; border-radius: 10px; box-shadow: 0 0 20px 1px rgba(0, 0, 0, .1);"></div>
        </div>
    </section>

    <section class="umkm" id="umkm" style="background-color: #ffffff; height: 80vh; margin: 80px 0;">
        <div class="container">
            <h3 class="my-5">Informasi UMKM</h3>
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama UMKM</th>
                            <th scope="col">Kelurahan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <footer class="py-3" style="background-color: rgba(29, 53, 87, .9);">
        <p class="p-0 m-0 text-center text-white" style="font-size: 12px;">Copyright © 2022 - Achmad Ricky Andrian</p>
    </footer>

    <a href="#" class="backtop d-none" style="background-color:  rgba(35, 58, 93, .95); height: 45px; width: 45px; position: fixed; bottom: 30px; right: 30px; border-radius: 10px;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white p-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </a>

    <!-- JQuery and Datatables -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $(window).scroll(function() {
                if (window.scrollY > 100) {
                    $('.backtop').addClass('d-block');
                    $('.backtop').removeClass('d-none');
                } else {
                    $('.backtop').removeClass('d-block');
                    $('.backtop').addClass('d-none');
                }
            });
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- geoJson Bontang Barat -->
    <script src="./assets/js/bontang-barat.js"></script>
    <!-- Config Leaflet JS -->
    <script>
        const map = L.map('map', {
            attributionControl: false,
            // zoomControl: false,
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