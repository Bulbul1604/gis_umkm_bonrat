<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('layouts._header')
</head>

<body>

  <!-- Sidebar -->
  @include('layouts._sidebar')
  <!-- /Sidebar -->


  <main class="content">

    <!-- Navbar -->
    @include('layouts._navbar')
    <!-- /Navbar -->

    <div class="pt-3 pb-2">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
          <li class="breadcrumb-item">
            <a href="#">
              <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
              </svg>
            </a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">SIG UMKM - Bontang Barat</li>
          <li class="breadcrumb-item active" aria-current="page">@yield('title-item')</li>
          <li class="breadcrumb-item active" aria-current="page">@yield('title-subitem')
          </li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
          <div class="card-body">
            @yield('main-content')
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    @include('layouts._footer')
    <!-- /Footer -->
  </main>




  <!-- Script -->
  @include('layouts._script')
  <!-- /Script -->
  @stack('javascript')

</body>

</html>