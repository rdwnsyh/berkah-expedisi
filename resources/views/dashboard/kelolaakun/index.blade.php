@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
      <h1>Kelola Akun</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Kelola Akun</li>
        </ol>
      </nav>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Akun</h5>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <a href="/dashboard/kelola-akun/create" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Akun</a>
                </div>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <a href="/dashboard/kelola-akun/{{ $user->id }}/edit" class="btn btn-warning btn-sm">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <form action="/dashboard/kelola-akun/{{ $user->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini?')">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="mt-3">
                {{ $users->links('vendor.pagination.bootstrap-5') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection