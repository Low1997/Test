<?php
require 'database.php';

$SESSION = [];
session_unset();
session_destroy();
header("location:Login.php");

?>





