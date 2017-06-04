<?php
	header("Cache-Control: no-store, no-cache, must-revalidate");  
	header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
	header("Pragma: no-cache");
	
	if(!isset($_COOKIE["id"]) || !isset($_COOKIE["login"]) || !isset($_COOKIE["typ_uzyt"]))
	{
		header("Location: wyloguj.php");
		exit();
	}
	else
	{
		require_once('baza.php');
		$id = bezpieczneDane($db, $_COOKIE["id"]);
		$typ_uzyt = bezpieczneDane($db, $_COOKIE["typ_uzyt"]);
		$q = mysqli_query($db,"SELECT ID_UZYTKOWNIKA FROM SESJA WHERE ID = '$id' AND IP = '$_SERVER[REMOTE_ADDR]' AND WEB = '$_SERVER[HTTP_USER_AGENT]' AND TYP_UZYT = '$typ_uzyt';");

		if(mysqli_num_rows($q) != 1)
		{
			unset($_COOKIE["id"]);
			unset($_COOKIE["login"]);
			unset($_COOKIE["typ_uzyt"]);
			header("Location: wyloguj.php");
    		exit();
		}

		mysqli_query($db, "UPDATE SESJA SET TIME = CURRENT_TIMESTAMP WHERE ID = '$id' AND WEB = '$_SERVER[HTTP_USER_AGENT]';");
	}
?>