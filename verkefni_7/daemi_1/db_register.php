<?php
 if (isset($_POST['register'])) {
 $username = trim($_POST['username']);
 $password = trim($_POST['pwd']);
 $retyped = trim($_POST['conf_pwd']);
 require_once 'register_user_pdo.php';
 }

 if (isset($_POST['insert'])) {
 require_once '../includes/connection.php';
 // initialize flag
 $OK = false;
 // create database connection
 $conn = dbConnect('write', 'pdo');
 // create SQL
 $sql = 'INSERT INTO blog (title, article)
 VALUES(:title, :article)';
 // prepare the statement
 $stmt = $conn->prepare($sql);
 // bind the parameters and execute the statement
 $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
 $stmt->bindParam(':article', $_POST['article'], PDO::PARAM_STR);
 // execute and get number of affected rows
 $stmt->execute();
 $OK = $stmt->rowCount();
 // redirect if successful or display error
if ($OK) {
 header('Location: http://localhost/phpsols/admin/blog_list_pdo.php');
 exit;
 } else {
 $errorInfo = $stmt->errorInfo();
 if (isset($errorInfo[2])) {
 $error = $errorInfo[2];
 }
 }
}
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Register user</title>
    <style>
        label {
            display:inline-block;
            width:125px;
            text-align:right;
            padding-right:2px;
        }
        input[type="submit"] {
            margin-left:132px;
        }
    </style>
</head>

<body>
<h1>Register user</h1>
<?php
 if (isset($success)) {
 echo "<p>$success</p>";
 } elseif (isset($errors) && !empty($errors)) {
 echo '<ul>';
 foreach ($errors as $error) {
 echo "<li>$error</li>";
 }
 echo '</ul>';
 }
 ?>
<form method="post" action="">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
    </p>
    <p>
        <label for="username">Email:</label>
        <input type="email" name="email" id="email" required>
    </p>
    <p>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd" required>
    </p>
    <p>
        <label for="conf_pwd">Confirm password:</label>
        <input type="password" name="conf_pwd" id="conf_pwd" required>
    </p>
    <p>
        <input name="register" type="submit" id="register" value="Register">
    </p>
</form>
</body>
</html>