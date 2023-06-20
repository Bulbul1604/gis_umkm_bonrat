<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
  <a class="navbar-brand me-lg-5" href="../../index.html">
    <img class="navbar-brand-dark" src="{{ asset('assets/images/logo-bontang.png') }}" alt="Volt logo" />
    <img class="navbar-brand-light" src="{{ asset('assets/images/logo-bontang.png') }}" alt="Volt logo" />
  </a>
  <div class="d-flex align-items-center">
    <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="d-block">
          <h2 class="h5 mb-3">{{ __('Administrator') }}</h2>
          <a href="#" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Sign Out
          </a>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
          aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon">
            <img src="{{ asset('assets/images/logo-bontang-dark.png') }}" height="20" width="20" alt="Volt Logo">
          </span>
          <span class="mt-1 ms-1 sidebar-text">SIG UMKM</span>
        </a>
      </li>

      <li class="nav-item{{ Request::is('home') ? ' active' : ''  }}">
        <a href="{{ route('home') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
          </span>
          <span class="sidebar-text">Dashboard</span>
        </a>
      </li>

      @if (Auth::user()->level == 'admin')
      <li class="nav-item{{ Request::is('admin/users') || Request::is('admin/users/*') ? ' active' : ''  }}">
        <a href="{{ route('admin.users.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
              style="fill: rgba(156, 163, 175, 1);transform: ;msFilter:;">
              <path
                d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
              </path>
            </svg>
          </span>
          <span class="sidebar-text">User Login</span>
        </a>
      </li>

      <li class="nav-item{{ Request::is('admin/kelurahan') || Request::is('admin/kelurahan/*') ? ' active' : ''  }}">
        <a href="{{ route('admin.kelurahan.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
              style="fill: rgba(156, 163, 175, 1);transform: ;msFilter:;">
              <path
                d="M18.991 2H9.01C7.899 2 7 2.899 7 4.01v5.637l-4.702 4.642A1 1 0 0 0 3 16v5a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4.009C21 2.899 20.102 2 18.991 2zm-8.069 13.111V20H5v-5.568l2.987-2.949 2.935 3.003v.625zM13 9h-2V7h2v2zm4 8h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V7h2v2z">
              </path>
              <path d="M7 15h2v2H7z"></path>
            </svg>
          </span>
          <span class="sidebar-text">Kelurahan</span>
        </a>
      </li>

      <li
        class="nav-item{{ Request::is('admin/kelompok_usaha') || Request::is('admin/kelompok_usaha/*') ? ' active' : ''  }}">
        <a href="{{ route('admin.kelompok_usaha.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
              style="fill: rgba(156, 163, 175, 1);transform: ;msFilter:;">
              <path
                d="M15 3H4.984c-1.103 0-2 .897-2 2v14.016c0 1.103.897 2 2 2H19c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-4zm4 5h-3V5h3v3zM4.984 10h3v4.016h-3V10zm5 0H14v4.016H9.984V10zM16 10h3v4.016h-3V10zm-2-5v3H9.984V5H14zM7.984 5v3h-3V5h3zm-3 11.016h3v3h-3v-3zm5 3v-3H14v3H9.984zm6.016 0v-3h3.001v3H16z">
              </path>
            </svg>
          </span>
          <span class="sidebar-text">Kelompok Usaha</span>
        </a>
      </li>

      <li class="nav-item{{ Request::is('admin/umkm') || Request::is('admin/umkm/*') ? ' active' : ''  }}">
        <a href="{{ route('admin.umkm.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
              style="fill: rgba(156, 163, 175, 1);transform: ;msFilter:;">
              <path
                d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804.02.004c-.015.064-.04.124-.04.192 0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z">
              </path>
            </svg>
          </span>
          <span class="sidebar-text">UMKM</span>
        </a>
      </li>
      @else
      <li class="nav-item{{ Request::is('umkm/data') || Request::is('umkm/data/*') ? ' active' : ''  }}">
        <a href="{{ route('umkm.data.index') }}" class="nav-link">
          <span class="sidebar-icon">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
              style="fill: rgba(156, 163, 175, 1);transform: ;msFilter:;">
              <path
                d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804.02.004c-.015.064-.04.124-.04.192 0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z">
              </path>
            </svg>
          </span>
          <span class="sidebar-text">Data UMKM</span>
        </a>
      </li>
      @endif

    </ul>
  </div>
</nav>