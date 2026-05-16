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
			
			
			$query2 = "SELECT course FROM courses";

			$response2 = @mysqli_query($dbc, $query2);
			
			$i = 0;
			while($row = mysqli_fetch_array($response2))
			{
				$course[$i]=$row['course'];
				$i++;
			}
			$total = count($course);

			if($response2)
			{
			?>
				<form method="POST" action="">
					Select A Course: <select name="upd">
					<option>Select</option>
			<?php
				for($j=0;$j<$total;$j++)
				{
			?>
			<option>
				<?php 
					echo $course[$j];
				?>
			</option>
				<?php
					}
				?>
				</select><br />
				<br><br>
		<input name="submit" type="submit" value="Show"/><br><br>
			</form>
			
		<?php

if(isset($_POST['submit'])){

	$value=$_POST['upd'];	
	
	
	$query3 = "SELECT id, first_name, last_name, course, grade FROM enrolled WHERE course='$value' ORDER BY grade DESC LIMIT 3";
	$query4 = "SELECT id, first_name, last_name, course, grade FROM enrolled WHERE course='$value' ORDER BY grade ASC LIMIT 3";
	
	
	$response3 = @mysqli_query($dbc, $query3);
	$response4 = @mysqli_query($dbc, $query4);
if($response3){
	echo '<br><br>';
	echo '<h2>Best</h2><br>';
	
	echo '<table id="table">
			

			<tr><th align="left"><b>ID</b></th>
			<th align="left"><b>First Name</b></th>
			<th align="left"><b>Last Name</b></th>
			<th align="left"><b>Course</b></th>
			<th align="left"><b>Grade</b></th></tr>';

			while($row = mysqli_fetch_array($response3)){

				echo '<tr><td align="left">' . 
				$row['id'] . '</td><td align="left">' . 
				$row['first_name'] . '</td><td align="left">' . 
				$row['last_name'] . '</td><td align="left">' .
				$row['course'] . '</td><td align="left">' .
				$row['grade'] . '</td><td align="left">' . '</td>';
				
				echo '</tr>';
			}

				echo '</table>';
}
else{
	echo "Couldn't update the course";
}

if($response4){
	echo '<br><br>';
	echo '<h2>Worst</h2><br>';
	
	echo '<table id="table">
			

			<tr><th align="left"><b>ID</b></th>
			<th align="left"><b>First Name</b></th>
			<th align="left"><b>Last Name</b></th>
			<th align="left"><b>Course</b></th>
			<th align="left"><b>Grade</b></th></tr>';

			while($row = mysqli_fetch_array($response4)){

				echo '<tr><td align="left">' . 
				$row['id'] . '</td><td align="left">' . 
				$row['first_name'] . '</td><td align="left">' . 
				$row['last_name'] . '</td><td align="left">' .
				$row['course'] . '</td><td align="left">' .
				$row['grade'] . '</td><td align="left">' . '</td>';
				
				echo '</tr>';
			}

				echo '</table><br><br>';
}
else{
	echo "Couldn't update the course";
}


}


			} else {

			echo "Couldn't issue database query<br />";

			echo mysqli_error($dbc);

			}

			mysqli_close($dbc);
		?>				
		</div>
	
	</body>
</html>




