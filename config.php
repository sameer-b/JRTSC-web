<?php
function connectMySQL($host,$user,$SQLpassword,$db)
{
	$con=mysqli_connect($host,$user,$SQLpassword,$db);

	
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	else
  		return $con;
}

?>