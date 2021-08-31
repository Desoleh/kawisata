<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Integrate Bootstrap Datepicker in Laravel </title>

    @stack('style-before')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    @stack('style-after')

</head>

<body>
    @include('layouts.includes.navbarm')
    <div class="content" style="margin-top: 95px">
                @yield('content')
    </div>
</body>

    @stack('script-before')
    <script type="text/javascript">
        $('.date').datepicker({
        format: 'yyyy-mm-dd'
        });
    </script>
    @stack('script-after')
</html>
