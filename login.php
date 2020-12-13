<?php

if (isset($_REQUEST['attempt'])){

	$link = mysql_connect('localhost', 'root', '') or die('Can not connect to database');
	mysql_select_db('test_users');

	$user = mysql_real_escape_string($_POST['user']);
	$password = sha1(mysql_real_escape_string($_POST['password']));

	$query = mysql_query("
		SELECT user 
		FROM users
		WHERE user = '$user'
		AND password = '$password'
		") or die(mysql_error());

	// echo mysql_fetch_array($query)
	$total = mysql_num_rows($query);

	if ($total > 0){
		session_start();
		$_SESSION['user'] = 'blah';
		header('location: dashboard.php')
	}
	else{
		
	}


}

?>
<form method="post" action="login.php">
	User <input type="text" name="user"><br />
	Pass <input type="password" name="password"><br />
	<input type="submit" name=""/>
</form>