<!doctype html>
<html lang="{{ app()->getLocale() }}">
  @include('layout._head')
  <body>
    <!-- svg -->
    @include('component._svg')
    <div class="wrapper">
      @include('layout._header')
      @yield('content')
      @include('layout._footer')
    </div>
    <!-- script -->
    <script src="{{asset('js/jquery-3.5.1.slim.min.js')}}" type="text/javascript"></script>
  </body>
</html>
