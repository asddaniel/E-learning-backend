<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>exemple</title>
</head>
<body>
	<h1>titre</h1>
	<form action="{{route('traitement') }}">
		@csrf
		<input type="text" name="exemple">
		<input type="submit"  value="enregistrer">
	</form>

</body>
</html>