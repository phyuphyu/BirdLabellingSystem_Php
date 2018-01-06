<?php

/* opens a connection to the FAM service daemon */
$fam_res = fam_open ();

/* The second argument is the full pathname of the directory to monitor. */
$nres = fam_monitor_directory ( $fam_res, 'sounds');

while( fam_pending ( $fam_res ) ) {
    $arr = (fam_next_event($fam_res)) ;
    if ($arr['code']) == FAMCreated ) {
        /* deal here with the new file, which name now is stored in $arr['filename'] */
    }  
}

fam_close($fam_res);

?>