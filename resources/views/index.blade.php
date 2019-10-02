<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Taskmaster</title>

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<style>
		#footer {
			background-color: red;
			color: gray;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container" id="app">
		<h1>Hello, World! Welcome to Taskmaster</h1>
		<task-list></task-list>

		<footer>
			<div id="footer">
				Taskmaster &copy; 2019
			</div>
		</footer>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>