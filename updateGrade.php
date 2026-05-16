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


			$query = "SELECT id, first_name, last_name, street, city, birthday FROM students";

			$response = @mysqli_query($dbc, $query);


			if($response){

			echo '<table id="table">
			

			<tr><th align="left"><b>ID</b></th>
			<th align="left"><b>First Name</b></th>
			<th align="left"><b>Last Name</b></th>
			<th align="left"><b>Street</b></th>
			<th align="left"><b>City</b></th>
			<th align="left"><b>Birth Day</b></th></tr>';


			while($row = mysqli_fetch_array($response)){

				echo '<tr><td align="left">' . 
				$row['id'] . '</td><td align="left">' . 
				$row['first_name'] . '</td><td align="left">' . 
				$row['last_name'] . '</td><td align="left">' .
				$row['street'] . '</td><td align="left">' .
				$row['city'] . '</td><td align="left">' . 
				$row['birthday'] . '</td>';

				echo '</tr>';
			}

				echo '</table>';

			} else {

			echo "Couldn't issue database query<br />";

			echo mysqli_error($dbc);

			}
			
			
			
			
			$query2 = "SELECT id, first_name, last_name, street, city, birthday FROM students";
			$query4 = "SELECT * FROM courses";

			$response2 = @mysqli_query($dbc, $query2);
			$response4 = @mysqli_query($dbc, $query4);
			
			
			$i = 0;
			while($row = mysqli_fetch_array($response2))
			{
				$ids[$i]=$row['id'];
				$i++;
			}
			$total = count($ids);
			
			$x = 0;
			while($row = mysqli_fetch_array($response4))
			{
				$cour[$x]=$row['course'];
				$x++;
			}
			$totalcour = count($cour);

			if($response2 && $response4)
			{
			?>
				<form method="POST" action="">
					Select the Name to Update: <select name="upd">
					<option>Select</option>
			<?php
				for($j=0;$j<$total;$j++)
				{
			?>
			<option>
				<?php 
					echo $ids[$j];
				?>
			</option>
				<?php
					}
				?>
				</select><br />
				Select the course to Update: <select name="cour">
				<option>Select</option>
				<?php
				for($y=0;$y<$totalcour;$y++)
				{
			?>
			<option>
				<?php 
					echo $cour[$y];
				?>
			</option>
				<?php
					}
				?>
				</select>
				<br>
				<label>Enter new grade: <input type="text" name="newGrade"></label>
				<br><br>
			<input name="submit" type="submit" value="Update"/><br><br>
			</form>
					
<?php

if(isset($_POST['submit'])){
	

	$value=$_POST['upd'];
	$value2=$_POST['cour'];	
	$value3=$_POST['newGrade'];	
	
	$query5 = "UPDATE enrolled SET grade='$value3' WHERE id='$value' AND course='$value2'";

	$response5 = @mysqli_query($dbc, $query5);
	if($response5){
		echo "The student's grade was updated";
	}
	else{
		echo "Couldn't update the grade";
	}


} 

}


else {

			echo "Couldn't issue database query<br />";

			echo mysqli_error($dbc);

}

			mysqli_close($dbc);
		?>				
		</div>
		
				
			
			
	</body>
</html>




