<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Healernetwork</title>

  <!-- ✅ Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/images/dark-logo.png') }}">

  <!-- ✅ Custom CSS (after bootstrap so overrides work) -->
  <link rel="stylesheet" href="{{ asset('asset/custome-css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/custome-css/all.min.css') }}">
<link href="https://fonts.cdnfonts.com/css/cormorant-garamond" rel="stylesheet">
                
  <!-- ✅ Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
  <div id="app"></div>

  <!-- ✅ jQuery -->
  <script src="{{ asset('asset/js/jquery-min.js') }}"></script>

  <!-- ✅ Bootstrap JS -->
  <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>

  <!-- ✅ Vite (Vue / app.js) -->
  @vite('resources/js/app.js')
</body>
</html>
