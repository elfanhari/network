<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Network - MyApp</title>
  <link rel="stylesheet" href="/bs5/css/bootstrap.min.css">
</head>
<body style="font-family: 'Mulish';">
  
@include('myapp.layouts.nav')

<div class="container">
  <div class="my-3">
    @yield('content')
  </div>
  <script src="/bs5/js/bootstrap.min.js"></script>
</body>
</html>