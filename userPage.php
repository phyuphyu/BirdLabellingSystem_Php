<?php session_start(); ?>
<DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bird Labelling</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/myScrollView.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/myStyle.css">
  <link rel="stylesheet" type="text/css" href="myStyle.css">

</head>
<body>
<?php
//  session_start();
 if($_SESSION["yesUser"]=="Y"){ 
require ('conConfiguration.php');
$id = $_GET['id'];

  if ($db->connect_error) {
    die($db->connect_error);
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
  } else {
    $query = "SELECT * FROM sounds WHERE s_id=$id";
    $result=$db->query($query);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $mytargetFile= $row["s_path"];
      }
    }
    }
    //$mydir1='http://localhost/birdLabelling.myanmartimeline.net';
    $mydir1='http://birdlabelling.myanmartimeline.net';
    $test=$mydir1.'/'.$mytargetFile;
?>
<br>
<!-- <div class="jumbotron text-center">
  <h1>We need your opinions for this sound!</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div> -->



<div class="container">


<div class="row">

    <form class="form-inline" action="thankyou.php" method="post" name="selectlbl">
      <h3>Which bird makes this sound?</h3>
</div>
      <br>
     
<div class="row">
      <audio controls>
        <source src='<?php echo $test ?>' type="audio/mpeg">
        </audio>
      
          <?php
          
        $soundName=basename($mytargetFile); 
        $soundInfo = pathinfo($soundName);
        $mySoundName = $soundInfo['filename'];
        $_SESSION["soundName"] = $mySoundName;
        ?>
</div>
        <br>



<div class="row">
          <p class="myCellSpace">How confident you are: </p>
        <select name="confident" value="">
        <option disabled selected value> -- select an option -- </option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
       </select>
</div>
       <br>


<div class="row">
       <p class="myCellSpace">The state of the bird: </p>
        <select name="b_state" value=""  class="myCellSpace2">
        <option disabled selected value> -- select an option -- </option>
            <option value="Normal">Normal</option>
            <option value="Stressed">Stressed</option>
            <option value="Flying">Flying</option>
            <option value="Eating">Eating</option>
            <option value="Courting">Courting</option>
            <option value="Other">Other</option>    
  </select>
       <input type="text" name="other_state" value=""  placeholder="(For Other)"  /> 
</div>
       <br>



<div class="row">
       <p class="myCellSpace">The name of the bird: </p>
        <?php        
          include ("getLabelsData.php");
          ?>

</div>

<br>
          <input type="submit" class='btn btn-success' value="Submit">
      
        </form>
  </div>


      <br><br>
      <hr>
      <br>


      <div class="container">
      <div class="row">
      <h3>Want to submit your own label?</h3>
      </div>
      <br>
      <div class="row">
      
      <form class="form-inline" action="insertNewLabel.php" method="post" name="newLabel">
        <!-- <div class="form-group"> -->
          <input type="text" class="form-control myCellSpace2" id="new_label" name="new_label" placeholder="New Bird">
        <!-- </div> -->
        
        <input type="submit" class='btn btn-success ' name="newLabel" value="Submit" />
      </form>
      </div>
      
      </div>
    <!-- </div> -->
    <!-- </div> -->
    <?php
}  

else{
  
  //header("Location: http://localhost/birdlabelling.myanmartimeline.net/index.php");
  header("Location: http://birdlabelling.myanmartimeline.net/index.php");
  
}
?>
  </body>
  </html>
