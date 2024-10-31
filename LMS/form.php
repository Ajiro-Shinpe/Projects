
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">

		<form method="post" action="insert.php">
			
			Title<br>
			<input type="text" name="Title">
			<br>
			Auther<br>
			<input type="text" name="Author">
			<br>
			genre<br>
			<input type="text" name="genre">
			<br>
			
			<br>
			Publish Year<br>
			<input type="text" name="publish_year">
			<br>
			Copies Available<br>
			<input type="text" name="copies_ava">
			<br>
			
			<input type="submit" name="save" value="submit">
		</form>
	</div>
</body>
</html>