<?php require_once 'check_auth.php'; ?>
<html>
<head>
<title>Add Course</title>
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
		<form action="courseadded.php" method="post">
			<br>
			<h2>Add a New Course</h2>
			<br><br>
			<p>Code:
			<input type="text" name="code" size="30" value="" />
			</p>
			<br>
			<p>Course Name:
			<input type="text" name="course" size="30" value="" />
			</p>
			<br>
			<p>Semester:
			<input type="text" name="semester" size="30" value="" />
			</p>
			<br>
			<p>Year:
			<input type="text" name="year" size="30" value="" />
			</p>
			<br>
			<p>
			<input type="submit" name="submit" value="Send" />
			</p>
		</form>
	</div>
</body>
</html>