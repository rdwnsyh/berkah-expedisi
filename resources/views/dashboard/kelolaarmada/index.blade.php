@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
      <h1>Kelola Armada</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Kelola Armada</li>
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
              <h5 class="card-title">Data Armada</h5>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <a href="/dashboard/armada/create" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Armada</a>
                </div>
                
              </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Mobil</th>
                    <th>Ukuran</th>
                    <th>Berat</th>
                    <th>Muatan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($armadas as $armada)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $armada->category->nama_kategori }}</td>
                      <td>{{ $armada->nama_mobil }}</td>
                      <td>{{ $armada->ukuran }}</td>
                      <td>{{ $armada->berat }}</td>
                      <td>{{ $armada->muatan }}</td>
                      <td>
                        <img src="{{ asset('storage/' . $armada->image) }}" alt="{{ $armada->nama_mobil }}" width="70">
                      </td>
                      <td>
                        <a href="/dashboard/armada/{{ $armada->slug }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                        <form action="/dashboard/armada/{{ $armada->slug }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus armada ini?')">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <!-- Pagination -->
              <div class="mt-3">
                {{ $armadas->links('vendor.pagination.bootstrap-5') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection