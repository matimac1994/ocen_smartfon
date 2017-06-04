<?php
	header("Cache-Control: no-store, no-cache, must-revalidate");  
	header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
	header("Pragma: no-cache");
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

<script>
  	 function change(val){
  	 	$.ajax({
  	 		url: "ajax_model.php",
  	 		type: "post",
  	 		data: {id_marki: val},
  	 		success: function(data){
  	 			$("#model").html(data);
  	 		}
  	 	})
  	 }
</script>

</head>
<body>
	<?php 
		if(isset($_COOKIE["id"]))
		{
			require_once("include/bar_zalogowany.php"); 
		}
		else { require_once("include/bar_niezalogowany.php"); }
	?>
<div class="container" id="container">


<?php
	require_once("baza.php");
	$q = mysqli_query($db, "SELECT * FROM MARKI ORDER BY NAZWA_MARKI;");
	echo '<form method="get">';
	echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
	echo '<legend><b>Wybierz model:</b></legend>';
	echo '<select name="marka", id="marka" onchange="change(this.value)" required>';
	echo '<option value="" disabled selected>Wybierz Producenta</option>';
	while($marki = mysqli_fetch_assoc($q))
	{
		echo '<option value="'.$marki["ID_MARKI"].'">'. $marki["NAZWA_MARKI"] . '</option>';
	}
	echo '</select>';
	echo '</br>';
	echo '<select id="model" name="model" required="required">';
	echo '</select>';
	echo '</br>';
	echo '<input type="submit" class="submit" value="Pokaż">';
	echo "</fieldset>";
	echo '</form>';
	if(isset($_GET["model"]))
	{
		$id_modelu = bezpieczneDane($db, $_GET["model"]);
		$query1 = mysqli_query($db, "SELECT ID_MODELU FROM OCENY_MODELU WHERE ID_MODELU = '$id_modelu';");
		$query1_num_rows = mysqli_num_rows($query1);
		if(!$query1_num_rows)
		{
			echo "Brak ocen tego modelu smartfona!";
		}
		else
		{
			$query2 = mysqli_query($db, "SELECT DISTINCT ROUND((SUM(OCENY_MODELU.OCENA_SMARTFONA)/COUNT(OCENY_MODELU.ID_MODELU)),2) AS OCENA_SMARTFONA, MARKI.NAZWA_MARKI AS NAZWA_MARKI, MODELE.NAZWA_MODELU AS NAZWA_MODELU, COUNT(OCENY_MODELU.ID_MODELU) AS ILE_OCEN, OCENY_MODELU.ID_MODELU AS ID_MODELU FROM OCENY_MODELU, MODELE, MARKI WHERE OCENY_MODELU.ID_MODELU = MODELE.ID_MODELU AND MODELE.ID_MARKI = MARKI.ID_MARKI AND OCENY_MODELU.ID_MODELU = '$id_modelu' GROUP BY ID_MODELU ORDER BY OCENA_SMARTFONA DESC LIMIT 5;");
			$row = mysqli_fetch_assoc($query2);
			echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
			echo '<legend><b>' . $row["NAZWA_MARKI"] . ' ' . $row["NAZWA_MODELU"] . '</b></legend>';
			echo '<fieldset style="width: 50%; margin: auto; border: groove;">';
			echo '<legend>Ocena sumaryczna</legend>';
			echo '<span class="stars">' . $row["OCENA_SMARTFONA"] . '</span><span style="font-size: 12px;">' . $row["OCENA_SMARTFONA"] . '/10 ocena,  ' . $row["ILE_OCEN"] . ' ocen(y)';
			echo "</fieldset>";	
			$query3 = mysqli_query($db, "SELECT OPINIA FROM OCENY_MODELU WHERE ID_MODELU = '$id_modelu';");
			echo '<fieldset style="width: 50%; margin: auto;">';
			echo '<legend>Przykładowe opinie</legend>';
			while ($opinie = mysqli_fetch_array($query3, MYSQLI_ASSOC))
			{
				if(empty($opinie["OPINIA"]))
				{

				}
				else
				{
					$text = htmlentities($opinie["OPINIA"]);
					$text = str_replace( '\n', '</br>',$text);
					$text = str_replace( '\r', '',$text);
					echo '<div style="width: 350px; background-color: white; padding: 5px; margin: auto; margin-top: 5px; word-wrap: break-word;">' . $text . '</div>';
				}

			}	
			echo '</fieldset>';
		}
	}
	?>



</div>
<?php require_once("include/footer.php"); ?>
</body>
</html>