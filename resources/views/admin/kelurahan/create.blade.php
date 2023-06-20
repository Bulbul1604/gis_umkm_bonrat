@extends('layouts.appMain')
@section('title-item', 'Tambah Data Kelurahan')
@section('title-content', 'Tambah Data Kelurahan')

@section('main-content')
<h5 class="py-3">{{ __('Tambah Data Kelurahan') }}</h5>

<form method="POST" action="{{ route('admin.kelurahan.store') }}">
  @csrf

  <div class="row mb-3">
    <label for="name_kel" class="col-md-3 col-form-label text-md-start">{{ __('Nama Kelurahan') }}</label>

    <div class="col-md-9">
      <input id="name_kel" type="text" class="form-control @error('name_kel') is-invalid @enderror" name="name_kel"
        value="{{ old('name_kel') }}" required autocomplete="name_kel" autofocus>

      @error('name_kel')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="row mb-0">
    <div class="col-md-6 offset-md-3">
      <button type="submit" class="btn btn-primary">
        {{ __('Simpan') }}
      </button>
    </div>
  </div>
</form>
@endsection