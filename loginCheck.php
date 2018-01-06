<?php session_start(); ?>
<?php
$soundId="";

$errorsFlag = "N";
if (empty ($_POST ["email"]) || $_POST["email"] == ""){
	echo "Please enter an email";
	$errorsFlag="Y";
}else {
	$usrEmail =$_POST["email"];
}

if (empty ($_POST ["mypw"]) || $_POST["mypw"] == ""){
	echo "\n Please enter a password";
	$errorsFlag="Y";
}else {
	$userPassword =$_POST["mypw"];
}

if ( $errorsFlag == "N"){

	require ("conConfiguration.php");
	$sql="SELECT * FROM users WHERE u_email='$usrEmail' and u_password='$userPassword'";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

		$ckUserType= $row["u_type"];
		if ($ckUserType=="AD"){	
			$_SESSION["yesAdmin"]="Y";
			header("Location: adminPage.php");
		}
		else if ($ckUserType=="Y"){		
			//$target_dir="http://localhost/birdLabelling.myanmartimeline.net/userPage.php?id=";
			$target_dir="http://birdLabelling.myanmartimeline.net/userPage.php?id=";
			// $soundId=$_SESSION["soundId"];
			// echo "soundId";
			$soundId=$_SESSION["soundId"];
			$_SESSION["yesUser"]="Y";
			 $myUrl=$target_dir.$soundId;
			 header("Location: $myUrl");
		}
		else{
			echo"You are not yet approved by an admin";	
		}
	}
	else{
		echo "Email and passwordd do not matched!";
	}
}
else {
	include ("index.php");
}
?>
