<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<h2><b>REGISTRATION PAGE</b></h2>
</head>
<body>
<div class="form-wrapper">

  <form action="register.php" method="post">
    <h3>Register here</h3>

    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>

    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password1" required></input>
    </div>

    <div class="form-item">
		<input type="password" name="pass2" required="required" placeholder="Password2" required></input>
    </div>

    <div class="button-panel">
		<input type="submit" class="button" title="Register" name="Register" value="Register"></input>
    </div>
  </form>
  <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysql_real_escape_string($_POST['user']);
	$password = mysql_real_escape_string($_POST['pass']);

    $bool = true;

	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("login") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from users"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
	}

	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php
	}

}
?>
  <div class="reminder">
    <p>Already a member? <a href="login.php">Sign in now</a></p>

  </div>

</div>

</body>
</html>
