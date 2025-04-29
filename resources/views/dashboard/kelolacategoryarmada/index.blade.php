@extends('dashboard.layouts.main')

@section('container')

    <div class="pagetitle">
      <h1>Kelola Kategori Armada</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Kelola Kategori Armada</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Kategori Armada</h5>
              
              <a href="/dashboard/category-armada/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Tambah Kategori</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $category->nama_kategori }}</td>
                      <td>
                        <img src="{{ asset('storage/' . $category->images) }}" alt="{{ $category->nama_kategori }}" width="70">
                      </td>
                      <td>
                        <a href="/dashboard/category-armada/{{ $category->slug }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="/dashboard/category-armada/{{ $category->slug }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                        <form action="/dashboard/category-armada/{{ $category->slug }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">
                          <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>
    </section>

@endsection