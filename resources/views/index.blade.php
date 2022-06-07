<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>exemple</title>
</head>
<body>
	<h1>titre</h1>
	<form method="POST" action="{{route('add_admin') }}">
		@csrf
		<input type="text" name="exemple">
		<input type="submit"  value="enregistrer">
	</form>
	<?php  
	use Illuminate\Http\Request;
//var_dump(Request::capture());

	?>

</body>
</html>