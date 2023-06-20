@extends('layouts.appMain')
@section('title-item', 'Data UMKM')
@section('title-content', 'Data UMKM')

@section('main-content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
  <strong>Selamat!</strong> {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
  <h5>{{ __('Data UMKM') }}</h5>
  <a href="{{ route('umkm.data.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
</div>

<div class="table-responsive">
  <table id="example" class="table table-striped" style="width:100%">
    <thead>
      <tr>
        <th>Nama Usaha</th>
        <th>Kelompok Usaha</th>
        <th>Jenis Usaha</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($umkmall as $umkm)
      <tr>
        <td>{{ ucwords($umkm->nama_usaha) }}</td>
        <td>{{ ucwords($umkm->kelompokUsaha->kel_usaha) }}</td>
        <td>{{ ucwords($umkm->jenis_usaha) }}</td>
        <td class="d-flex" style="column-gap: 4px">
          <a href="{{ route('umkm.data.show', $umkm->id) }}" class="btn btn-sm btn-outline-info">Lihat</a>
          <a href="{{ route('umkm.data.edit', $umkm->id) }}" class="btn btn-sm btn-outline-warning">Ubah</a>
          <form action="{{ route('umkm.data.destroy', $umkm->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('hapus data ?')"
              class="btn btn-sm btn-outline-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@push('javascript')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });

</script>
@endpush