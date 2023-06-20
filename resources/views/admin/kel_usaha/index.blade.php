@extends('layouts.appMain')
@section('title-item', 'Data Kelompok Usaha')
@section('title-content', 'Data Kelompok Usaha')

@section('main-content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
  <strong>Selamat!</strong> {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
  <h5>{{ __('Data Kelompok Usaha') }}</h5>
  <a href="{{ route('admin.kelompok_usaha.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
</div>

<div class="card-body">
  <div class="table-responsive">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Kelompok Usaha</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelompok_usaha as $usaha)
        <tr>
          <td>{{ ucwords($usaha->kel_usaha) }}</td>
          <td class="d-flex" style="column-gap: 4px">
            <a href="{{ route('admin.kelompok_usaha.edit', $usaha->id) }}"
              class="btn btn-sm btn-outline-warning">Ubah</a>
            <form action="{{ route('admin.kelompok_usaha.destroy', $usaha->id) }}" method="POST">
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
</div>
</div>
</div>
</div>
</div>
@endsection

@push('javascript')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@endpush