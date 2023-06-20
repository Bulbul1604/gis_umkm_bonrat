<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>GIS - UMKM Bontang Barat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <!-- Core CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light navbar-light"
        style="box-shadow: 0 4px 20px rgba(0, 0, 0, .08); padding: 20px 0;">
        <div class="container-fluid container">
            <a class="navbar-brand page-scroll" href="{{ route('welcome') }}" style="font-weight: 500;">SIG <span
                    style="font-weight: 700; letter-spacing: .15rem; color: #1d3557;">UMKM</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        @auth
                            <a class="nav-link fw-bold text-primary mx-md-3 my-2 my-md-0" href="{{ route('home') }}"
                                style="font-size: 14px;">{{ ucwords(Auth::user()->name) }}</a>
                        @endauth
                        @guest
                            <a class="nav-link btn btn-sm btn-primary text-white px-md-3 mx-md-3 my-2 my-md-0"
                                href="{{ route('login') }}" style="font-size: 14px;">Login</a>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="about my-5 container" id="about" style="background-color: #ffffff;">
        <div class="card">
            <div id="map" class="card-img-bottom" style="height: 65vh"></div>
        </div>
    </section>

    <footer class="py-3 fixed-bottom" style="background-color: rgba(29, 53, 87, .9);">
        <p class="p-0 m-0 text-center text-white" style="font-size: 12px;">Copyright © 2022 - Achmad Ricky Andrian</p>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script>
        let map = L.map('map', {
            attributionControl: false,
        }).setView([{{ $umkm->location }}], 15);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let marker = L.marker([{{ $umkm->location }}]).addTo(map);
        marker.bindPopup(
            '<p class="fw-semibold" style="text-transform: uppercase; letter-spacing: 2px;"> {{ $umkm->nama_usaha }} </p>'
        ).openPopup();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert('Geolocation is not supported by this browser.');
        }

        function showPosition(position) {
            L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude),
                    L.latLng({{ $umkm->location }})
                ]
            }).addTo(map);
        }
    </script>
</body>

</html>
