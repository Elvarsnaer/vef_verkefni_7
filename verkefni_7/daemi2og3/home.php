<?php
 
//home.php
 
/**
 * Start the session.
 */
session_start();
 
 
/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}
 
 
/**
 * Print out something that only logged in users can see.
 */
 
echo 'Congratulations! You are logged in!';


/* Database config */
$db_host		= 'tsuts.tskoli.is';
$db_user		= '0709992349';
$db_pass		= 'Steina67';
$db_database	= '0709992349_vef_verkefni7'; 
 
/* End config */
 
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<table border="1" cellspacing="0" cellpadding="2" >
<thead>
	<tr>
		<th> username </th>
	</tr>
</thead>
<tbody>
	<?php
		include('connect.php');
		$result = $db->prepare("SELECT * FROM users ORDER BY id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td><?php echo $row['username']; ?></td>
		<td><a href="editform.php?id=<?php echo $row['id']; ?>"> edit username</a></td>
	</tr>
	<?php
		}
	?>
</tbody>
</table>