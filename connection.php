<?php
//FILE FOR CONNECTION DIR

//name dir
$mydir = 'progetti';

//check if dir exist
if (!file_exists($mydir)) {
    echo "The directory $mydir don't exist";
    exit;
} else {
    //get name and extension of dir
    $myfiles = array_diff(scandir($mydir), array('.', '..'));
}

?>