<?php

	require_once('baza.php');
	require_once('loggedUtils.php');

	$id = bezpieczneDane($db, $_COOKIE['id']);

	$q = mysqli_query($db,"SELECT ID_UZYTKOWNIKA FROM SESJA WHERE ID = '$id' AND IP = '$_SERVER[REMOTE_ADDR]' AND WEB = '$_SERVER[HTTP_USER_AGENT]';");
	$tabl = mysqli_fetch_assoc($q);
	$id_uzytkownika = $tabl['ID_UZYTKOWNIKA'];
	$q->free();
	$id_modelu = null;
	if(isset($_GET['model']))
	{
		$id_modelu = bezpieczneDane($db, $_GET['model']);
	}
	$q = mysqli_query($db, "SELECT * FROM OCENY_MODELU WHERE ID_UZYTKOWNIKA='$id_uzytkownika' AND ID_MODELU='$id_modelu';");
	$num_rows = mysqli_num_rows($q);
	if($num_rows)
	{
		setcookie("ocena_modelu", "oceniałeś już ten model, wybierz inny");
		header('Location: zalogowany.php');
		exit();
	}

	$data_zakupu = $o_ekran = $o_wyglad = $o_bateria = $o_cena_jakosc = $o_wytrzymalosc = $o_aparat = $o_oprogramowanie = $o_dodatki = $czy_polecasz = $czy_polecasz_value = $opinia = 0;

	$ile = 0;

	$db->autocommit(FALSE); // to też powoduje START TRANSACTION
    $db->query("SET TRANSACTION ISOLATION LEVEL SEIALIZABLE");

	if(isset($_GET['data_zakupu']))
	{
		$data_zakupu = bezpieczneDane($db, $_GET['data_zakupu']);
	}
	if(isset($_GET['o_ekran']))
	{
		$o_ekran = bezpieczneDane($db, $_GET['o_ekran']);
		$ile++;
	}
	if (isset($_GET['o_wyglad'])) {
		$o_wyglad = bezpieczneDane($db, $_GET['o_wyglad']);
		$ile++;
	}
	if (isset($_GET['o_bateria'])) {
		$o_bateria = bezpieczneDane($db, $_GET['o_bateria']);
		$ile++;
	}
	if (isset($_GET['o_cena_jakosc'])) {
		$o_cena_jakosc = bezpieczneDane($db, $_GET['o_cena_jakosc']);
		$ile++;
	}
	if (isset($_GET['o_wytrzymalosc'])) {
		$o_wytrzymalosc = bezpieczneDane($db, $_GET['o_wytrzymalosc']);
		$ile++;
	}
	if (isset($_GET['o_aparat'])) {
		$o_aparat = bezpieczneDane($db, $_GET['o_aparat']);
		$ile++;
	}
	if (isset($_GET['o_oprogramowanie'])) {
		$o_oprogramowanie = bezpieczneDane($db, $_GET['o_oprogramowanie']);
		$ile++;
	}
	if (isset($_GET['o_dodatki'])) {
		$o_dodatki = bezpieczneDane($db, $_GET['o_dodatki']);
		$ile++;
	}
	if (isset($_GET['czy_polecasz'])) {
		$czy_polecasz = bezpieczneDane($db, $_GET['czy_polecasz']);
		$czy_polecasz_value = $czy_polecasz*10;
		$ile++;
	}
	if(isset($_GET['opinia']))
	{
		$opinia = bezpieczneDane($db, $_GET['opinia']);
	}

	/*Obliczenie sumy i ogólnej oceny smartfona*/
	$suma = $o_ekran + $o_wyglad + $o_bateria + $o_cena_jakosc + $o_wytrzymalosc + $o_aparat + $o_oprogramowanie + $o_dodatki + $czy_polecasz_value;
	if($ile != 0)
	{
		$ocena_smartfona = round($suma / $ile, 2);
		$insert = "INSERT INTO OCENY_MODELU (DATA_OCENY, DATA_ZAKUPU, O_EKRAN, O_WYGLAD, O_BATERIA, O_CENA_JAKOSC, O_WYTRZYMALOSC, O_APARAT, O_OPROGRAMOWANIE, O_DODATKI, CZY_POLECASZ, OPINIA, OCENA_SMARTFONA, ILE_KRYTERIOW, ID_UZYTKOWNIKA, ID_MODELU)
			VALUES (CURRENT_TIMESTAMP, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
		$result = $db->prepare($insert);
		$result->bind_param("sddddddddisdiii", $data_zakupu, $o_ekran, $o_wyglad, $o_bateria, $o_cena_jakosc, $o_wytrzymalosc, $o_aparat, $o_oprogramowanie, $o_dodatki, $czy_polecasz, $opinia, $ocena_smartfona, $ile, $id_uzytkownika, $id_modelu);
		$result->execute();
		if($result)
		{
			$q =  mysqli_query($db, "SELECT * FROM MODELE, MARKI WHERE MODELE.ID_MARKI = MARKI.ID_MARKI AND ID_MODELU='$id_modelu';");
			$fetch = mysqli_fetch_assoc($q);
			setcookie("ocena_modelu", "Dodano ocenę smartfonu: " . $fetch["NAZWA_MARKI"] . " " . $fetch["NAZWA_MODELU"]);
			$db->commit();
			header('Location: zalogowany.php');
			$result->close();
			exit();
		}
		else {
			$db->rollback();
			exit();
		}
	}
	else 
	{
		$ocena_smartfona = null;
		$db->rollback();
		header('Location: zalogowany.php');
	}
?>