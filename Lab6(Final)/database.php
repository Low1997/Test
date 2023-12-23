<?php

session_start();

//Connect server
$servername = "localhost";
$username = "root";
$password = "";
$dbname="weblab_feedbackform";

//Create connection after database was created
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
