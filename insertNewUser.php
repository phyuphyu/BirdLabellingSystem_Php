
<?php

include("conConfiguration.php");

$firstName = $_SESSION['firstName'];
// echo $firstName;
$lastName = $_SESSION['lastName'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$confirmPassword = $_SESSION['confirmPassword'];
$phone_no = $_SESSION['phone_no'];

$usrEmail = mysqli_real_escape_string ($db,$email);

$sql = "SELECT * FROM users WHERE u_email = '$email'";

$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if($count == 1) {
  echo '<script type="text/javascript">';
  alert("Email has been registered !!!");
  '</script>';
  include("index.php");
} else {

  if ($db->connect_error) {
    die($db->connect_error);
  } else {
    $query = "INSERT INTO users (u_first_name, u_last_name, u_password, u_confirm_password, u_email, u_phone_no,u_type)
    VALUES ('$firstName','$lastName','$password','$confirmPassword','$email','$phone_no', 'D')";
    $db->query($query);
    echo "<h1>Thank you for your signup!</h1>";
    //header("Location: http://birdlabelling.myanmartimeline.net/index.php");
  }
}
?>
