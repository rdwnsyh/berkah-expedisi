@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
      <h1>Tambah Kategori Armada</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/dashboard/category-armada">Kelola Kategori Armada</a></li>
          <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Tambah Kategori Armada</h5>

              <form action="/dashboard/category-armada" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                
                <div class="col-12">
                  <label class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                         id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
                  @error('nama_kategori')
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
                  <label class="form-label">Gambar Kategori</label>
                  <input type="file" class="form-control @error('images') is-invalid @enderror" 
                         name="images" onchange="previewImage()">
                  @error('images')
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
  const nama_kategori = document.querySelector('#nama_kategori');
  const slug = document.querySelector('#slug');

  nama_kategori.addEventListener('change', function() {
    let preslug = this.value;
    preslug = preslug.toLowerCase()
                     .replace(/ /g, '-')
                     .replace(/[^\w-]+/g, '');
    slug.value = preslug;
  });

  function previewImage() {
    const image = document.querySelector('input[name=images]');
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