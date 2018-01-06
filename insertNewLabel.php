<?php
$errorsFlag = "N";
if (empty ($_POST["new_label"]) || $_POST["new_label"] == ""){
	echo "Please enter your new label";
	$errorsFlag="Y";
}else {
	$newLabel =$_POST["new_label"];
}

if ( $errorsFlag == "N"){
require ("conConfiguration.php");
$sql = "INSERT INTO labels (l_name, l_status)
VALUES ('$newLabel','D');";
$result = $db->query($sql);
echo "<h1>New label is added successfully</h1>";
}

?>
