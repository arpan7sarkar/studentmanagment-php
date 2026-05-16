<?php
require_once('connect.php');
$query = "SELECT * FROM students WHERE id = 101";
$result = mysqli_query($dbc, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
} else {
    echo "Error: " . mysqli_error($dbc);
}
mysqli_close($dbc);
?>
