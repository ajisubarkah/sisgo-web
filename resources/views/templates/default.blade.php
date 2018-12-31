<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>{{ $pageTitle ?? 'Hello, SISGO!' }}</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="{{url('css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />

  <link href="{{url('demo/demo.css')}}" rel="stylesheet" />

  @stack('head')
</head>
<body>
    <div style="min-height: 100vh">
        @include('components.sidebar')
        <div class="main-panel">
            @include('components.navbar')
            @yield('body')
            @include('components.footer')
        </div>
    </div>
    @stack('scripts')
</body>
</html>
