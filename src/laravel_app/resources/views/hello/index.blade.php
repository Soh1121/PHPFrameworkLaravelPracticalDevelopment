<!DOCTYPE html>
<html lang="ja">

<head>
	<title>Index</title>
	<style>
		th {
			background-color: red;
			padding: 10px;
		}

		td {
			background-color: #eee;
			padding: 10px;
		}
	</style>
</head>

<body>
	<h1>Hello/Index</h1>
	<p>{!!$msg!!}</p>
	<form action="/hello" method="post">
		@csrf
		<input type="text" name="msg">
		<input type="submit">
	</form>
</body>

</html>