<?php require_once 'check_auth.php'; ?>
<html>
	<head>
		<title>Students</title>	
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
			<?php

			require_once('connect.php');


			$query = "SELECT code, course, semester, year FROM courses";

			$response = @mysqli_query($dbc, $query);


			if($response){

			echo '<table id="table">

			<tr><th align="left"><b>Code</b></th>
			<th align="left"><b>Course</b></th>
			<th align="left"><b>Semester</b></th>
			<th align="left"><b>Year</b></th></tr>';
			
			
			
			while($row = mysqli_fetch_array($response)){

				echo '<tr><td align="left">' . 
				$row['code'] . '</td><td align="left">' . 
				$row['course'] . '</td><td align="left">' . 
				$row['semester'] . '</td><td align="left">' .
				$row['year'] . '</td>';

				echo '</tr>';
			}

				echo '</table>';

			} else {

			echo "Couldn't issue database query<br />";

			echo mysqli_error($dbc);

			}

			mysqli_close($dbc);
		?>		
		</div>
	
	</body>
</html>




