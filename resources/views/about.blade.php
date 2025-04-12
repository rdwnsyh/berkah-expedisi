@extends('layouts.main')

@section('title', 'Profil Perusahaan - Berkah Expedisi')

@section('body-class', 'blog-page')

@section('content')

<div class="page-title dark-background" style="background: url('images/truk3.jpeg') no-repeat center center/cover;">
    <div class="container position-relative">
      <h1 >Tentang Kami</h1>
      <p>Mengenal Lebih Dekat dengan CV Berkah Expedisi</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Tentang Kami</li>
        </ol>
      </nav>
    </div>
</div>

<section id="features" class="features section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2 class="text-primary">Tentang</h2>
    <p>Tentang Kami</p>
  </div><!-- End Section Title -->

    <div class="container">
      <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>CV Berkah Expedisi - Solusi Pengiriman Terpercaya</h3>
                <p class="fst-italic">
                  Kami adalah perusahaan ekspedisi yang berdedikasi untuk memberikan layanan pengiriman terbaik dengan keamanan dan ketepatan waktu sebagai prioritas utama.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i>
                    <span>Berpengalaman melayani pengiriman ke seluruh Indonesia dengan jaringan yang luas</span>
                  </li>
                  <li><i class="bi bi-check2-all"></i> 
                    <span>Sistem tracking real-time untuk memantau status pengiriman</span>
                  </li>
                  <li><i class="bi bi-check2-all"></i> 
                    <span>Armada transportasi modern dan terawat untuk menjamin keamanan barang</span>
                  </li>
                  <li><i class="bi bi-check2-all"></i> 
                    <span>Tim profesional yang siap melayani 24/7</span>
                  </li>
                </ul>
                <p>
                  Sejak berdiri, CV Berkah Expedisi telah berkomitmen untuk menjadi mitra logistik terpercaya bagi pelanggan kami. 
                  Kami terus berinovasi dalam layanan dan teknologi untuk memastikan setiap pengiriman sampai dengan aman dan tepat waktu. 
                  Kepuasan pelanggan adalah prioritas utama kami dalam memberikan layanan ekspedisi yang berkualitas.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="images/truk.jpeg" alt="CV Berkah Expedisi" class="img-fluid rounded shadow">
              </div>
            </div>
          </div><!-- End Tab Content Item -->
      </div>

</section>

<section id="services-2" class="services-2 section light-background">

  <div class="container">

    <div class="row gy-4">

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item d-flex position-relative h-100">
          <i class="bi bi-briefcase icon flex-shrink-0"></i>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Layanan</a></h4>
            <p class="description">Layanan Pelanggan Dengan Maksimal Menyediakan layanan dengan fokus pada
            kepuasan,akurat,ramah dan bertanggung jawab</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item d-flex position-relative h-100">
          <i class="bi bi-card-checklist icon flex-shrink-0"></i>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Inovasi dan Teknologi</a></h4>
            <p class="description">Mengadopsi teknologi terkini untuk meningkatkan efesiensiensi operasional dan menyediakan
            solusi pengiriman yang cerdas dan mudah diakses</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item d-flex position-relative h-100">
          <i class="bi bi-bar-chart icon flex-shrink-0"></i>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Kesejahteraan Karyawan</a></h4>
            <p class="description">Menciptakan lingkungan kerja yang aman dan prouktif serta mendukung pengembangan
            profesional dan pribadi setiap karyawan</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item d-flex position-relative h-100">
          <i class="bi bi-binoculars icon flex-shrink-0"></i>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Jaringan yang Luas</a></h4>
            <p class="description">Mengembangkan jaringan yang luas dan terpercaya untuk memastikan pengiriman yang dapat
            dipercaya dan efesien</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item d-flex position-relative h-100">
          <i class="bi bi-brightness-high icon flex-shrink-0"></i>
          <div>
            <h4 class="title"><a href="#" class="stretched-link">Tanggung Jawab Sosial</a></h4>
            <p class="description">Berkontribusi positif kepada masyarakat dan mengikuti peraturan yang ada di sekitar Perusahaan</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      

    </div>

  </div>

</section><!-- /Services 2 Section -->

@endsection