<?php
	require_once('loggedUtils.php');
?>

<?php
	if (isset($_GET["usun_ocene"]))
	{
		require_once("baza.php");
		$id_oceny = bezpieczneDane($db, $_GET["usun_ocene"]);
		if (isset($_COOKIE["id"]))
		{
			$id_sesja = bezpieczneDane($db, $_COOKIE["id"]);
			$sesja = mysqli_query($db, "SELECT * FROM SESJA WHERE ID = '$id_sesja' AND WEB = '$_SERVER[HTTP_USER_AGENT]';");
			$sesja_result = mysqli_fetch_assoc($sesja);
			$id_uzytkownika = $sesja_result["ID_UZYTKOWNIKA"];
			$q = mysqli_query($db, "CALL USUN_OCENE('$id_oceny', '$id_uzytkownika')");
		}
	}
	if(isset($_POST["wybierz_uzytkownika"]))
	{
		require_once("baza.php");
		$wybierz_uzytkownika = bezpieczneDane($db, $_POST["wybierz_uzytkownika"]);
		$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$wybierz_uzytkownika';");
		$czy_user = mysqli_fetch_assoc($q);
		if($czy_user["ID_TYP"] != 1 && $czy_user["ID_TYP"] != 3)
		{
			$usun = mysqli_query($db, "DELETE FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$wybierz_uzytkownika';");
			if($usun)
			{
				$_POST["alert"] = 'Użytkownik: ' . $czy_user["LOGIN"] . ' został usunięty';
			}
			else {
				$_POST["alert"] = 'Błąd';
			}

		}
		else
		{
			$_POST["alert"] = 'Użytkownik: ' . $czy_user["LOGIN"] . ' jest moderatorem lub adminem!';
		}
	}
	if(isset($_POST["wybierz_model"]))
	{
		require_once("baza.php");
		$wybierz_model = bezpieczneDane($db, $_POST["wybierz_model"]);
		$q = mysqli_query($db, "SELECT * FROM MODELE WHERE ID_MODELU = '$wybierz_model';");
		$model = mysqli_fetch_assoc($q);
		if(mysqli_num_rows($q))
		{
			$usun = mysqli_query($db, "DELETE FROM MODELE WHERE ID_MODELU = '$wybierz_model';");
			if($usun)
			{
				$_POST["alert"] = 'Model: ' . $model["NAZWA_MODELU"] . ' został usunięty';
			}
			else {
				$_POST["alert"] = 'Błąd';
			}
		}
		else
		{
			$_POST["alert"] = 'Wybranego modelu nie ma już w bazie';
		}
	}
	if(isset($_POST["wybierz_system"]))
	{
		require_once("baza.php");
		$wybierz_system = bezpieczneDane($db, $_POST["wybierz_system"]);
		$q = mysqli_query($db, "SELECT * FROM SYSTEMY WHERE ID_SYSTEMU = '$wybierz_system';");
		$system = mysqli_fetch_assoc($q);
		if(mysqli_num_rows($q))
		{
			$usun = mysqli_query($db, "DELETE FROM SYSTEMY WHERE ID_SYSTEMU = '$wybierz_system';");
			if($usun)
			{
				$_POST["alert"] = 'System: ' . $system["NAZWA_SYSTEMU"] . ' został usunięty';
			}
			else {
				$_POST["alert"] = 'Błąd';
			}
		}
		else
		{
			$_POST["alert"] = 'Wybranego systemu nie ma już w bazie';
		}
	}
	if(isset($_POST["wybierz_marke"]))
	{
		require_once("baza.php");
		$wybierz_marke = bezpieczneDane($db, $_POST["wybierz_marke"]);
		$q = mysqli_query($db, "SELECT * FROM MARKI WHERE ID_MARKI = '$wybierz_marke';");
		$marka = mysqli_fetch_assoc($q);
		if(mysqli_num_rows($q))
		{
			$usun = mysqli_query($db, "DELETE FROM MARKI WHERE ID_MARKI = '$wybierz_marke';");
			if($usun)
			{
				$_POST["alert"] = 'Producent: ' . $marka["NAZWA_MARKI"] . ' został usunięty';
			}
			else {
				$_POST["alert"] = 'Błąd';
			}
		}
		else
		{
			$_POST["alert"] = 'Wybranego producenta nie ma już w bazie';
		}
	}
	if(isset($_POST["marka"]) && isset($_POST["system"]) && isset($_POST["nazwa_modelu"]))
	{	
		require_once("baza.php");
		$id_marka = bezpieczneDane($db, $_POST["marka"]);
		$id_system = bezpieczneDane($db, $_POST["system"]);
		$nazwa_modelu = bezpieczneDane($db, $_POST["nazwa_modelu"]);
		$query = mysqli_query($db, "SELECT * FROM MODELE WHERE NAZWA_MODELU = '$nazwa_modelu' AND ID_MARKI = '$id_marka' AND ID_SYSTEMU = '$id_system';");

		$czy = mysqli_num_rows($query);
		if (!$czy)
		{
			$insert = "INSERT INTO MODELE (NAZWA_MODELU, ID_MARKI, ID_SYSTEMU) VALUES (?, ?, ?);";
			$result = $db->prepare($insert);
			$result->bind_param("sii", $nazwa_modelu, $id_marka, $id_system);
			$result->execute();
			if($result)
			{
				$_POST["alert"] = 'Dodano model do bazy';
			}
			else { $_POST["alert"] = 'Błąd'; }
		}
		else
		{
			$_POST["alert"] = 'Model już istnieje w bazie danych';
		}
	}
	if(isset($_POST["nazwa_systemu"]) && isset($_POST["tworca"]))
	{	
		require_once("baza.php");
		$nazwa_systemu = bezpieczneDane($db, $_POST["nazwa_systemu"]);
		$tworca = bezpieczneDane($db, $_POST["tworca"]);
		$query = mysqli_query($db, "SELECT * FROM SYSTEMY WHERE NAZWA_SYSTEMU = '$nazwa_systemu' AND TWORCA = '$tworca';");

		$czy = mysqli_num_rows($query);
		if (!$czy)
		{
			$insert = mysqli_query($db, "CALL INSERT_SYSTEM('$nazwa_systemu', '$tworca');");
			if(!$insert)
	        {
	            $_POST["alert"] = mysqli_error($db);
	        }
	        else
	        {
	            $_POST["alert"] = 'Dodano system do bazy';
	        }
	        /*
			if($insert)
			{
				$_POST["alert"] = 'Dodano system do bazy';
			}
			else { $_POST["alert"] = 'Błąd'; }*/
			/*$insert = "INSERT INTO SYSTEM (NAZWA_SYSTEMU, TWORCA) VALUES(?, ?)";
			$result = $db->prepare($insert);
			$result->bind_param("si", $nazwa_systemu, $tworca);
			$result->execute();
			if($result)
			{
				$_POST["alert"] = 'Dodano system do bazy';
			}
			else { $_POST["alert"] = 'Błąd'; }*/
		}
		else
		{
			$_POST["alert"] = 'System już istnieje w bazie danych';
		}
	}
	if(isset($_POST["nazwa_marki"]))
	{	
		require_once("baza.php");
		$nazwa_marki = bezpieczneDane($db, $_POST["nazwa_marki"]);
		$query = mysqli_query($db, "SELECT * FROM MARKI WHERE NAZWA_MARKI = '$nazwa_marki';");

		$czy = mysqli_num_rows($query);
		if (!$czy)
		{
			$insert = "INSERT INTO MARKI (NAZWA_MARKI) VALUES (?);";
			$result = $db->prepare($insert);
			$result->bind_param("s", $nazwa_marki);
			$result->execute();
			if($result)
			{
				$_POST["alert"] = 'Dodano producenta do bazy';
			}
			else { $_POST["alert"] = 'Błąd'; }
		}
		else
		{
			$_POST["alert"] = 'Producent już istnieje w bazie danych';
		}
	}
	if (isset($_POST["uzytkownik"]) && isset($_POST["typ_uzytkownika"]))
	{
		if ($_POST["typ_uzytkownika"] == 1)
		{
			$_POST["alert"] = 'Nie możesz zmienić praw administratora!';
		}
		else
		{
			require_once("baza.php");
			$uzytkownik = bezpieczneDane($db, $_POST["uzytkownik"]);
			$typ_uzytkownika = bezpieczneDane($db, $_POST["typ_uzytkownika"]);

			$q = mysqli_query($db, "SELECT ID_UZYTKOWNIKA, ID_TYP FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$uzytkownik';");
			$q_fetch = mysqli_fetch_assoc($q);
			if ($q_fetch["ID_TYP"] == 1)
			{
				$_POST["alert"] = 'Nie możesz zmienić praw administratora!';
			}
			else
			{
				$update = mysqli_query($db, "UPDATE UZYTKOWNICY SET ID_TYP = '$typ_uzytkownika' WHERE ID_UZYTKOWNIKA = '$uzytkownik';");
				if($update)
				{
					$_POST["alert"] = 'Nadano wybrane prawa';
				}
				else
				{
					$_POST["alert"] = 'Błąd';
				}
			}			
		}
	}

?>


<!DOCTYPE html>
<html lang = "pl">
<head>
<?php require_once("include/head.php"); ?>

<script type="text/javascript">
	$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(10, val))) * 27;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}
</script>

<script type="text/javascript">
	$(function() {
    $('span.stars').stars();
});
</script>

<script>
	function pokaz_usuwanie(){
		try{
			document.getElementById("usuwanie").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_usuwanie(){
		try{
			document.getElementById("usuwanie").style.display = "none";
		}	
		catch(ex){
			alert(ex);
		}
	}

	function pokaz_usuwanie_modelu(){
		try{
			document.getElementById("usuwanie_modelu").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_usuwanie_modelu(){
		try{
			document.getElementById("usuwanie_modelu").style.display = "none";
		}	
		catch(ex){
			alert(ex);
		}
	}

	function pokaz_usuwanie_systemu(){
		try{
			document.getElementById("usuwanie_systemu").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_usuwanie_systemu(){
		try{
			document.getElementById("usuwanie_systemu").style.display = "none";
		}	
		catch(ex){
			alert(ex);
		}
	}

	function pokaz_usuwanie_marki(){
		try{
			document.getElementById("usuwanie_marki").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_usuwanie_marki(){
		try{
			document.getElementById("usuwanie_marki").style.display = "none";
		}	
		catch(ex){
			alert(ex);
		}
	}	

	function pokaz_dodawanie_modelu(){
		try{
			document.getElementById("dodawanie_modelu").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_dodawanie_modelu(){
		try{
			document.getElementById("dodawanie_modelu").style.display = "none";
		}
		catch(ex){
			alert(ex);
		}
	}
	function pokaz_dodawanie_systemu(){
		try{
			document.getElementById("dodawanie_systemu").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_dodawanie_systemu(){
		try{
			document.getElementById("dodawanie_systemu").style.display = "none";
		}
		catch(ex){
			alert(ex);
		}
	}
	function pokaz_dodawanie_marki(){
		try{
			document.getElementById("dodawanie_marki").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_dodawanie_marki(){
		try{
			document.getElementById("dodawanie_marki").style.display = "none";
		}
		catch(ex){
			alert(ex);
		}
	}

	function pokaz_prawa(){
		try{
			document.getElementById("nadaj_odbierz").style.display = "block";
		}
		catch(ex){
			alert(ex);
		}
	}

	function ukryj_prawa(){
		try{
			document.getElementById("nadaj_odbierz").style.display = "none";
		}
		catch(ex){
			alert(ex);
		}
	}
</script>

</head>
<body>
	<?php require_once("include/bar_zalogowany.php"); ?>
<div class="container" id="container">


	<?php 
		if(isset($_COOKIE["typ_uzyt"]))
		{
			$typ_uzytkownika = bezpieczneDane($db, $_COOKIE["typ_uzyt"]);
		}

		if($typ_uzytkownika == 1 || $typ_uzytkownika == 2 || $typ_uzytkownika == 3)
		{			
			
			//$login = bezpieczneDane($db, $_COOKIE["login"]);
			//$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");
			//$dane = mysqli_fetch_assoc($q);
			$id_sesja = bezpieczneDane($db, $_COOKIE["id"]);
			$q1 = mysqli_query($db, "SELECT * FROM SESJA WHERE ID = '$id_sesja';");
			$dane1 = mysqli_fetch_assoc($q1);
			$id_uzytkownika = $dane1["ID_UZYTKOWNIKA"];
			$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$id_uzytkownika';");
			$dane = mysqli_fetch_assoc($q);
			echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
			echo '<legend><b>Twoje dane profilowe:</b></legend>';
			echo '<label class="pokaz_dane">Login: <b>' . $dane["LOGIN"] . '</b></label></br>'; 
			echo '<label class="pokaz_dane">Mail: <b>' . $dane["MAIL"] . '</b></label></br>'; 
			echo '<label class="pokaz_dane">Imie: <b>' . $dane["IMIE"] . '</b></label></br>';
			echo '<label class="pokaz_dane">Nazwisko: <b>' . $dane["NAZWISKO"] . '</b></label></br>'; 
			echo '<label class="pokaz_dane">Miasto: <b>' . $dane["MIASTO"] . '</b></label></br>';  
			echo '<a href="edycja_danych.php"><input type="button" class="submit" value="Edytuj swoje dane"></a>';
			echo "</fieldset>";

			$oceny = mysqli_query($db, "SELECT OCENY_MODELU.ID_OCENY AS ID_OCENY, OCENY_MODELU.OCENA_SMARTFONA AS OCENA_SMARTFONA, OCENY_MODELU.ILE_KRYTERIOW AS ILE_KRYTERIOW, MARKI.NAZWA_MARKI AS NAZWA_MARKI, MODELE.NAZWA_MODELU AS NAZWA_MODELU FROM OCENY_MODELU, MODELE, MARKI WHERE OCENY_MODELU.ID_MODELU = MODELE.ID_MODELU AND MODELE.ID_MARKI = MARKI.ID_MARKI AND OCENY_MODELU.ID_UZYTKOWNIKA = '$id_uzytkownika';");
			echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
			echo '<legend><b>Twoje oceny:</b></legend>';
			while ($row = mysqli_fetch_array($oceny, MYSQLI_ASSOC))
			{
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend>' . $row["NAZWA_MARKI"] . ' ' . $row["NAZWA_MODELU"] . '</legend>';
				echo '<span class="stars">' . $row["OCENA_SMARTFONA"] . '</span><span style="font-size: 12px;">' . $row["OCENA_SMARTFONA"] . '/10 ocena,  ' . $row["ILE_KRYTERIOW"] . '/9 kryteriów';
				echo '<a href="profile.php?usun_ocene=' . $row["ID_OCENY"] . '"> [usuń ocenę]</a>';
				echo "</fieldset>";		
			}	
			echo "</fieldset>";
			if($typ_uzytkownika == 1 || $typ_uzytkownika == 3)
			{
				echo '<input type="button" class="submit" value="Dodaj model" onclick="pokaz_dodawanie_modelu()">';
				echo '<input type="button" class="submit" value="Dodaj system" onclick="pokaz_dodawanie_systemu()">';
				echo '<input type="button" class="submit" value="Dodaj producenta" onclick="pokaz_dodawanie_marki()"></br>';
				echo '<input type="button" class="submit" value="Usuń użytkownika" onclick="pokaz_usuwanie()">';
				echo '<input type="button" class="submit" value="Usuń model" onclick="pokaz_usuwanie_modelu()">';
				echo '<input type="button" class="submit" value="Usuń system" onclick="pokaz_usuwanie_systemu()">';
				echo '<input type="button" class="submit" value="Usuń producenta" onclick="pokaz_usuwanie_marki()">';


				if(isset($_POST["alert"]))
				{
					echo '</br><span style="color: red; font-size: 15px;">' . $_POST["alert"] . '</span>';
					$_POST["alert"] = "";
				}

				echo '<div id="dodawanie_modelu" style="display: none;">';
				$q = mysqli_query($db, "SELECT * FROM MARKI ORDER BY NAZWA_MARKI;");
				echo '<form method="post">';
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend><b>Dodaj model:</b></legend>';
				echo '<select name="marka", id="marka" required>';
				echo '<option value="" disabled selected>Wybierz Producenta</option>';
				while($marki = mysqli_fetch_assoc($q))
				{
					echo '<option value="'.$marki["ID_MARKI"].'">'. $marki["NAZWA_MARKI"] . '</option>';
				}
				echo '</select>';
				$q2 = mysqli_query($db, "SELECT * FROM SYSTEMY ORDER BY NAZWA_SYSTEMU;");
				echo '<select name="system", id="system" required>';
				echo '<option value="" disabled selected>Wybierz System</option>';
				while($systemy = mysqli_fetch_assoc($q2))
				{
					echo '<option value="'.$systemy["ID_SYSTEMU"].'">'. $systemy["NAZWA_SYSTEMU"] . '</option>';
				}
				echo '</select>';
				echo '<input type="text" name="nazwa_modelu" placeholder="Podaj nazwę modelu" required>';
				echo '<input type="submit" class="submit" value="Dodaj"">';
				echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_dodawanie_modelu()">';
				echo "</fieldset>";
				echo '</form>';
				echo '</div>';

				echo '<div id="dodawanie_systemu" style="display: none;">';
				echo '<form method="post">';
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend><b>Dodaj system:</b></legend>';
				echo '<input type="text" name="nazwa_systemu" placeholder="Podaj nazwę systemu" required>';
				echo '<input type="text" name="tworca" placeholder="Podaj twórcę systemu" required>';
				echo '<input type="submit" class="submit" value="Dodaj"">';
				echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_dodawanie_systemu()">';
				echo '</br>';
				echo '</form>';
				echo '</div>';

				echo '<div id="dodawanie_marki" style="display: none;">';
				echo '<form method="post">';
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend><b>Dodaj producenta:</b></legend>';
				echo '<input type="text" name="nazwa_marki" placeholder="Podaj nazwę producenta" required>';
				echo '<input type="submit" class="submit" value="Dodaj"">';
				echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_dodawanie_marki()">';
				echo '</br>';
				echo '</form>';
				echo '</div>';

				echo '<div id="usuwanie" style="display: none;">';
				$pobierz_uzytkownikow = mysqli_query($db, "SELECT * FROM UZYTKOWNICY;");
				echo '<form method="post">';
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend><b>Usuń użytkownika:</b></legend>';
				echo '<select name="wybierz_uzytkownika", id="wybierz_uzytkownika">';
				echo '<option value="" disabled selected>Wybierz Użytkownika</option>';
				while($result = mysqli_fetch_assoc($pobierz_uzytkownikow))
				{
					echo '<option value="'.$result["ID_UZYTKOWNIKA"].'">'. $result["LOGIN"] . '</option>';
				}
				echo '</select>';
				echo '<input type="submit" class="submit" value="Usuń wybranego"">';
				echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_usuwanie()">';
				echo '</br>';
				echo '</form>';
				echo '</div>';

				echo '<div id="usuwanie_modelu" style="display: none;">';
				$pobierz_modele = mysqli_query($db, "SELECT ID_MODELU, NAZWA_MODELU, MARKI.NAZWA_MARKI AS NAZWA_MARKI FROM MODELE, MARKI WHERE MARKI.ID_MARKI = MODELE.ID_MARKI ORDER BY NAZWA_MARKI;");
				echo '<form method="post">';
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend><b>Usuń model:</b></legend>';
				echo '<select name="wybierz_model", id="wybierz_model">';
				echo '<option value="" disabled selected>Wybierz Model</option>';
				while($result = mysqli_fetch_assoc($pobierz_modele))
				{
					echo '<option value="'.$result["ID_MODELU"].'">'. $result["NAZWA_MARKI"] . ' ' . $result["NAZWA_MODELU"] . '</option>';
				}
				echo '</select>';
				echo '<input type="submit" class="submit" value="Usuń wybranego"">';
				echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_usuwanie_modelu()">';
				echo '</br>';
				echo '</form>';
				echo '</div>';

				echo '<div id="usuwanie_systemu" style="display: none;">';
				$pobierz_systemy = mysqli_query($db, "SELECT * FROM SYSTEMY ORDER BY NAZWA_SYSTEMU;");
				echo '<form method="post">';
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend><b>Usuń system:</b></legend>';
				echo '<select name="wybierz_system", id="wybierz_system">';
				echo '<option value="" disabled selected>Wybierz System</option>';
				while($result = mysqli_fetch_assoc($pobierz_systemy))
				{
					echo '<option value="'.$result["ID_SYSTEMU"].'">'. $result["NAZWA_SYSTEMU"] . '</option>';
				}
				echo '</select>';
				echo '<input type="submit" class="submit" value="Usuń wybranego"">';
				echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_usuwanie_systemu()">';
				echo '</br>';
				echo '</form>';
				echo '</div>';

				echo '<div id="usuwanie_marki" style="display: none;">';
				$pobierz_marke = mysqli_query($db, "SELECT * FROM MARKI ORDER BY NAZWA_MARKI;");
				echo '<form method="post">';
				echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
				echo '<legend><b>Usuń producenta:</b></legend>';
				echo '<select name="wybierz_marke", id="wybierz_marke">';
				echo '<option value="" disabled selected>Wybierz Producenta</option>';
				while($result = mysqli_fetch_assoc($pobierz_marke))
				{
					echo '<option value="'.$result["ID_MARKI"].'">'. $result["NAZWA_MARKI"] . '</option>';
				}
				echo '</select>';
				echo '<input type="submit" class="submit" value="Usuń wybranego"">';
				echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_usuwanie_marki()">';
				echo '</br>';
				echo '</form>';
				echo '</div>';

				if ($typ_uzytkownika == 1)
				{
					echo '</br>';
					echo '<input type="button" class="submit" value="Nadaj/Odbierz prawa" onclick="pokaz_prawa()">';

					echo '<div id="nadaj_odbierz" style="display: none;">';
					$q = mysqli_query($db, "SELECT ID_UZYTKOWNIKA, LOGIN, TYP_UZYTKOWNIKA.NAZWA_TYP AS TYP FROM UZYTKOWNICY, TYP_UZYTKOWNIKA WHERE UZYTKOWNICY.ID_TYP = TYP_UZYTKOWNIKA.ID_TYP ORDER BY LOGIN;");
					echo '<form method="post">';
					echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
					echo '<legend><b>Nadaj/Odbierz prawa:</b></legend>';
					echo '<select name="uzytkownik", id="uzytkownik" required>';
					echo '<option value="" disabled selected>Wybierz użytkownika</option>';
					while($uzytkownicy = mysqli_fetch_assoc($q))
					{
						echo '<option value="'.$uzytkownicy["ID_UZYTKOWNIKA"].'">'. $uzytkownicy["LOGIN"] . ' [' . $uzytkownicy["TYP"] . ']</option>';
					}
					echo '</select>';
					$q2 = mysqli_query($db, "SELECT * FROM TYP_UZYTKOWNIKA ORDER BY NAZWA_TYP;");
					echo '<select name="typ_uzytkownika", id="typ_uzytkownika" required>';
					echo '<option value="" disabled selected>Wybierz funkcje</option>';
					while($typy = mysqli_fetch_assoc($q2))
					{
						echo '<option value="'.$typy["ID_TYP"].'">'. $typy["NAZWA_TYP"] . '</option>';
					}
					echo '</select>';
					echo '<input type="submit" class="submit" value="Zmien"">';
					echo '<input type="button" class="submit" value="Anuluj" onclick="ukryj_prawa()">';
					echo '</form>';
					echo '</div>';

				}
			}
		}

	?>
</div>
<?php require_once("include/footer.php"); ?>
</body>
</html>




