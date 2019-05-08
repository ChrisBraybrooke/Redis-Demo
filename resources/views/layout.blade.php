<!DOCTYPE html>
<html>
<head>
  <title>Test</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
</head>
<body>
  @yield('body')
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>