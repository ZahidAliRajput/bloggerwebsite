<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
  <title> Authentication Process | {{ $title ?? ""}}</title>
</head>

<body class="bg-white">

@yield('content');

</body>

</html>