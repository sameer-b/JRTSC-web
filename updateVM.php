<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
$email=$_SESSION['currentUser'];
$memory=$_POST['memory'];
$vram=$_POST['vram'];
$accelerate3d=$_POST['accelerate3d'];
$cpus=$_POST['cpus'];
$cpuexecutioncap=$_POST['cpuexecutioncap'];

echo $email."<br>";
echo $memory."<br>";
echo $vram."<br>";
echo $accelerate3d."<br>";
echo $cpuexecutioncap."<br>";
echo $cpus."<br>";
setVmSpecs($email,$memory,$vram,$accelerate3d,$cpus,$cpuexecutioncap);

function setVmSpecs($email,$memory,$vram,$accelerate3d,$cpus,$cpuexecutioncap)
{
	$command="VBoxManage modifyvm ".$email."  --memory ".$memory." --vram "
	.$vram." --cpus ".$cpus." --cpuexecutioncap ".$cpuexecutioncap.
	" --accelerate3d ".$accelerate3d."  2>&1 ";
	stopVM($email);
	$output=shell_exec($command);
	echo "Vm Updated!";
	echo $output;
	startvm($email);
	header( "refresh:3; url=myVM.php" ); 
	die();
	
}

function startVM($email)
{
	$command="VBoxManage startvm " .$email. " --type gui 2>&1";
	$output=shell_exec($command);
	echo "<h3>Starting vm</h3>";
	//header( "refresh:3; url=myVM.php" ); 
	//die();

}

function stopVM($email)
{
	$command="VBoxManage controlvm " .$email. " poweroff ";
	$output=shell_exec($command);
	echo "<h3>Shutting vm...</h3>";

}

?>
</body>
</html>