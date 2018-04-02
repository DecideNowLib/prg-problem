<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Post-redirect-get problem</title>
	</head>
	<body>
		@yield('content')
	</body>
</html>
