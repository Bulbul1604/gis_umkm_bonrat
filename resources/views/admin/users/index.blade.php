@extends('layouts.appMain')
@section('title-item', 'Data Users')
@section('title-content', 'Data Users')

@section('main-content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
  <strong>Selamat!</strong> {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
  <h5>{{ __('Data Users') }}</h5>
  <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
</div>

<div class="table-responsive">
  <table id="example" class="table table-striped" style="width:100%">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ ucwords($user->name) }}</td>
        <td>{{ ucwords($user->email) }}</td>
        <td>{{ ucwords($user->level) }}</td>
        <td class="d-flex" style="column-gap: 4px">
          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning">Ubah</a>
          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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