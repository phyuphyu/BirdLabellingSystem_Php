<?php
require_once ('vendor/autoload.php');
require ('conConfiguration.php');
$target_dir="http://birdlabelling.myanmartimeline.net/login.php?id=";
//$target_dir="http://localhost/birdLabelling.myanmartimeline.net/login.php?id=";
$myEmailContent=$_SESSION["myEmailContent"];

$soundId=$_SESSION["soundId"];

echo "link for email content is " . $_SESSION["myEmailContent"] . ".";
echo "SOUND ID IS " . $soundId. ".";
echo $soundId;

$myUrl=$target_dir.$soundId;

$cc = array();

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM users WHERE u_type='Y'";

$result = mysqli_query($db,$sql);

if (mysqli_num_rows($result) > 0) {
  while($emails = mysqli_fetch_assoc($result)) {
    $cc[] = $emails['u_email'];
  }
} else {
  echo "0 results";
}

$subject = "We need your opinions for this sound!";
$to = new SendGrid\Email("Phyu", "blazedmine@gmail.com");
$msg =$myUrl;
$FRONT_END_URL= 'http://localhost/birdLabelling/sounds/two_moreporks08.mp3';
sendEmail($subject, $to, $msg, $cc);

function sendEmail($subject, $to, $message, $cc) {
  $from = new SendGrid\Email(null, "phykya94@student.wintec.ac.nz");
  $content = new SendGrid\Content("text/html", $message);
  $mail = new SendGrid\Mail($from, $subject, $to, $content);

  foreach ($cc as $value) {
    $to = new SendGrid\Email(null, $value);
    $mail->personalization[0]->addCC($to);
  }
  $apiKey = '';
  $sg = new \SendGrid($apiKey);

  $response = $sg->client->mail()->send()->post($mail);
  echo $response->statusCode();

  echo json_encode($mail, JSON_PRETTY_PRINT), "\n";
}

$_SESSION["mySoundId"] = $soundId;
?>
