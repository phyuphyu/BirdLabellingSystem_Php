<?php 
   


   //echo "Hi";
   $myState='';
   $userChoice='';
   $getLabelName='';

//if($_POST['uConfident'] && $_POST['sName'] ){
if($_POST['uConfident'] ){
//if($_POST['txtNewLabel'] && $_POST['txtNewLabel'] && $_POST['txtNewLabel'] ){
  $uConfident=$_POST['uConfident'];
  $bState=$_POST['bState'];  
  $sName=$_POST['sName'];
  $uId=$_POST['uId'];
  $sid=$_POST['sid'];
  $lId=$_POST['lId'];

  //echo $sid;
 // echo $lId;
  //echo $uId;

 

  if ($bState=="Other"){
    if ($_POST['otherState']!=''){
      $myState=$_POST['otherState'];
    }else{
      echo "You chose Other for the state of the bird. Please type what the bird state could be.";
    }
  }else{
    $myState=$bState;
  }

   addVote($sid, $lId, $uConfident, $myState, $uId);
   writeVoteResult($sName, $lId, $uConfident, $myState);
  }
else {
  echo "No text input";
}


function addVote($sid, $lId, $uConfident, $myState,$uId){  
  require ('conConfiguration.php');
     if ($db->connect_error) {
    die($db->connect_error);
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
  } else {
  
  $sql = "INSERT INTO votes (v_sId, v_lId, v_confident, v_state, v_uid)
   VALUES ('$sid','$lId','$uConfident', '$myState', '$uId')";
   $result = $db->query($sql);
echo"<br>";
echo"<h1 align='center'>Your vote is added successfully!</h1>";
echo "<script type=\"text/javascript\">
alert('You have voted for this sound!');
$.ajax({
  success: function (response) {
    location.replace('http://birdlabelling.myanmartimeline.net');               
}


});
</script>";	

  }
}

function writeVoteResult($sName, $lId, $uConfident, $myState){ 
  require ('conConfiguration.php');
  $query="SELECT * FROM labels WHERE l_id='$lId';";
    $result = $db->query($query);
	 if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $getLabelName= $row["l_name"];
   }else{
     echo"Label is not in the database";
  }
   


  $userChoice=$sName.",".$getLabelName.",".$uConfident.",".$myState."\n";
  if (!file_exists("userVotes.txt")) {
    $file = fopen("userVotes.txt","w");    
    echo fwrite($file,$userChoice);
    fclose($file); 
}
else{
  $userChoice=$sName.",".$getLabelName.",".$uConfident.",".$myState;
  $current= file_get_contents("userVotes.txt");
      $current .= $userChoice."\n";
      file_put_contents("userVotes.txt", $current);
      fclose("userVotes.txt"); 
}
}

  // $userChoice=$sName.",".$bName.",".$uConfident.",".$myState;
  
  //     $current= file_get_contents("http://birdlabelling.myanmartimeline.net/newfile.txt");
  //     $current .= $userChoice."\n";
  //     file_put_contents("http://birdlabelling.myanmartimeline.net/newfile.txt", $current);
  // }

  ?>