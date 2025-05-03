<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/armada*') ? '' : 'collapsed' }}" href="/dashboard/armada">
          <i class="bi bi-menu-button-wide"></i><span>Kelola Armada</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/category-armada*') ? '' : 'collapsed' }}" href="/dashboard/category-armada">
          <i class="bi bi-journal-text"></i><span>Kelola Kategori Armada</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/kelola-akun*') ? '' : 'collapsed' }}" href="/dashboard/kelola-akun">
          <i class="bi bi-person"></i>
          <span>Kelola Akun</span>
        </a>
      </li>
    </ul>
</aside>
