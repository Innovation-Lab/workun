<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  @if( Request::routeIs('home'))
    <title>わーくん</title>
  @else
  <title>@yield('title') | わーくん</title>
  @endif

  <!— ! faviconなど各種 —————————— —>
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/common//foundation/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/common//foundation/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/common/foundation/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('img/common//foundation/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ asset('img/common//foundation/safari-pinned-tab.svg') }}" color="#458238">
  <meta name="msapplication-TileColor" content="#458238">
  <meta name="theme-color" content="#458238">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://use.typekit.net/hrj3xmc.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link href="{{ secure_asset('css/base.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" type="text/css">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>