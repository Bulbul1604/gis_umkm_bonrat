@extends('layouts.appMain')
@section('title-item', 'Tambah Data Users')
@section('title-content', 'Tambah Data Users')

@section('main-content')
<h5 class="py-3">{{ __('Tambah Data Users') }}</h5>

<form method="POST" action="{{ route('admin.users.store') }}">
  @csrf

  <div class="row mb-3">
    <label for="name" class="col-md-3 col-form-label text-md-start">{{ __('Name') }}</label>

    <div class="col-md-9">
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name') }}" required autocomplete="name" autofocus>

      @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="email" class="col-md-3 col-form-label text-md-start">{{ __('Email Address') }}</label>

    <div class="col-md-9">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email">

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="password" class="col-md-3 col-form-label text-md-start">{{ __('Password') }}</label>

    <div class="col-md-9">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        required autocomplete="new-password">

      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="row mb-3">
    <label for="password-confirm" class="col-md-3 col-form-label text-md-start">{{ __('Confirm Password')
      }}</label>

    <div class="col-md-9">
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
        autocomplete="new-password">
    </div>
  </div>

  <div class="row mb-3">
    <label for="role" class="col-md-3 col-form-label text-md-start">{{ __('Role Login') }}</label>

    <div class="col-md-9">
      <select name="level" id="level" class="form-select @error('level') is-invalid @enderror" required
        value="{{ old('level') }}">
        <option>Pilih salah satu</option>
        <option value="admin">Admin</option>
        <option value="umkm">UMKM</option>
      </select>

      @error('level')
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