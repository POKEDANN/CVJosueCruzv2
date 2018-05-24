<?php 

	//$db = mysqli_connect('localhost', '55eabdbec82b', '55eabdbec82bconcepth', 'ExitoBD'); //---- DB Beta ----
	//$db = mysqli_connect('localhost', 'root', 'root', 'ExitoBD');
    $db = mysqli_connect('localhost', 'exitoinm_user', 'programexito2016', 'exitoinm_BD');
	if(mysqli_connect_errno())
	{
		echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	}

 ?>