<!DOCTYPE html>
<html lang="ja">

<head>
	<title>Index</title>
	<link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="padding: 10px;">
	<h1>Hello/Index</h1>
	<p>{{ $msg }}</p>
	<div id="mycomponent"></div>
	<script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>