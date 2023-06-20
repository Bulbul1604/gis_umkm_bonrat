@extends('layouts.appMain')
@section('title-item', 'Ubah Data Kelompok Usaha')
@section('title-content', 'Ubah Data Kelompok Usaha')

@section('main-content')
<h5 class="my-3">{{ __('Ubah Data Kelompok Usaha') }}</h5>

<form method="POST" action="{{ route('admin.kelompok_usaha.update', $usaha->id) }}">
  @csrf
  @method('patch')

  <div class="row mb-3">
    <label for="kel_usaha" class="col-md-3 col-form-label text-md-start">{{ __('Nama Kelurahan') }}</label>

    <div class="col-md-9">
      <input id="kel_usaha" type="text" class="form-control @error('kel_usaha') is-invalid @enderror" name="kel_usaha"
        value="{{ $usaha->kel_usaha }}" required autocomplete="kel_usaha" autofocus>

      @error('kel_usaha')
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