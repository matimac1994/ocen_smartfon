<?php
	require_once("baza.php");

	if (isset($_POST['id_marki']) && !empty($_POST['id_marki']))
	{
		$id_marki = bezpieczneDane($db, $_POST['id_marki']); 
		$query = "SELECT * FROM MODELE WHERE ID_MARKI = '$id_marki' ORDER BY NAZWA_MODELU;";
		$result = mysqli_query($db, $query);
		echo '<option value="" disabled selected>Wybierz Model</option>';
		/*
		foreach ($result as $model) {
			
			echo '<option value="' . $model["ID_MODELU"] .'">' . $model["NAZWA_MODELU"] . '</option>';
		}*/
		while($model = mysqli_fetch_assoc($result))
		{
			echo '<option value="'.$model["ID_MODELU"].'">'. $model["NAZWA_MODELU"] . '</option>';
		}
	}
	else if(isset($_POST['id_modelu']) && !empty($_POST['id_modelu']))
	{	
		if(isset($_COOKIE['id']))
		{
			$id = bezpieczneDane($db, $_COOKIE['id']);

			$q = mysqli_query($db,"SELECT ID_UZYTKOWNIKA FROM SESJA WHERE ID = '$id' AND IP = '$_SERVER[REMOTE_ADDR]' AND WEB = '$_SERVER[HTTP_USER_AGENT]';");
			$tabl = mysqli_fetch_assoc($q);
			$id_uzytkownika = $tabl['ID_UZYTKOWNIKA'];
			$q->free();
		}
		
		else {$id_uzytkownika = null;}
		$id_modelu = bezpieczneDane($db, $_POST["id_modelu"]);

		$q = "SELECT * FROM OCENY_MODELU WHERE ID_MODELU = '$id_modelu' AND ID_UZYTKOWNIKA = '$id_uzytkownika';";
		$result = mysqli_query($db, $q);
		if (mysqli_num_rows($result))
		{
			echo "Oceniałeś już ten model, wybierz inny! </br>";
		}
	}
?>