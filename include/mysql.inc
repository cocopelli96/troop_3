<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acme";

// Create connection
$link = mysqli_connect("localhost","root","","acme"); if ($link->connect_errno>0) {
    die('Could not connect: ' . $db->error ); }
// Or error out...
$db_selected = mysqli_select_db($link, "acme"); if (!$db_selected) {
    die ('Can\'t use database $db : ' . $db->error); 
} 

include("../include/inserts.inc");

if ($link->query($sql) === TRUE && $link->query($sql2) === TRUE && $link->query($sql3) === TRUE && $link->query($sql4) === TRUE) {
    header("Location:'../index.php'")
} 
else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

?>