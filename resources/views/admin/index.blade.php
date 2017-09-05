<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Font Styles --}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,400i,500,500i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
    {{-- Style Sheets --}}
    <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
<div id="app">
	@include('admin.partials.navbar')
	{{-- container --}}
	<div class="container-fluid">
		<div class="col-md-3">
			@include('admin.partials.sidebar')
		</div>
        <div class="col-md-9">
            @yield('content')
        </div>
	</div>
</div>
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@yield('js')
</body>
</html>