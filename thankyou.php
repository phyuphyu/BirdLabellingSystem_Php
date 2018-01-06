<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>
<body>
<br>
<div class="container">
<div class="row">

        

  <?php
  // session_start();
  $myState = "";


  
  
  
 
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h1>Thank you for your submission!</h1>";
    
    $selected_key_label = $_POST['Phyu'];
    $selected_user_confident = $_POST['confident'];
    $selected_b_state = $_POST['b_state'];
    // echo $selected_key_label;
    $soundName=$_SESSION["soundName"];
    // echo $soundName;  
    

    if($selected_b_state=="Other"){
      $myState = isset($_POST['other_state']) ? $_POST['other_state'] : '';

    //$myState=$_POST['other_state'];
    }   
    else{
    $myState = $_POST['b_state'];
    }
    $userChoice=$soundName.",".$selected_key_label.",".$selected_user_confident.",".$myState;

  
    // $txt = $userChoice."\n";
    // fwrite($myfile, $txt);
    // fclose($myfile);


    
    //$file = "newfile.txt";
    // Open the file to get existing content
    //$current = file_get_contents($file)."\n";
    //$myFile=fopen("newfile.txt", "x")
    $current= file_get_contents("newfile.txt");
    // Append a new person to the file
    $current .= $userChoice."\n";
    //$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    // Write the contents back to the file
    file_put_contents("newfile.txt", $current);
    //fclose($myFile);
    //
   // $_SESSION['soundName']=$soundName;

   
   include("conConfiguration.php");
    
   $sql = "INSERT INTO votes (v_sound_name, v_label_name, v_confident, v_state)
   VALUES ('$soundName','$selected_key_label','$selected_user_confident', '$myState')";
   $result = $db->query($sql);
 
   sleep(5);

// include("index.php");

   
  //  echo "New vote is listed successfully";
  
 echo "</div>";
//  echo "<div class='row'>";

// echo "<a href='logout.php' class='btn btn-info btn-lg'>";
//         echo " <span class='glyphicon glyphicon-log-out'></span> Log out";
//        echo "</a>";
      
//        echo "</div>";
      echo " </div>";
    
  }



  else{
    header("Location: http://birdlabelling.myanmartimeline.net/login.php");
  }
  ?>
 


        
</body>
</html>
