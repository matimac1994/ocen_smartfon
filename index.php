<?php
	header("Cache-Control: no-store, no-cache, must-revalidate");  
	header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
	header("Pragma: no-cache");

	if(isset($_COOKIE["id"]))
		header("Location: zalogowany.php");
	setcookie("blad_logowania", '', time()-3600);
	setcookie("przywitanie", '', time()-3600);
?>

<!DOCTYPE html>
<html lang = "pl">
<head>
	<?php require_once("include/head.php"); ?>

<style>
span.stars, span.stars span {
    display: block;
    background: url(gwiazdki.png) 0 -26px repeat-x;
    width: 270px;
    height: 26px;
}

span.stars span {
    background-position: 0 0;
}
</style>

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

</head>
<body>
	<?php require_once("include/bar_niezalogowany.php"); ?>
<div class="container" id="container">

	<?php
		if(isset($_COOKIE["przywitanie"]))
        {	echo "Zarejestrowano pomyślnie jako: <b>".htmlentities($_COOKIE["przywitanie"])."</b></br>";
            unset($_COOKIE["przywitanie"]);
        }
	?>
<div id="main-page">
	<div class="tresc_index">
		<h1>Witaj na stronie OCEŃ-SMARTFON.PL</h1>
		<h2>Ile smartfonów tyle opini</h2>
		<h3>Zobacz jakie oceny ma smartfon którym się interesujesz</h3>
		<h3>Sam oceń smartfony, które posiadałeś!</h3>
	</div>
</div>
<?php
	require_once("baza.php");
	$oceny = mysqli_query($db, "SELECT OCENA_SMARTFONA, DATA_OCENY, NAZWA_MARKI, NAZWA_MODELU FROM POKAZ_OCENY_DATA;");
	echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
	echo '<legend><b>Ostanio oceniane smartfony:</b></legend>';
	while ($row = mysqli_fetch_array($oceny, MYSQLI_ASSOC))
	{
		echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
		echo '<legend>' . $row["NAZWA_MARKI"] . ' ' . $row["NAZWA_MODELU"] . '</legend>';
		echo '<span class="stars">' . $row["OCENA_SMARTFONA"] . '</span><span style="font-size: 12px;">' . $row["OCENA_SMARTFONA"] . '/10,  dnia: ' . $row["DATA_OCENY"];
		echo "</fieldset>";		
	}	
	echo "</fieldset>";

?>
<div id="push"></div>
</div>
	<?php 	require_once("include/footer.php");?>
</body>
</html>


