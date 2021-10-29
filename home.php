<?php
include('dbcon.php');
include('session.php');

$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


  <h3>Welcome: <?php echo $row['username']; ?> !</h3>
  <center><ul class="main-nav">
      <li><a href="">TOP TEN HITS</a></li>
      <li><a href="">NEW MUSIC</a></li>
      <li><a href="">PLAYLIST</a></li>
      <li><a href="">MOST DOWNLOADED</a></li>
    </ul></center>
<div class="reminder">
 <p><a href="logout.php" style="float:right" class="btn btn-full">Log out</a></p>
</div>
<style>
.main-nav
{
    list-style: none;
    margin-top: 16px;
}
.main-nav li
{
 display: inline-block;
    margin-right: 20px;
    margin-bottom: 100x;
}
.main-nav li a
{
 color: white;
    text-decoration: none;
    font-size: 90%;
    font-family: mv boli;
}
.main-nav li a:hover
{
    color: #e67e22;
    border-bottom: 2px solid #e67e22;
    transition: 0.5s all ease-in ;
    padding: 15px 0;
}
  h3
   {
       color:#e67e22;
       float:left;
   }
   .btn-full
      {
      background-color: #e67e22;
          color:white;
          transition: all 0.5s ease-in;
      }
      .btn
    {
        border:2px  solid #e67e22;
        padding: 3px 15px;
        color:#e67e22;
        text-decoration: none;
        border-radius: 12px;
        margin-right: 15px;
    }
    body
        {
            background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('img/sample.jpg');
        }
 </style>
</body>
</html>
