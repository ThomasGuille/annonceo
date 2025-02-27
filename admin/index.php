<?php 
require_once("../include/init.php");

if(!adminConnected()){
    header("location: ../index.php");
}

require_once("include/backheader.php");
?>



<?php require_once("include/backfooter.php"); ?>