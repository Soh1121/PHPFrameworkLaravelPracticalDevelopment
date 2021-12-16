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
	<link rel="stylesheet" href="/css/app.css">
	<script>
		function doAction() {
			var id = document.querySelector('#id').value;
			var xhr = new XMLHttpRequest();
			xhr.open('GET', '/hello/json/' + id, true);
			xhr.responseType = 'json';
			xhr.onload = function(e) {
				if (this.status == 200) {
					var result = this.response;
					document.querySelector('#name').textContent = result.name;
					document.querySelector('#mail').textContent = result.mail;
					document.querySelector('#age').textContent = result.age;
				}
			};
			xhr.send();
		}
	</script>
</head>

<body>
	<h1>Hello/Index</h1>
	<p>{{ $msg }}</p>
	<div>
		<form action="/hello" method="post">
			@csrf
			<input type="text" name="find" id="find" value="{{ $input }}">
			<input type="submit">
		</form>
	</div>
	<hr>
	<table border="1">
		@foreach($data as $item)
		<tr>
			<th>{{ $item->id }}</th>
			<td>{{ $item->all_data }}</td>
		</tr>
		@endforeach
	</table>
	<hr>
</body>

</html>