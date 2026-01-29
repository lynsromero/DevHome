
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Devs Home</title>
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet"></head>
  <body
    x-data="{ page: 'home', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'c af': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})" class="i l n cd lc cf ha">
  <div class="e"></div>
</div>
    <!-- ===== Preloader End ===== -->

    <!-- ===== Header Start ===== -->

    @include('header')

    <!-- ===== Header End ===== -->

    <main>
      
      @yield('content')
      
      <!-- ====== Contact Section Start -->
      @include('contact')
      <!-- ====== Contact Section End -->

    </main>
    <!-- ===== Footer Start ===== -->
    @include('footer')
    <!-- ====== Footer Section Start -->
<script defer src="{{ asset('front/js/bundle.js') }}"></script></body>
</html>
