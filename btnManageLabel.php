<?php
if($_GET['id'] && $_GET['customerId']){
    $id=$_GET['id'];
    $lId=$_GET['customerId'];
    if($id=='approve'){
        approveLabel($lId);
    }
    if($id=='remove'){
        removeLabel($lId);
    }
}
else {
    warning('unable to get information');
}

function approveLabel($lId){    
    $sql="UPDATE labels
    SET l_status = 'Y'
    WHERE l_id = '$lId';";
    require ("conConfiguration.php");
    $result = $db->query($sql);
}

function removeLabel($lId){
    $sql="DELETE FROM labels
          WHERE l_id = '$lId';";
    require ("conConfiguration.php");
    $result = $db->query($sql);
}
?>