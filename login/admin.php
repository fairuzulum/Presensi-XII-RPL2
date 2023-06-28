<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/login/style.css">
    <title>Login Admin</title>
</head>
<body>
<div class="login">
	<h1>Login Admin</h1>
    <form method="POST" action="../function/login_admin.php">
    	<input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <input type="submit" class="btn btn-primary btn-block btn-large" value="Login">
    </form>
</div>
</body>
</html>