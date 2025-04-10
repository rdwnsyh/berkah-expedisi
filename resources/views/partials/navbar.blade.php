<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="images/Bex.png" alt="Bex Logo" class="logo-img">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
          <li><a href="/armada" class="{{ request()->is('armada') ? 'active' : '' }}">Armada</a></li>
          <li><a href="/tentang-kami" class="{{ request()->is('tentang-kami') ? 'active' : '' }}">Tentang Kami</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn" href="https://wa.me/6281120998115" target="_blank">Hubungi Kami</a>

    </div>
</header>
