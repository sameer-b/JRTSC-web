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
<html>
<head>
	<title>My VMs</title>
</head>
<body>
<h1>My VMs</h1>
<?php 
session_start();
$email=$_SESSION['currentUser'];
getIP($email);
function getIP($email)
{
	$command="VBoxManage guestproperty get " .$email. " \"/VirtualBox/GuestInfo/Net/0/V4/IP\" 2>&1";
	$ip=shell_exec($command);
	echo "<h3>The IP of this machine is : ".$ip."</h3>";

}


?>
<form action="startVM.php">
<button name="startVM" value="startVM">Start VM</button>
</form>

<form action="stopVM.php">
<button name="stopVM" value="stopVM">Stop VM</button>
</form>

<form action="editVM.php">
<button>Edit VM</button>
</form>

</body>
</html>