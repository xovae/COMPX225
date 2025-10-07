<?php
    $con = mysqli_connect("learn-mysql.cms.waikato.ac.nz",
    "jb469", "my301216sql", "jb469");
    
    if ($con == false) {
        die("Error in connecting to the database: " . mysqli_connect_error());
    }
?>
