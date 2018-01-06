<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
</head>
<body> 
<?php
$myAdmin="";
$myAdmin=$_SESSION["yesAdmin"];
// session_start();

if($myAdmin=="Y"){
  ?>


<br>
<div class="container">
  <h3>Select A Sound</h3>
  <form action="checkVotes.php" method="post">
  <?php 
  include("conConfiguration.php");
  $sql = "SELECT v_sound_name
  FROM votes
  GROUP BY v_sound_name;";
  $result = mysqli_query($db,$sql);
  if (mysqli_num_rows($result) > 0) {
    echo '<select name="sounds" value="">';
    echo '<option disabled selected value> -- select an option -- </option>';
    while($row = mysqli_fetch_assoc($result)) {
      echo '<option value="'.$row['v_sound_name'].'">'.$row['v_sound_name'].'</option>';
    }
    echo '</select>';  
  } else {
    echo "0 results";
  } 

  ?>  
  <input type="submit" class='btn btn-success' name="View" value="View" />
  </form>

</div>

<br>

<div class="container">

  <form action="uploadSound.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <h3>Upload your sound file</h3>
      <div class="clearfix"></div>
      <label class="custom-file">
<input type="file" id="file" class="custom-file-input" name="soundToUpload">
<span class="custom-file-control"></span>
</label>
    </div>

    <div class="row">
      <div class="col-xs-6 col-md-6">
        <input type="text" name="s_time" value="" class="form-control input-lg" placeholder="Time Recorded" /></div>
      <div class="col-xs-6 col-md-6">
        <input type="text" name="s_location" value="" class="form-control input-lg" placeholder="Where the sound is recorded?" /> </div>
      <!-- <div class="col-xs-6 col-md-6">
        <input type="text" name="s_environment" value="" class="form-control input-lg" placeholder="mountain or forest or bush" /></div> -->
    </div>
    <div class="row"><br></div>
    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Upload</button>
  </form>

</div>
<br>

<?php
        include ("manageLabels.php");
        include ("manageUser.php");      

}
else{
  
  //header("Location: http://localhost/birdlabelling.myanmartimeline.net/index.php");
  header("Location: http://birdlabelling.myanmartimeline.net/index.php");
  
}
?>



  </body>
</html>
