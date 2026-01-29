@extends('master')
@section('content')
<!-- ===== Hero Section Start ===== -->
      @include('hero')
      <!-- ===== Hero Section End ===== -->
    
      <!-- ===== About Section Start ===== -->
      @include('about')
      <!-- ===== About Section End ===== -->

      <!-- ====== Stats Section Start -->
      {{-- @include('stats') --}}
      <!-- ====== Stats Section End -->

      <!-- ====== Portfolio Section Start -->
      @include('portfolio' )
      <!-- ====== Portfolio Section End -->
      <!-- ====== Team Section Start -->
      @include('team')
      <!-- ====== Team Section End -->
@endsection