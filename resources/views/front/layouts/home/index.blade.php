@extends('front.layouts.master')
@section('content')
<!-- ===== Hero Section Start ===== -->
      @include('front.layouts.home.hero')
      <!-- ===== Hero Section End ===== -->
    
      <!-- ===== About Section Start ===== -->
      @include('front.layouts.home.about')
      <!-- ===== About Section End ===== -->

      <!-- ====== Stats Section Start -->
      {{-- @include('stats') --}}
      <!-- ====== Stats Section End -->

      <!-- ====== Portfolio Section Start -->
      @include('front.layouts.home.portfolio')
      <!-- ====== Portfolio Section End -->
      <!-- ====== Team Section Start -->
      @include('front.layouts.home.team')
      <!-- ====== Team Section End -->
@endsection

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
