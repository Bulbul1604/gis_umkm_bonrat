@extends('layouts.appMain')
@section('title-item', 'Lihat Data UMKM')
@section('title-content', 'Lihat Data UMKM')

@section('main-content')
    <div class="row">
        <div class="col-12 col-md-6">
            <h5 class="mb-3">Informasi UMKM</h5>
            <div class="table-responsive">
                <table class="table" style="width:100%">
                    <tr>
                        <th>Pemilik Usaha</th>
                        <td>{{ ucwords($umkm->user->name) }}</td>
                    </tr>
                    <tr>
                        <th>Kelompok Usaha</th>
                        <td>{{ ucwords($umkm->kelompokUsaha->kel_usaha) }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Usaha</th>
                        <td>{{ ucwords($umkm->jenis_usaha) }}</td>
                    </tr>
                    <tr>
                        <th>Bidang Usaha</th>
                        <td>{{ ucwords($umkm->nama_usaha) }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Usaha</th>
                        <td>{{ ucwords($umkm->alamat) }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h5>Lokasi</h5>
            <div id="map" class="border rounded mb-3" style="height: 90%"></div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        let map = L.map('map', {
            attributionControl: false,
        }).setView([{{ $umkm->location }}], 18);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let icon = L.icon({
            iconUrl: "{{ asset('img/shop.png') }}",
            iconSize: [24, 24],
        });

        let marker = L.marker([{{ $umkm->location }}], {
            icon: icon
        }).addTo(map);
        marker.bindPopup(
            `<small style="font-weight: bold; text-transform: uppercase; letter-spacing: 1px;"> {{ $umkm->nama_usaha }} </small> <br /><br /> <a href="{{ route('detail-map-rute', $umkm->id) }}" class="text-success" style="text-decoration: none">Tampilkan Rute</a>`
        ).openPopup();
    </script>
@endpush
