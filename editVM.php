<html>
<head>
	<title></title>
</head>
<body>
<h1>VM INFO</h1>
<?php
session_start();
$email=$_SESSION['currentUser'];
showInfo($email);

function showInfo($email)
{
	$command="VBoxManage  showvminfo ".$email." 2>&1   ";
	exec($command,$output);

	for ($i=0;$i<17;$i++) 
	{
    echo $output[$i];
    echo "</br>";
}
}
?>
</br>
<h3>Configure the VM as per your needs </h3>
<form action="updateVM.php" method="post">
Ram: 1GB<input type="range" name="memory" min="1024" max="6144">6GB </br></br>
GPU Ram: 1MB<input type="range" name="vram" min="1" max="128">128MB </br></br>
CPUs: 1<input type="range" name="cpus" min="1" max="8">8 </br></br>
CPU Execution Cap: 1<input type="range" name="cpuexecutioncap" min="1" max="100">100 </br></br>
Accelerate 3D: <input type="radio" name="accelerate3d" value="on">On
<input type="radio" name="accelerate3d" value="off">Off </br></br>

<input type="submit">
</form>

</body>
</html>