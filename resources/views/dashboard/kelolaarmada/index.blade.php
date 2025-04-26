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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Armada</h5>
              
              <a href="/dashboard/armada/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Tambah Armada</a>

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
                        <a href="/dashboard/armada/{{ $armada->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                        <a href="/dashboard/armada/{{ $armada->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil"></i></a>
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

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection