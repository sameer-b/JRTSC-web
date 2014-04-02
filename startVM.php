<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
$email=$_SESSION['currentUser'];
startVM($email);


function startVM($email)
{
	$command="VBoxManage startvm " .$email. " --type gui 2>&1";
	$output=shell_exec($command);
	echo "<h3>".$output."</h3>";
	header( "refresh:3; url=myVM.php" ); 
	die();

}
?>
</body>
</html>