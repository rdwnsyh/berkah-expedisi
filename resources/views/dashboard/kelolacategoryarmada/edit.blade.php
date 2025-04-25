@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
      <h1>Edit Kategori Armada</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/dashboard/category-armada">Kelola Kategori Armada</a></li>
          <li class="breadcrumb-item active">Edit Kategori</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Edit Kategori Armada</h5>

              <form method="post" action="/dashboard/category-armada/{{ $category->id }}" enctype="multipart/form-data" class="row g-3">
                @method('put')
                @csrf
                
                <div class="col-12">
                  <label class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                         id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori) }}" required>
                  @error('nama_kategori')
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
                  @if($category->images)
                    <img src="{{ asset('storage/' . $category->images) }}" class="img-preview img-fluid mt-3 col-sm-5 d-block">
                  @else
                    <img class="img-preview img-fluid mt-3 col-sm-5">
                  @endif
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="/dashboard/category-armada" class="btn btn-secondary">Batal</a>
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