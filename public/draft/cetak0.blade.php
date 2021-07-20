{{-- <html>
<head>
<link rel="stylesheet" href="{{ asset('bootstrap/4.6.0/css/bootstrap.min.css') }}">

<script type="text/javascript" src="{{ asset('bootstrap/4.6.0/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminlte/vendor/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminlte/jquery.printPage.js') }}"></script>
</head>
<body>
<div class="container">
<div class="col-md-12">
@yield('content')
</div>
</div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
</head>

<body>

    @yield('content')

<script src="{{ asset('adminlte/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/jQuery.print.min.js')}}"></script>
<script src="{{asset('adminlte/print.js')}}"></script>
</body>

</html>