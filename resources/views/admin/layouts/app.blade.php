<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    {!! Html::style('/css/my.css')!!}

    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="position: relative; min-height: 100%; clear: both; top: 0">
<header class="row">
    <div class="container">
        @include('admin.layouts.navbar')
    </div>
</header>
<content>
    <div class="container">
        <div class="p-content">
            @yield('content')
        </div>
    </div>
</content>
<div class="container">
    <footer class="footer">
    </footer>
</div>
</body>
</html>

