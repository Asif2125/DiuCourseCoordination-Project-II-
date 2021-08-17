<?php

?>

<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: diu.html");
exit(); }
?>

<!--login.php-->
