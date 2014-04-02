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
	<title>JRTSC Web</title>
</head>
<body>
<?php 
require_once 'config.php';
//populate accordingly
$host="";
$user="";
$SQLpassword="";
$db="";

$email= $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$passwordHash=sha1($password);

if ($password !== $confirmPassword)
{
	echo "Passwords do not match kindly go back and re enter.";
}
else
{
	$con=connectMySQL($host,$user,$SQLpassword,$db);
	checkDuplicateUser($con,$email);
	createUserVM($email);
 	addUserToTable($con,$email,$passwordHash);
 	

}

function createUserVM($email)
{
	$command="VBoxManage clonevm \"Ubuntu\" --snapshot \"snap\" --options link --options keepdisknames --name ".$email." --register 2>&1";
	#echo $command;
	#chdir("py-data");
	//$command="VBoxManage list 2>&1 ";
	#$command="python createVM.py ".$email. " 2>&1 ";
	$string=shell_exec($command);
	
	//$string=exec("VBoxManage.exe clonevm \"Windows7\" --snapshot \"Linked Base for Windows7 and Windows7 Clone\" --options link --options keepdisknames --name sameer123  --register 2>&1");
	//$string=passthru("VirtualBox.exe");
	//$string=shell_exec("runas /user:Sameer VBoxManage clonevm \"Windows7\" --snapshot \"Linked Base for Windows7 and Windows7 Clone\" --options link --options keepdisknames --name sameer  --register 2>&1 ");
	//$string=shell_exec("python createVM.py");
	//$string=shell_exec("\"C:\Program Files\Oracle\VirtualBox\VBoxManage.exe\" \"Windows7\" --snapshot \"Linked Base for Windows7 and Windows7 Clone\" --options link --options keepdisknames --name ".$email." --register  2>&1");
	echo $string;


}

function checkDuplicateUser($con,$email)
{
	$result = mysqli_query($con,"SELECT * FROM users");
	while($row = mysqli_fetch_array($result))
  	{
  		if($email==$row['email'])
  		{
  		die("The email is already is registerd. Kindly go back and enter a different email address");	
  		}
  		
  	}

}


function addUserToTable($con,$email,$passwordHash)
{
	mysqli_query($con,"INSERT INTO users (email, passwordHash)
	VALUES ('$email', '$passwordHash')");
	echo " Registration Successful.. You may login now. We will redirect you now. :)";
	header( "refresh:3; url=index.php" ); 
	die();
}

 ?>

</body>
</html>

