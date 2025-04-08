@extends('layouts.main')

@section('title', 'Unit - Berkah Expedisi')

@section('body-class', 'blog-page')

@section('content')
  <!-- Page Title -->
  <div class="page-title dark-background" style="background: url('images/unit.jpeg') no-repeat center center/cover;">
    <div class="container position-relative">
      <h1>Pilih Unit</h1>
      <p>Pilih unit sesuai dengan kebutuhan pengiriman Anda</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Unit</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Pricing Section -->
  <section id="pricing" class="pricing section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2 class="text-primary">Pilihan Unit</h2>
  <p>Pilih unit yang sesuai dengan kebutuhan Anda</p>
</div><!-- End Section Title -->

<div class="container">
  <div class="row gy-3">

    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <div class="pricing-item">
        <img src="images/vehicles/pickup.jpg" alt="Pickup" class="img-fluid mb-3">
        <h3>Pickup</h3>
        <ul>
          <li>Kapasitas 1 ton</li>
          <li>Cocok untuk barang ringan</li>
          <li>Area perkotaan</li>
          <li>Pengiriman cepat</li>
        </ul>
        <div class="btn-wrap">
          <a href="#" class="btn-buy">Sewa Sekarang</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="200">
      <div class="pricing-item">
        <img src="images/vehicles/box.jpg" alt="Box" class="img-fluid mb-3">
        <h3>Box</h3>
        <ul>
          <li>Kapasitas 2-4 ton</li>
          <li>Terlindung dari cuaca</li>
          <li>Cocok untuk retail</li>
          <li>Aman dan nyaman</li>
        </ul>
        <div class="btn-wrap">
          <a href="#" class="btn-buy">Sewa Sekarang</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="300">
      <div class="pricing-item">
        <img src="images/vehicles/tronton.jpg" alt="Tronton" class="img-fluid mb-3">
        <h3>Tronton</h3>
        <ul>
          <li>Kapasitas 8-10 ton</li>
          <li>Pengiriman antar kota</li>
          <li>Barang berat/besar</li>
          <li>Efisien untuk bulk</li>
        </ul>
        <div class="btn-wrap">
          <a href="#" class="btn-buy">Sewa Sekarang</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
      <div class="pricing-item">
        <img src="images/vehicles/trailer.jpg" alt="Trailer" class="img-fluid mb-3">
        <h3>Trailer</h3>
        <ul>
          <li>Kapasitas 20+ ton</li>
          <li>Kontainer 20-40 ft</li>
          <li>Pengiriman nationwide</li>
          <li>Proyek besar</li>
        </ul>
        <div class="btn-wrap">
          <a href="#" class="btn-buy">Sewa Sekarang</a>
        </div>
      </div>
    </div>

  </div>
</div>

</section><!-- /Pricing Section -->

  <!-- Blog Pagination Section -->
  <section id="blog-pagination" class="blog-pagination section">
    <div class="container">
      <div class="d-flex justify-content-center">
        <ul>
          <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
          <li><a href="#">1</a></li>
          <li><a href="#" class="active">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li>...</li>
          <li><a href="#">10</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
        </ul>
      </div>
    </div>
  </section>
@endsection