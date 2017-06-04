<?php

	require_once('baza.php');

	if(isset($_POST['username']) && !empty($_POST['username']))
	{
		$login = bezpieczneDane($db, $_POST['username']);
		if (strlen($login) < 3 || strlen($login) > 100)
		{
			die('<img src="not-available.png" height="16" width="16" />');
		}
		else
		{
			$q = mysqli_query($db,"SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");

			$ile = mysqli_num_rows($q);

			if ($ile != 1)
			{
				die('<img src="available.png" height="16" width="16" />');
			}
			else
			{
				die('<img src="not-available.png" height="16" width="16" />');
			}			
		}
		


	}
	if(isset($_POST['email']) && !empty($_POST['email']))
	{
		$mail = bezpieczneDane($db, $_POST['email']);
		if(strlen($mail) > 100 || !filter_var($mail, FILTER_VALIDATE_EMAIL))
		{
			die('<img src="not-available.png" height="16" width="16" />');
		}
		else
		{
			$q = mysqli_query($db,"SELECT * FROM UZYTKOWNICY WHERE MAIL = '$mail';");

			$ile = mysqli_num_rows($q);

			if ($ile != 1)
			{
				die('<img src="available.png" height="16" width="16" />');
			}
			else
			{
				die('<img src="not-available.png" height="16" width="16" />');
			}
		}

		
	}
?>