<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM users WHERE id = :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
Username<br>
<input type="text" name="username" value="<?php echo $row['username']; ?>" />
</form>
<?php
	}
?>