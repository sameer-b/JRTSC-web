<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
$email=$_SESSION['currentUser'];
stopVM($email);


function stopVM($email)
{
	$command="VBoxManage controlvm " .$email. " poweroff ";
	$output=shell_exec($command);
	echo "<h3>".$output."</h3>";
	header( "refresh:3; url=myVM.php" ); 
	die();
}
?>
</body>
</html>