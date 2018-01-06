<?php
include("conConfiguration.php");
$userEmail='';

echo "\n";
$errorsFlag = "N";

if (empty ($_POST ["firstname"]) || $_POST["firstname"] == ""){
  echo "Please entera a first name";
  $errorsFlag="Y";
}else {
  $fstName =$_POST["firstname"];
  //echo "the current user email is " .$usrEmail;
}

if (empty ($_POST ["lastname"]) || $_POST["lastname"] == ""){
  echo "Please entera a last name";
  $errorsFlag="Y";
}else {
  $lstName =$_POST["lastname"];
}


if (empty ($_POST ["email"]) || $_POST["email"] == ""){
  $userEmail=$_POST["email"];
  echo "Please entera an email";
  $errorsFlag="Y";
}else {
  $sql="SELECT u_email
  FROM users
  WHERE u_email='$userEmail'";
     
     $result = $db->query($sql);
     if ($result!='') {
       echo "The email is already registered. Please logini with the email";
   include ("index.php");
   exit;
  }
  else{
   $singUpemail =$_POST["email"];
 }

  }

if (empty ($_POST ["password"]) || $_POST["password"] == ""){
  echo "Please entera password";
  $errorsFlag="Y";
}else {
  $signUpPassword =$_POST["password"];
}


if (empty ($_POST ["confirm_password"]) || $_POST["confirm_password"] == ""){
  echo "Please entera confirm_password";
  $errorsFlag="Y";
}else {
  $signUpConfirmPassword =$_POST["confirm_password"];
  if ($signUpPassword != $signUpConfirmPassword){
    echo("Oops! Password did not match! Try again.");
    $errorsFlag="Y";
    include ("signUp.php");
  }
}

// if (empty ($_POST ['phone_no']) || $_POST['phone_no'] == ""){
//   $phone_no =$_POST['phone_no'];
//   //$errorsFlag="Y";
// }else {

//   $phone_no =$_POST['phone_no'];
// }
if ( $errorsFlag == "N"){
  $_SESSION['firstName'] = $fstName;
  $_SESSION['lastName'] = $lstName;
  $_SESSION['email'] = $singUpemail;
  $_SESSION['password'] = $signUpPassword;
  $_SESSION['confirmPassword'] = $signUpConfirmPassword;
  $_SESSION['phone_no'] = $_POST ['phone_no'];
  //$_SESSION['gender'] = $gender;
  include("insertNewUser.php");

}
else{
}
?>
</body>
</html>
