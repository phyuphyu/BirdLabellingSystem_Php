<?php
if($_GET['id'] && $_GET['uId']){
    $id=$_GET['id'];
    $uId=$_GET['uId'];
    if($id=='approve'){
        //warning('thank you');
        approveUser($uId);
    }
    if($id=='remove'){
        removeUser($uId);
    }
}
else {
    warning('unable to get information');
}

function approveUser($uId){
    
    $sql="UPDATE users
    SET u_type = 'Y'
    WHERE u_id = '$uId';";
   // warning('deleting');
    require ("conConfiguration.php");
     $result = $db->query($sql);
}

function removeUser($uId){
    $sql="DELETE FROM users
    WHERE u_id = '$uId';";
   require ("conConfiguration.php");
    $result = $db->query($sql);
} ?>