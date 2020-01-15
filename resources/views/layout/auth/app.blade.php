<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart POS | @yield('my_title')</title>
    <link href="{{url('bst/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('fa/css/all.css')}}" rel="stylesheet">
    <style>
        .toast{
            position: absolute;
            top: 5px;
            left: 5px;
        }
    </style>
</head>
<body>
<div class="mt-5 pt-4">
@yield('my_content')
</div>
<script src="{{url('bst/js/jquery.js')}}"></script>
<script src="{{url('bst/js/bootstrap.js')}}"></script>
<script>
    $(function () {
        $(".toast").toast("show")
    })
</script>
</body>
</html>
