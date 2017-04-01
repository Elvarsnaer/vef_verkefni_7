<?php
// configuration
include('connect.php');
 
// new data
$username = $_POST['username'];
$id = $_POST['id'];
// query
$sql = "UPDATE users 
        SET username=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($username, $id));
header("location: home.php");
 
?>