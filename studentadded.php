<?php require_once 'check_auth.php'; ?>
<html>
<head>
<title>Student Added</title>
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

if(isset($_POST['submit'])){
    
    $data_missing = array();
	if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'ID';

    } else {

        // Trim white space from the name and store the name
        $id = $_POST['id'];

    }
    
    if(empty($_POST['first_name'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = $_POST['first_name'];

    }

    if(empty($_POST['last_name'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else{

        // Trim white space from the name and store the name
        $l_name = $_POST['last_name'];

    }

    if(empty($_POST['street'])){

        // Adds name to array
        $data_missing[] = 'Street';

    } else {

        // Trim white space from the name and store the name
        $street = $_POST['street'];

    }

    if(empty($_POST['city'])){

        // Adds name to array
        $data_missing[] = 'City';

    } else {

        // Trim white space from the name and store the name
        $city = $_POST['city'];

    }


    if(empty($_POST['birthday'])){

        // Adds name to array
        $data_missing[] = 'birthday';

    } else {

        // Trim white space from the name and store the name
        $b_date = $_POST['birthday'];

    }

    
    if(empty($data_missing)){
        
        require_once('connect.php');
        
        $query = "INSERT INTO students (id, first_name, last_name,
        street, city, birthday) VALUES (?, ?, ?,
        ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        
        mysqli_stmt_bind_param($stmt, "isssss", $id, $f_name, $l_name, $street, $city, $b_date);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo '<h2>Student Entered</h2><br>';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo '<h2>Error Occurred</h2><br>';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo '<h2>You need to enter the following data</h2><br><br>';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>


</div>

</body>
</html>