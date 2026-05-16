<?php require_once 'check_auth.php'; ?>
<html>
	<head>
		<title>Update Teacher</title>	
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


			$query = "SELECT id, first_name, last_name, street, city FROM teachers";

			$response = @mysqli_query($dbc, $query);
			
			if($response){

			echo '<table id="table">
			

			<tr><th align="left"><b>ID</b></th>
			<th align="left"><b>First Name</b></th>
			<th align="left"><b>Last Name</b></th>
			<th align="left"><b>Street</b></th>
			<th align="left"><b>City</b></th></tr>';

			while($row = mysqli_fetch_array($response)){

				echo '<tr><td align="left">' . 
				$row['id'] . '</td><td align="left">' . 
				$row['first_name'] . '</td><td align="left">' . 
				$row['last_name'] . '</td><td align="left">' .
				$row['street'] . '</td><td align="left">' .
				$row['city'] . '</td>';

				echo '</tr>';
			}

				echo '</table>';

			} else {

			echo "Couldn't issue database query<br />";

			echo mysqli_error($dbc);

			}
			
			
			
			
			$query = "SELECT id, first_name, last_name, street, city FROM teachers";

			$response = @mysqli_query($dbc, $query);
			
			$i = 0;
			while($row = mysqli_fetch_array($response))
			{
				$ids[$i]=$row['id'];
				$i++;
			}
			$total = count($ids);

			if($response)
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
				<br><br>
ID: <input name="id" type="text" /><br><br>
First Name: <input name="first" type="text" /><br><br>
Last Name: <input name="last" type="text" /><br><br>
Street: <input name="street" type="text" /><br><br>
City: <input name="city" type="text" /><br><br>
<input name="submit" type="submit" value="Update"/><br><br>


</form>


<?php

if(isset($_POST['submit'])){

	$value=$_POST['upd'];		
	$id=$_POST['id'];
	$first=$_POST['first'];
	$last=$_POST['last'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	

	$query2 = "UPDATE teachers SET id='$id',first_name='$first',last_name='$last', street='$street', city='$city' WHERE id='$value'";
	$response2 = @mysqli_query($dbc, $query2);
if($response2){
	echo "Successfully Updated!";
}
else{
	echo "Couldn't update the teacher";
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
