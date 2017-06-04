<?php
	require_once('loggedUtils.php');
?>

<?php
	
	$options = [
	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	];

	if(isset($_POST["mail"]) && isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["miasto"]))
	{
		$mail = bezpieczneDane($db, $_POST["mail"]);
		$imie = bezpieczneDane($db, $_POST["imie"]);
		$nazwisko = bezpieczneDane($db, $_POST["nazwisko"]);
		$miasto = bezpieczneDane($db, $_POST["miasto"]);
		$id_sesja = bezpieczneDane($db, $_COOKIE["id"]);
		$q1 = mysqli_query($db, "SELECT * FROM SESJA WHERE ID = '$id_sesja';");
		$dane1 = mysqli_fetch_assoc($q1);
		$id_uzytkownika = $dane1["ID_UZYTKOWNIKA"];
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$id_uzytkownika';");
		$dane = mysqli_fetch_assoc($q);
		/*
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");
		$dane = mysqli_fetch_assoc($q);*/
		$login = bezpieczneDane($db, $dane["LOGIN"]);
		$sprawdz_mail = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE MAIL = '$mail' AND LOGIN != '$login';");
		$sprawdz_mail_num_rows = mysqli_num_rows($sprawdz_mail);

		if ($dane["MAIL"] == $mail && $dane["IMIE"] == $imie  && $dane["NAZWISKO"] == $nazwisko && $dane["MIASTO"] == $miasto)
		{
			$_POST["info"] = "Nie zmieniłeś żadnych danych!";
		}
		else if (empty($_POST['mail']) || strlen($mail) > 100 || !filter_var($mail, FILTER_VALIDATE_EMAIL))
		{
			$_POST["info"] = "Błędny mail!";
		}
		else if ($sprawdz_mail_num_rows)
		{
			$_POST["info"] = "Mail już jest zajęty przez innego użytkownika!";
		}
		else if(strlen($imie) > 100)
		{
			$_POST["info"] = "Imię nie może być dłuższe niż 100 znaków.";
		}
		else if(strlen($nazwisko) > 100)
		{
			$_POST["info"] = "Nazwisko nie może być dłuższe niż 100 znaków.";
		}
		else if(strlen($miasto) > 100)
		{
			$_POST["info"] = "Miasto nie może być dłuższe niż 100 znaków.";
		}
		else
		{
			$update = "UPDATE UZYTKOWNICY SET MAIL = '$mail', IMIE = '$imie', NAZWISKO = '$nazwisko', MIASTO = '$miasto' WHERE LOGIN = '$login'";
			$result = mysqli_query($db, $update);
			if ($result)
			{
				$_POST["info"] = "Zaktualizowano Twoje dane!";
			}
			else
			{
				$_POST["info"] = "Błąd w aktualizacji!";
			}
		}

	}
	else if (isset($_POST["stare_haslo"]) && isset($_POST["nowe_haslo"]) && isset($_POST["nowe_haslo2"]))
	{
		$id_sesja = bezpieczneDane($db, $_COOKIE["id"]);
		$q1 = mysqli_query($db, "SELECT * FROM SESJA WHERE ID = '$id_sesja';");
		$dane1 = mysqli_fetch_assoc($q1);
		$id_uzytkownika = $dane1["ID_UZYTKOWNIKA"];
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$id_uzytkownika';");
		$dane = mysqli_fetch_assoc($q);
		/*
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");
		$dane = mysqli_fetch_assoc($q);*/
		$login = bezpieczneDane($db, $dane["LOGIN"]);
		$stare_haslo = bezpieczneDane($db, $_POST["stare_haslo"]);
		$nowe_haslo = bezpieczneDane($db, $_POST["nowe_haslo"]);
		$nowe_haslo2 = bezpieczneDane($db, $_POST["nowe_haslo2"]);

		if(empty($_POST['nowe_haslo']) || strlen($_POST['nowe_haslo']) < 5 || strlen($_POST['nowe_haslo']) > 300)
		{
			$_POST["info2"] = "Hasło musi zawierać ponad 5 znaków!";
		}
		else if ($_POST['nowe_haslo'] !== $_POST['nowe_haslo2'])
		{
			$_POST["info2"] = "Hasła są różne!";
		}
		else if(!password_verify($stare_haslo, $dane['HASLO']))
		{
			$_POST["info2"] = "Niepoprawne stare hasło!";
		}
		else if ($stare_haslo == $nowe_haslo)
		{
			$_POST["info2"] = "Nowe hasło jest takie samo jak stare!";
		}
		else
		{
			$passwordHash = password_hash($nowe_haslo, PASSWORD_BCRYPT, $options);
			$update = "UPDATE UZYTKOWNICY SET HASLO = '$passwordHash' WHERE ID_UZYTKOWNIKA = '$id_uzytkownika';";
			$result = mysqli_query($db, $update);
			if ($result)
			{
				$_POST["info2"] = "Twoje Hasło zostało zmienione!";
			}
			else
			{
				$_POST["info"] = "Błąd w zmianie hasła!";
			}
		}
	}





?>

<!DOCTYPE html>
<html lang = "pl">
<head>
<?php require_once("include/head.php"); ?>
<script type="text/javascript">
$(document).ready(function() {
		    var x_timer;    
		    $("#email").keyup(function (e){
		        clearTimeout(x_timer);
		        var email = $(this).val();
		        x_timer = setTimeout(function(){
		            check_mail_ajax(email);
		        }, 1000);
		    }); 
		    function check_mail_ajax(email){
		    $("#mail-result").html('<img src="loading.gif" height="16" width="16" />');
		    $.post('login-checker.php', {'email':email}, function(data) {
		      $("#mail-result").html(data);
		    });
		}
});

</script>
<script type="text/javascript">
	function sprawdz_haslo()
	{
		var nowe_haslo = document.getElementById('nowe_haslo').value;
		var nowe_haslo2 = document.getElementById('nowe_haslo2').value;
		if(nowe_haslo.length < 5 || nowe_haslo.length > 300)
        {
            document.getElementById('nowe_haslo_rej').innerHTML = "Hasło musi być dłuższe niż 5 znaków";
        }
        else if(nowe_haslo != nowe_haslo2)
        {
            document.getElementById('nowe_haslo2_rej').innerHTML = "Hasła nie są zgodne.";
            document.getElementById('nowe_haslo_rej').innerHTML = "";
        }
        else
        {
            document.getElementById('nowe_haslo2_rej').innerHTML = "";
        }
    }
</script>
</head>
<body>
	<?php require_once("include/bar_zalogowany.php"); ?>
<div class="container" id="container">


	<?php

		if (isset($_POST["info"]))
		{
			echo '<span style="color: red; font-size: 15px;">' . $_POST["info"] . '</span>';
			$_POST["info"] = null;
		}
		$id_sesja = bezpieczneDane($db, $_COOKIE["id"]);
		$q1 = mysqli_query($db, "SELECT * FROM SESJA WHERE ID = '$id_sesja';");
		$dane1 = mysqli_fetch_assoc($q1);
		$id_uzytkownika = $dane1["ID_UZYTKOWNIKA"];
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$id_uzytkownika';");
		$dane = mysqli_fetch_assoc($q);
		/*
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");
		$dane = mysqli_fetch_assoc($q);*/
		$login = bezpieczneDane($db, $dane["LOGIN"]);
		/*$login = bezpieczneDane($db, $_COOKIE["login"]);
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");
		$dane = mysqli_fetch_assoc($q);*/
		echo '<fieldset style="border: groove; width: 400px;">';
		echo '<legend>Zmień Dane</legend>';
		echo '<form method="post">';
		echo '<label class="zmien_dane">Podaj Maila: </label>';
		echo '<input type="email" name="mail" id="email" value="' . $dane["MAIL"] . '">';
		echo '<span id="mail-result"></span><br>';
		echo '<label class="zmien_dane">Podaj Imię: </label>';
		echo '<input type="text" name="imie" value="' . $dane["IMIE"] . '"></br>';
		echo '<label class="zmien_dane">Podaj Nazwisko: </label>';
		echo '<input type="text" name="nazwisko" value="' . $dane["NAZWISKO"] . '"></br>';
		echo '<label class="zmien_dane">Podaj Miasto: </label>';
		echo '<input type="text" name="miasto" value="' . $dane["MIASTO"] . '"></br>';
		echo '<input type="submit" class="submit" value="Aktualizuj dane">';
		echo '</form>';
		echo '</fieldset>';

		echo '<fieldset style="border: groove; width: 400px;">';
		echo '<legend>Zmień Hasło</legend>';
		echo '<form method="post">';
		echo '<label class="zmien_dane">Podaj Stare Hasło: </label>';
		echo '<input type="password" name="stare_haslo" placeholder="Stare Hasło" required></br>';
		echo '<label class="zmien_dane">Podaj Nowe Hasło: </label>';
		echo '<input type="password" name="nowe_haslo" id="nowe_haslo" placeholder="Nowe Hasło" onkeyup="sprawdz_haslo()" required></br>';
		echo '<div id="nowe_haslo_rej" style="color: red; font-size: 12px;"></div>';
		echo '<label class="zmien_dane">Powtórz Nowe Hasło: </label>';
		echo '<input type="password" name="nowe_haslo2" id="nowe_haslo2" placeholder="Powtórz Nowe Hasło" onkeyup="sprawdz_haslo()" required></br>';
		echo '<div id="nowe_haslo2_rej" style="color: red; font-size: 12px;"></div>';
		echo '<input type="submit" class="submit" value="Zmień Hasło">';
		echo '</form>';
		echo '</fieldset>';
		if (isset($_POST["info2"]))
		{
			echo '<span style="color: red; font-size: 15px;">' . $_POST["info2"] . '</span>';
			$_POST["info2"] = null;
		}
	?>

</div>
<?php require_once("include/footer.php"); ?>
</body>
</html>




