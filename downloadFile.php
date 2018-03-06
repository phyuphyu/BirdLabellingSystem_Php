<?php
$name= $_GET['userVotes'];

downloadFile($name);
cleanFile($name);

  


function downloadFile($name){
  header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($name));
    ob_clean();
    flush();
    readfile("http://birdlabelling.myanmartimeline.net/".$name); //showing the path to the server where the file is to be download
    exit;
}


function cleanFile($name){
    file_put_contents("http://birdlabelling.myanmartimeline.net/newfile.txt", "");
   
    // //open file to write
    // $fp = fopen("http://localhost/birdLabelling.myanmartimeline.net/".$name,'w+');
    // echo file_put_contents("http://localhost/birdLabelling.myanmartimeline.net/".$name,"");
    // fclose($fp);

  }
?>