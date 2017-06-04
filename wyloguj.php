<?php

require_once ('baza.php');


	if (isset($_COOKIE["id"]))
	{
		$id = $_COOKIE["id"];
		mysqli_query($db, "DELETE FROM SESJA WHERE ID = '$id' AND WEB = '$_SERVER[HTTP_USER_AGENT]';"); 
		setcookie("id", 0, time()-1);
		unset($_COOKIE["id"]);
		if (isset($_COOKIE["login"])){
			setcookie("login", 0, time()-1);
			unset($_COOKIE["login"]);
		}
		if (isset($_COOKIE["typ_uzyt"])){
			setcookie("typ_uzyt", 0, time()-1);
			unset($_COOKIE["typ_uzyt"]);
		}
		header("location: index.php");
		exit();
	}
	else
	{
		if (isset($_COOKIE["login"])){
			setcookie("login", 0, time()-1);
			unset($_COOKIE["login"]);
		}
		if (isset($_COOKIE["typ_uzyt"])){
			setcookie("typ_uzyt", 0, time()-1);
			unset($_COOKIE["typ_uzyt"]);
		}
		header("location: index.php");
		exit();
	}

?>