@extends('layouts.appMain')
@section('title-item', 'Dashboard')
@section('title-content', 'Dashboard')
@section('desc-content', 'Dashbord Sistem Informasi Geografis Usaha Mikro Kecil Menengah (UMKM) Bontang Barat')

@section('main-content')
@if (Auth::user()->level == 'admin')
<div class="row">
  <div class="col-12 col-md-4">
    <a href="{{ route('admin.umkm.index') }}">
      <div class="card border border-0 bg-success text-white">
        <div class="card-header">
          <strong>Data UMKM</strong>
        </div>
        <div class="card-body my-2 py-2">
          <blockquote class="blockquote mb-0">
            <h4>{{ $umkm->count() }}</h4>
            <footer class="blockquote-footer mt-2 text-white">Usaha Mikro Kecil Menengah</cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-md-4">
    <a href="{{ route('admin.kelompok_usaha.index') }}">
      <div class="card border border-0 bg-warning text-white">
        <div class="card-header">
          <strong>Data Kelompok Usaha</strong>
        </div>
        <div class="card-body my-2 py-2">
          <blockquote class="blockquote mb-0">
            <h4>{{ $kel_usaha->count() }}</h4>
            <footer class="blockquote-footer mt-2 text-white">Kelompok Usaha</cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-md-4">
    <a href="{{ route('admin.kelurahan.index') }}">
      <div class="card border border-0 bg-danger text-white">
        <div class="card-header">
          <strong>Data Kelurahan</strong>
        </div>
        <div class="card-body my-2 py-2">
          <blockquote class="blockquote mb-0">
            <h4>{{ $kelurahan->count() }}</h4>
            <footer class="blockquote-footer mt-2 text-white">Kelurahan</cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </a>
  </div>
</div>
@else

<div class="row">
  <div class="col-12">
    <a href="{{ route('umkm.data.index') }}">
      <div class="card border border-0 bg-success text-white">
        <div class="card-header">
          <strong>Data UMKM {{ ucwords(Auth::user()->name) }}</strong>
        </div>
        <div class="card-body my-2 py-2">
          <blockquote class="blockquote mb-0">
            <h4>{{ $umkmPelaku->count() }}</h4>
            <footer class="blockquote-footer mt-2 text-white">Usaha Mikro Kecil Menengah</cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </a>
  </div>

  <div class="col-12">
    <div class="mt-4">
      <div id="map" style="height: 60vh; width: 100%; border-radius: 10px; box-shadow: 0 0 20px 1px rgba(0, 0, 0, .1);">
      </div>
    </div>
  </div>
</div>

@endif
@endsection

@push('javascript')
<script>
  const map = L.map('map', {
      attributionControl: false,
  }).setView([0.1372358, 117.4548496], 13);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);

  const barat = L.geoJson(bontangBarat);
  barat.addTo(map);
  barat.bindPopup("Kawasan Kecamatan Bontang Barat").openPopup();

  @foreach ($umkmPelaku as $umkm)
            L.marker([{{ $umkm->location }}])
                .bindPopup("<h6>{{ ucwords($umkm->nama_usaha) }}</h6><br />{{ ucwords($umkm->alamat) }}<br /><a href='{{ route('umkm.data.show', $umkm->id) }}' class='btn btn-sm btn-primary px-2 py-1 mt-2 text-white'>Detail</a>").
                addTo(map);
        @endforeach

  var popup = L.popup()
      .setLatLng([0.1372358, 117.4548496])
      .setContent("Kawasan Kecamatan Bontang Barat")
      .openOn(map);
</script>
@endpush