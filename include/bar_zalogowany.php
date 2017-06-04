	<?php if(!isset($_COOKIE['akceptacja_cookies'])){
	?>
	<div id="cookies" onclick="akceptuj_cookies()" style="position: fixed; z-index: 99;">
	    Ta strona wykorzystuje pliki cookies. Kliknij 
	    tutaj, aby zamknąć banner.
	</div>  
	<?php
	}
	?>

<div class="mainBar">
		<a href="index.php">
			<div id="logo">
				<img src="logo_ocen_smartfon_white.png" alt="Oceń-smartfon.pl" width="420px" height="60px">
			</div>
		</a>
		<div id="barInfo">
			<font size="1">Zalogowany jako: </br></font><b><a href="profile.php" class="profile"><?php 
				require_once("baza.php");
				$id_sesja = bezpieczneDane($db, $_COOKIE["id"]);
				$q1 = mysqli_query($db, "SELECT * FROM SESJA WHERE ID = '$id_sesja';");
				$dane1 = mysqli_fetch_assoc($q1);
				$id_uzytkownika = $dane1["ID_UZYTKOWNIKA"];
				$q = mysqli_query($db, "SELECT * FROM UZYTKOWNICY WHERE ID_UZYTKOWNIKA = '$id_uzytkownika';");
				$dane = mysqli_fetch_assoc($q);
				echo htmlentities($dane["LOGIN"]);?></a></b></br>
			<font size="2"><a href="wyloguj.php" class="logout">Wyloguj</a></font>
		</div>
		<div class="nav">
			<a href="dodaj_ocene.php">
				<div id="barZaloguj">
				Oceń smartfon
				</div>
			</a>
		</div>
		<div class="nav">
			<a href="zobacz_oceny.php">
				<div id="barZaloguj">
				Zobacz oceny
				</div>
			</a>
		</div>
		<div class="nav">
			<a href="zobacz_opinie.php">
				<div id="barZaloguj">
				Zobacz opinie
				</div>
			</a>
		</div>		
</div>
