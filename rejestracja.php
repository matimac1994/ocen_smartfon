<?php

	require_once "baza.php";

	if ((!isset($_POST['username'])) || (!isset($_POST['password1'])) || (!isset($_POST['password2'])) || (!isset($_POST['email'])))
	{
		header('Location: zaloguj.php');
		exit();
	}

	$imie = $nazwisko = $miasto = NULL;
	
	$options = [
		'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	];

$error = '';

if (isset($_POST['username']))
{
	if (empty($_POST['username']) || strlen($_POST['username']) < 3 || strlen($_POST['username']) > 100)
	{
		$error = "Login musi zawierać ponad 3 znaki.";
	}
	else if(empty($_POST['password1']) || strlen($_POST['password1']) < 5 || strlen($_POST['password1']) > 300)
	{
		$error = "Hasło musi zawierać ponad 5 znaków";
	}
	else if ($_POST['password1'] !== $_POST['password2'])
	{
		$error = "Hasła są różne.";
	}
	else if(empty($_POST['email']) || strlen($_POST['email']) > 100 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$error = "Błędny E-mail.";
	}
	else if(strlen($_POST['imie']) > 100)
	{
		$error = "Imię nie może być dłuższe niż 100 znaków.";
	}
	else if(strlen($_POST['nazwisko']) > 100)
	{
		$error = "Nazwisko nie może być dłuższe niż 100 znaków.";
	}
	else if(strlen($_POST['miasto']) > 100)
	{
		$error = "Miasto nie może być dłuższe niż 100 znaków.";
	}
	else
	{
		$username = bezpieczneDane($db, strtolower($_POST['username']));
		$password = bezpieczneDane($db, $_POST['password1']); 
		$email = bezpieczneDane($db, $_POST['email']);
		if (isset($_POST['imie'])) $imie = bezpieczneDane($db, $_POST['imie']);
		if (isset($_POST['nazwisko'])) $nazwisko = bezpieczneDane($db, $_POST['nazwisko']);
		if (isset($_POST['miasto'])) $miasto = bezpieczneDane($db, $_POST['miasto']);

		try
		{

			//TRANSAKCJA
			$db->autocommit(FALSE); // to też powoduje START TRANSACTION
        	$db->query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");


			$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$username';");
			$num_rows_login = mysqli_num_rows($q);
			$q->free();
			$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE MAIL = '$email';");
			$num_rows_mail = mysqli_num_rows($q);
			$q->free();
			if ($num_rows_login != 0)
			{
				$error = "Użytkownik o podanym loginie już istnieje!";
				$db->rollback();
			}
			else if ($num_rows_mail != 0)
			{
				$error = "Mail już użyty! Podaj inny.";
				$db->rollback();
			}
			else
			{
				$passwordHash = password_hash($password, PASSWORD_BCRYPT, $options);

				$insert = mysqli_query($db, "INSERT INTO UZYTKOWNICY (LOGIN, HASLO, MAIL, IMIE, NAZWISKO, MIASTO)
								 VALUES ('$username', '$passwordHash', '$email', '$imie', '$nazwisko', '$miasto');");

				if ($insert)
				{
					if (!isset($_COOKIE["przywitanie"]))
					{
						$db->commit();
						setcookie("przywitanie", "$username", time()+3600);
						header('Location: index.php');
						exit();
					}		
				}
				else
				{
					if (!isset($_COOKIE["blad_rejestracja"]))
					{
						$db->rollback();
						setcookie("blad_rejestracja", 'Problem z rejestracją!', time()+3600);
						header('Location: zaloguj.php');
						exit();
					}

				}

			}
		}
		catch(Exception $e)
		{
			$error = "Błąd! Spróbuj ponownie później.";
		}
	}
	if (!isset($_COOKIE["blad_rejestracja"]))
	{
		setcookie("blad_rejestracja", $error, time()+3600);
		header('Location: zaloguj.php');
		exit();
	}
}
	$db->close();
?>
<?php
/*
	$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");
	if (mysqli_num_rows($q) != 0)
	{
		if (!isset($_COOKIE["blad_istnieje_uzytkownik"]))
		{
			setcookie("blad_istnieje_uzytkownik", 'Użytkownik o podanym loginie już istnieje!', time()+3600);
			$q->free();
			header('Location: zaloguj.php');
			exit();
		}
	}
	$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE MAIL = '$email';");
	if (mysqli_num_rows($q) != 0)
	{
		if (!isset($_COOKIE["blad_istnieje_uzytkownik"]))
		{
			setcookie("blad_istnieje_uzytkownik", 'Użytkownik o podanym loginie już istnieje!', time()+3600);
			$q->free();
			header('Location: zaloguj.php');
			exit();
		}
	}

	$insert = mysqli_query($db, "INSERT INTO UZYTKOWNICY (LOGIN, HASLO, MAIL, IMIE, NAZWISKO, MIASTO)
								 VALUES ('$login', '$passwordHash', '$email', '$imie', '$nazwisko', '$miasto');");

	if ($insert)
	{
		if (!isset($_COOKIE["przywitanie"]))
		{
			setcookie("przywitanie", "$login", time()+3600);
			header('Location: index.php');
			exit();
		}		
	}
	else
	{
		if (!isset($_COOKIE["blad_rejestracja"]))
		{
			setcookie("blad_rejestracja", 'Problem z rejestracją!', time()+3600);
			header('Location: zaloguj.php');
			exit();
		}

	}

	$db->close();
?>