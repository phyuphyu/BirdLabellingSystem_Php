<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="row"> </div>

<br>
<?php
require ("conConfiguration.php");
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['View']))
{
          
        $selected_sound = $_POST['sounds'];

  $sql="SELECT v_sound_name, v_label_name, COUNT(v_id) As v_total
FROM votes
WHERE v_sound_name='$selected_sound'
GROUP BY v_label_name
ORDER BY v_sound_name;";
 
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    
              echo "<table class='table table-hover'>";
              echo "<thead class='thead-dark'>";
              echo "<tr>";
              echo "<th>Sound Track</th>";
              echo "<th>Bird Name</th>";
              echo "<th>Total Votes</th>";
              echo "<th></th>";
              echo "</tr>";
              echo "</thead>";
              while($row = $result->fetch_assoc()) {
    
                $soundName= $row["v_sound_name"];
                $labelName=$row["v_label_name"];
                $total=$row["v_total"];
                echo "<tbody>";
                echo "<tr>";
                echo "<td> $soundName</td>";
                echo "<td> $labelName</td>";
                echo "<td> $total</td>";
                echo "<td>";
               
    
                echo "</td>";
                echo "</tr>";
                echo "</tbody>";
              }
              echo "</table>";
            } else {
              $db->close();
            }

        }

?>

</div>

    
</body>
</html>


