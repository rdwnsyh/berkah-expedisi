@extends('dashboard.layouts.main')

@section('container')

    <div class="pagetitle">
      <h1>Tambah Armada</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/dashboard/armada">Kelola Armada</a></li>
          <li class="breadcrumb-item active">Tambah Armada</li>
        </ol>
      </nav>
    </div>

    <section class="section armada">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Tambah Armada</h5>

              <form action="/dashboard/armada" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                
                <div class="col-12">
                  <label class="form-label">Kategori Armada</label>
                 
                  @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Nama Mobil</label>
                  <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" 
                         name="nama_mobil" value="{{ old('nama_mobil') }}">
                  @error('nama_mobil')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                    name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                  @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-4">
                  <label class="form-label">Ukuran</label>
                  <input type="text" class="form-control @error('ukuran') is-invalid @enderror" 
                         name="ukuran" value="{{ old('ukuran') }}">
                  @error('ukuran')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-4">
                  <label class="form-label">Berat</label>
                  <input type="text" class="form-control @error('berat') is-invalid @enderror" 
                         name="berat" value="{{ old('berat') }}">
                  @error('berat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-4">
                  <label class="form-label">Muatan</label>
                  <input type="text" class="form-control @error('muatan') is-invalid @enderror" 
                         name="muatan" value="{{ old('muatan') }}">
                  @error('muatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Gambar Armada</label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" 
                         name="image" onchange="previewImage()">
                  @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <img class="img-preview img-fluid mt-3 col-sm-5">
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
<script>
  function previewImage() {
    const image = document.querySelector('input[name=image]');
    const imgPreview = document.querySelector('.img-preview');
    
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection