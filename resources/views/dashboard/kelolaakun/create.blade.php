@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
      <h1>Tambah Akun</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/dashboard/kelola-akun">Kelola Akun</a></li>
          <li class="breadcrumb-item active">Tambah Akun</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Tambah Akun</h5>

              <form action="/dashboard/kelola-akun" method="POST" class="row g-3">
                @csrf
                
                <div class="col-12">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" 
                         id="name" name="name" value="{{ old('name') }}" required>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" 
                         id="username" name="username" value="{{ old('username') }}" required>
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" 
                         id="email" name="email" value="{{ old('email') }}" required>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" 
                         id="password" name="password" required>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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