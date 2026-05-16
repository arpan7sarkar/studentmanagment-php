<?php require_once 'check_auth.php'; ?>
<!DOCTYPE html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="style.php">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <style>
       .dashboard-table-container { overflow-x: auto; margin-top: 20px; }
       .dashboard-action { display: inline-block; padding: 12px 24px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; text-decoration: none; border-radius: 12px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 8px 15px rgba(16, 185, 129, 0.2); margin-top: 15px; }
       .dashboard-action:hover { transform: translateY(-3px); box-shadow: 0 12px 25px rgba(16, 185, 129, 0.4); }
       #wrapper p { text-align: center; }
   </style>
</head>
<body>
   <?php include 'menu.php'; ?>
   <section>
      <?php if ($role === 'admin'): ?>
          <div class="hit-the-floor">Admin <br> Dashboard</div>
          <div id="wrapper">
              <h2>Welcome, Administrator</h2>
              <p>You have full access to manage the entire Student Database.</p>
              <br>
              <p>Use the navigation menu above to add, update, or delete students, teachers, courses, and grades.</p>
          </div>
      <?php elseif ($role === 'student'): ?>
          <div class="hit-the-floor">Student <br> Dashboard</div>
          <div id="wrapper">
              <h2>My Grades</h2>
              <div class="dashboard-table-container">
                  <?php
                  require_once('connect.php');
                  $query = "SELECT first_name, last_name, course, grade FROM enrolled";
                  $response = @mysqli_query($dbc, $query);
                  if($response && mysqli_num_rows($response) > 0){
                      echo '<table><tr><th align="left">Student Name</th><th align="left">Course</th><th align="left">Grade</th></tr>';
                      while($row = mysqli_fetch_array($response)){
                          echo '<tr><td align="left">'.$row['first_name'].' '.$row['last_name'].'</td><td align="left">'.$row['course'].'</td><td align="left"><span style="color:#10b981; font-weight:600;">'.$row['grade'].'</span></td></tr>';
                      }
                      echo '</table>';
                  } else {
                      echo "<p>No grades found.</p>";
                  }
                  ?>
              </div>
              <br><br>
              <h2>My Teachers</h2>
              <div class="dashboard-table-container">
                  <?php
                  $query2 = "SELECT first_name, last_name, street, city FROM teachers";
                  $response2 = @mysqli_query($dbc, $query2);
                  if($response2 && mysqli_num_rows($response2) > 0){
                      echo '<table><tr><th align="left">Teacher Name</th><th align="left">Contact / City</th></tr>';
                      while($row = mysqli_fetch_array($response2)){
                          echo '<tr><td align="left">Prof. '.$row['first_name'].' '.$row['last_name'].'</td><td align="left">'.$row['city'].'</td></tr>';
                      }
                      echo '</table>';
                  } else {
                      echo "<p>No teachers found.</p>";
                  }
                  mysqli_close($dbc);
                  ?>
              </div>
          </div>
      <?php elseif ($role === 'teacher'): ?>
          <div class="hit-the-floor">Teacher <br> Dashboard</div>
          <div id="wrapper">
              <h2>My Subjects & Enrolled Students</h2>
              <div class="dashboard-table-container">
                  <?php
                  require_once('connect.php');
                  $query = "SELECT course, first_name, last_name, grade FROM enrolled";
                  $response = @mysqli_query($dbc, $query);
                  if($response && mysqli_num_rows($response) > 0){
                      echo '<table><tr><th align="left">Course</th><th align="left">Student Name</th><th align="left">Current Grade</th></tr>';
                      while($row = mysqli_fetch_array($response)){
                          echo '<tr><td align="left">'.$row['course'].'</td><td align="left">'.$row['first_name'].' '.$row['last_name'].'</td><td align="left">'.$row['grade'].'</td></tr>';
                      }
                      echo '</table>';
                  } else {
                      echo "<p>No enrolled students found.</p>";
                  }
                  mysqli_close($dbc);
                  ?>
              </div>
              <br><br>
              <a href="addGrade.php" class="dashboard-action">Add Grades for Students</a>
          </div>
      <?php endif; ?>
   </section>
</body>
</html>