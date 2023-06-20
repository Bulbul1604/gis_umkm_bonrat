@extends('layouts.appMain')
@section('title-item', 'Ubah Data UMKM')
@section('title-content', 'Ubah Data UMKM')

@section('main-content')
<h5 class="my-3">{{ __('Ubah Data UMKM') }}</h5>

<form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="form-group mb-3">
    <label for="">User UMKM</label>
    <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
      @foreach ($users as $user)
      <option value="{{ $user->id }}" {{ ($umkm->user_id == $user->id) ? 'selected' : '' }}>{{ $user->id }} - {{
        ucwords($user->name) }}</option>
      @endforeach
    </select>
    @error('user_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group mb-3">
    <label for="">Nama Usaha</label>
    <input type="text" name="nama_usaha" class="form-control @error('nama_usaha') is-invalid @enderror" id=""
      value="{{ $umkm->nama_usaha }}">
    @error('nama_usaha')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group mb-3">
    <label for="">Alamat Usaha</label>
    <textarea name="alamat" class="form-control @error('alamat')
                      is-invalid
                  @enderror" id="" cols="30" rows="3">{{ $umkm->alamat }}</textarea>
    @error('alamat')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group mb-3">
    <label for="">Kelurahan</label>
    <select name="kelurahan_id" id="kelurahan_id" class="form-select @error('kelurahan_id') is-invalid @enderror">
      @foreach ($kelurahan as $kel)
      <option value="{{ $kel->id }}" {{ ($umkm->kelurahahan_id == $kel->id) ? 'selected' : '' }}>{{
        ucwords($kel->name_kel)
        }}
      </option>
      @endforeach
    </select>
    @error('kelurahan_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group mb-3">
    <label for="">Kelompok Usaha</label>
    <select name="kelompok_usaha_id" id="kelompok_usaha_id"
      class="form-select @error('kelompok_usaha_id') is-invalid @enderror">
      @foreach ($kelompok_usaha as $kel_usaha)
      <option value="{{ $kel_usaha->id }}" {{ ($umkm->kelompok_usaha_id == $kel_usaha->id) ? 'selected' : '' }}>{{
        ucwords($kel_usaha->kel_usaha) }}</option>
      @endforeach
    </select>
    @error('kelompok_usaha_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group mb-3">
    <label for="">Jenis Usaha</label>
    <input type="text" name="jenis_usaha" class="form-control @error('jenis_usaha') is-invalid @enderror" id=""
      value="{{ $umkm->jenis_usaha }}">
    @error('jenis_usaha')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group mb-3">
    <label for="">Lokasi</label>
    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id=""
      value="{{ $umkm->location }}">
    @error('location')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div id="map" class="border rounded mb-3" style="height: 500px"></div>

  <div class="form-group mb-3">
    <label for="">Keterangan</label>
    <textarea name="keterangan" class="form-control @error('keterangan')
                      is-invalid
                  @enderror" id="" cols="30" rows="3">{{ $umkm->keterangan }}</textarea>
    @error('keterangan')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
  </div>
</form>
@endsection

@push('javascript')
<script>
  let map = L.map('map', {
    attributionControl: false,
    // zoomControl: false,
  }).setView([{{ $umkm->location }}], 13);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  let popup = L.popup();

  var marker = L.marker([{{ $umkm->location }}]).addTo(map);

  var loc = document.querySelector("[name=location]");
  map.on("click", function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marker = L.marker(e.latlng).addTo(map);
    } else {
      marker.setLatLng(e.latlng);
    }
    loc.value = lat + "," + lng;
  });

</script>
@endpush