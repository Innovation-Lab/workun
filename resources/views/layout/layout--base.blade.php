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
    <script src="{{secure_asset('js/common.js')}}" type="text/javascript"></script>
    <script src="{{secure_asset('js/library/remodal.js')}}" type="text/javascript"></script>
  </body>
</html>
