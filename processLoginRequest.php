<?php
/*
 * Copyright (C) 2013 Sameer Balasubrahmanyam

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php 
require_once 'config.php';
//populate accordingly
$host="";
$user="";
$SQLpassword="";
$db="";


$email= $_POST["email"];
$password = $_POST["password"];
$passwordHash = sha1($password);


$conn=connectMySQL($host,$user,$SQLpassword,$db);
session_start();
$_SESSION['currentUser'] = $email;
authenticateUser($email,$passwordHash,$conn);


function authenticateUser($email,$passwordHash,$conn)
  	{
  	$query="SELECT passwordHash FROM users WHERE email=\"$email\"";
	$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result))
  	{
  		
  		if($passwordHash==$row['passwordHash'])
  		{
  			echo "Login Success!..We will redirect you now. :)";
			header( "refresh:3; url=myVM.php" ); 
			die();
  		}
  		else
  		{
  			echo "Login failed. Either username or passwords do not match! ";
			header( "refresh:3; url=index.php" ); 
			die();
  		}
  		
  	}
  	}


        ?>

</head>
<body>



</body>
</html>