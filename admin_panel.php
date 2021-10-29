<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<?php
if (isset($_POST['login']))
  {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $query 		= mysqli_query($con, "SELECT * FROM admin WHERE  password='$password' and username='$username'");
    $row		= mysqli_fetch_array($query);
    $num_row 	= mysqli_num_rows($query);

    if ($num_row > 0)
      {
        $_SESSION['user_id']=$row['user_id'];
        header('location:home_admin.php');

      }
    else
      {
        echo 'Invalid Username and Password Combination';
      }
  }
?>
<html>

<head>

<title>Admin panel</title>

    </head>
<body>


<section role="main">


		<!-- Login box -->
		<article id="login-box">
			<img src="img/sample_logo.png"/>
            <p style="display:inline; margin:5px; font-size:34px;">Admin Panel</p>
			<form method="post" action="#">
			  <fieldset>
					<dl>
						<dt>
							<label>Username</label>
						</dt>
						<dd>
							<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
						</dd>
						<dt>
							<label>Password</label>
						</dt>
						<dd>
						<input type="password" name="pass" required="required" placeholder="Password" required></input>
						</dd>
					</dl>
				</fieldset>
				<br>
              <input type="submit" class="button" title="Log In" name="login" value="Login">
			</form>

		</article>


	</section>
<style>

    body
    {
  color: #fff;
  font: 87.5%/1.5em 'Open Sans', sans-serif;
	background:url(img/bg.jpg)no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;}
    }
    body section[role=navigation] {
	width:50px;

	padding:2px 0;
	position:absolute;
	top:0;
	left:0;
}
body section[role=main] {
	background-color:#e67e22;
	height:35%;
	margin-left:550px;
    margin-top: 200px;
    margin-right: 500px;
	padding:25px;
    border-radius: 1.8%;
}

/*  Buttons :: Button :: Red  */
.button, button {
	border:1px solid;
	border-color:#cb6652 #b74d39 #803121;
	background:-moz-linear-gradient(top, #faa796, #d06c57 5%, #ae432e 100%);
	background:-webkit-gradient(linear, left top, left bottom, from(#faa796), to(#ae432e), color-stop(0.05, #d06c57));
	background:-o-linear-gradient(top, #faa796, #d06c57 5%, #ae432e 100%);
	padding:4px 15px 3px;
	margin-bottom:2px;
	-webkit-box-shadow:0 1px 2px #999;
	-moz-box-shadow:0 1px 2px #999;
	box-shadow:0 1px 2px #999;
	font-weight:normal;
	font-family:'PTSansBold', Arial, sans-serif;
	color:#fce8e3;
	height:28px;
}
a.button {
	height:18px;
	padding-top:5px;
}
.button:hover, button:hover {
	background:-moz-linear-gradient(top, #faa796, #d06c57 5%, #943a28 100%);
	background:-webkit-gradient(linear, left top, left bottom, from(#faa796), to(#943a28), color-stop(0.05, #d06c57));
	background:-o-linear-gradient(top, #faa796, #d06c57 5%, #943a28 100%);
	color:#fff;
}
.no-cssgradients .button, .no-cssgradients button { background:#ae432e url(../img/btns/btn_red.png) repeat-x left top; }
.no-cssgradients .button:hover, .no-cssgradients button:hover { background:#963c2a url(../img/btns/btn_red_hover.png) repeat-x left top; }


    </style>
    </body>

</html>
