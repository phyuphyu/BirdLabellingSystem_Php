<?php
$target_link = "http://birdlabelling.myanmartimeline.net/";
//$target_link = "http://localhost/birdlabelling.myanmartimeline.net/";
$target_dir = "sounds/";
$target_file = $target_dir . basename($_FILES["soundToUpload"]["name"]);
$uploadOk = 1;
$info = new finfo(FILEINFO_MIME);
$type = pathinfo($target_file,PATHINFO_EXTENSION);

if($type != "mp3" && $type != "mp4") {
  echo "Sorry, onlymp3 and mp4 files are allowed.";
  $uploadOk = 0;
}
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($_FILES["soundToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["soundToUpload"]["tmp_name"], $target_file)) {
    $fileName = $_FILES["soundToUpload"]["name"];

    echo $fileName;

    echo "The file ". basename( $_FILES["soundToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
<?php
include("conConfiguration.php");
$s_time = $_POST['s_time'];
echo $s_time;
$s_location = $_POST['s_location'];
$s_environment = $_POST['s_environment'];
if ($db->connect_error) {
  die($db->connect_error);
  echo "Error: " . $sql . "<br>" . mysqli_error($db);
} else {
  $query = "INSERT INTO sounds (s_name, s_time, s_location, s_environment, s_path)
  VALUES ('$fileName','$s_time','$s_location','$s_environment', 'sounds/$fileName')";
  $db->query($query);
  $last_id = mysqli_insert_id($db);
  echo "New record created successfully. Last inserted ID is: " . $last_id;
  $_SESSION["soundId"] = $last_id;
  $_SESSION["myEmailContent"] = $target_link.$target_file;
  $_SESSION["target_file"] = $target_file;
  include 'sendEmail.php';
}

?>
