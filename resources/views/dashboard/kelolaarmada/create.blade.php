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
                  <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                      </option>
                    @endforeach
                  </select>
                  @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Nama Mobil</label>
                  <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" 
                         name="nama_mobil" value="{{ old('nama_mobil') }}" id="nama_mobil"
                         placeholder="Masukkan nama mobil">
                  @error('nama_mobil')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                         id="slug" hidden name="slug" value="{{ old('slug') }}" readonly>
                  @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                    name="deskripsi" rows="4" placeholder="Masukkan deskripsi armada">{{ old('deskripsi') }}</textarea>
                  @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-4">
                  <label class="form-label">Ukuran</label>
                  <div class="input-group">
                    <input type="text" class="form-control @error('ukuran') is-invalid @enderror" 
                           name="ukuran" value="{{ old('ukuran') }}" placeholder="Contoh: 4.2 x 1.9 x 1.8">
                    <span class="input-group-text">meter</span>
                    @error('ukuran')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <label class="form-label">Berat</label>
                  <div class="input-group">
                    <input type="text" class="form-control @error('berat') is-invalid @enderror" 
                           name="berat" value="{{ old('berat') }}" placeholder="Contoh: 2000">
                    <span class="input-group-text">kg</span>
                    @error('berat')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <label class="form-label">Muatan</label>
                  <div class="input-group">
                    <input type="text" class="form-control @error('muatan') is-invalid @enderror" 
                           name="muatan" value="{{ old('muatan') }}" placeholder="Contoh: 1500">
                    <span class="input-group-text">kg</span>
                    @error('muatan')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-12">
                  <label class="form-label">Gambar Armada</label>
                  <input type="file" class="form-control @error('image') is-invalid @enderror" 
                         name="image" onchange="previewImage()" accept="image/*">
                  <small class="text-muted">Format: jpg, jpeg, png. Ukuran maks: 1MB</small>
                  @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <img class="img-preview img-fluid mt-3 col-sm-5 d-none">
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
    
    imgPreview.classList.remove('d-none');
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

  // Updated slug generator
  const nama_mobil = document.querySelector('#nama_mobil');
  const slug = document.querySelector('#slug');

  nama_mobil.addEventListener('change', function() {
    fetch('/dashboard/armada/checkSlug?nama_mobil=' + nama_mobil.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug);
  });

  nama_mobil.addEventListener('keyup', function() {
    let preslug = nama_mobil.value;
    preslug = preslug.replace(/ /g,'-');
    slug.value = preslug.toLowerCase();
  });
</script>
@endsection