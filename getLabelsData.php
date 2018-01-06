<?php
echo'<br>';
require ("conConfiguration.php");
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT * FROM labels where l_status='Y' ";
$result = mysqli_query($db,$sql);
if (mysqli_num_rows($result) > 0) {
  
  echo '<select name="Phyu" value="" class="myCellSpace">';
  echo '<option disabled selected value> -- select an option -- </option>';
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row['l_name'].'">'.$row['l_name'].'</option>';
  }
  echo '</select>';
  echo '<br>';
} else {
  echo "0 results";
}
mysqli_close($db);
?>
