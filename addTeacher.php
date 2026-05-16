<?php require_once 'check_auth.php'; ?>
<html>
<head>
<title>Add Teacher</title>
<link rel="stylesheet" type="text/css" href="style.php"/>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</head>
<body>
	<?php include 'menu.php'; ?>
	<div id="wrapper">
		<form action="teacheradded.php" method="post">
			<br>
			<h2>Add a New Teacher</h2>
			<br><br>
			<p>ID:
			<input type="text" name="id" size="30" value="" />
			</p>
			<br>
			<p>First Name:
			<input type="text" name="first_name" size="30" value="" />
			</p>
			<br>
			<p>Last Name:
			<input type="text" name="last_name" size="30" value="" />
			</p>
			<br>
			<p>Street:
			<input type="text" name="street" size="30" value="" />
			</p>
			<br>
			<p>City:
			<input type="text" name="city" size="30" value="" />
			</p>
			<br>
			<p>
			<input type="submit" name="submit" value="Send" />
			</p>
			
		</form>
	</div>
</body>
</html>