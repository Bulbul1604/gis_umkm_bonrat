<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('layouts._header')
</head>

<body>

  <main>

    <!-- Content -->
    @yield('content')
    <!-- /Content -->

  </main>



  <!-- Script -->
  @include('layouts._script')
  <!-- /Script -->
</body>

</html>