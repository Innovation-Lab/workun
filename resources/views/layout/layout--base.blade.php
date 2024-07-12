<!doctype html>
<html lang="{{ app()->getLocale() }}">
  @include('layout._head')
  <body>
    <!-- svg -->
    @include('component._svg')
    <div class="wrapper">
      @include('layout._header')
      <div class="l-main">
        @yield('content')
        @include('layout._footer')
      </div>
    </div>
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{secure_asset('js/common.js')}}" type="text/javascript"></script>
  </body>
</html>
