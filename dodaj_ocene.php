<?php
	require_once('loggedUtils.php');
?>

<!DOCTYPE html>
<html lang = "pl">
<head>
<?php require_once("include/head.php"); ?>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	 <link rel="stylesheet" href="rating.css" />
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

  	 function model_check(val){
  	 	$.ajax({
  	 		url: "ajax_model.php",
  	 		type: "post",
  	 		data: {id_modelu: val},
  	 		success: function(data){
  	 			$("#ocena_alert").html(data);
  	 		}
  	 	})
  	 }
  	 </script>
</head>
<body>
  <?php require_once("include/bar_zalogowany.php"); ?>
<div class="container" id="container">




<div class="ocena">
<form method="get" action="ocena.php">
<span id="ocena_alert" style="color: red;"></span>
<?php
	require_once("baza.php");
	$q = mysqli_query($db, "SELECT * FROM MARKI ORDER BY NAZWA_MARKI;");

	echo '<select name="marka", id="marka" onchange="change(this.value)" required>';
	echo '<option value="" disabled selected>Wybierz Producenta</option>';
	while($marki = mysqli_fetch_assoc($q))
	{
		echo '<option value="'.$marki["ID_MARKI"].'">'. $marki["NAZWA_MARKI"] . '</option>';
	}
	echo '</select>';
?>
</br>
<select id="model" name="model" required="required" onchange="model_check(this.value)">

</select>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_ekran">
	<legend>Oceń Ekran</legend>	
	<input type="radio" id="star10" name="o_ekran" value="10" /><label class = "full" for="star10" title="Bomba!"></label>
	<input type="radio" id="star9" name="o_ekran" value="9" /><label class = "full" for="star9" title="Rewelacyjny"></label>
	<input type="radio" id="star8" name="o_ekran" value="8" /><label class = "full" for="star8" title="Bardzo dobry"></label>
	<input type="radio" id="star7" name="o_ekran" value="7" /><label class = "full" for="star7" title="Dobry"></label>
	<input type="radio" id="star6" name="o_ekran" value="6" /><label class = "full" for="star6" title="Niezły"></label>
    <input type="radio" id="star5" name="o_ekran" value="5" /><label class = "full" for="star5" title="Średni"></label>
    <input type="radio" id="star4" name="o_ekran" value="4" /><label class = "full" for="star4" title="Ujdzie"></label>
    <input type="radio" id="star3" name="o_ekran" value="3" /><label class = "full" for="star3" title="Słaby"></label>
    <input type="radio" id="star2" name="o_ekran" value="2" /><label class = "full" for="star2" title="Bardzo słaby"></label>
    <input type="radio" id="star1" name="o_ekran" value="1" /><label class = "full" for="star1" title="Tragedia"></label>
</fieldset>	
</div>
</br>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_wyglad">
	<legend>Oceń Wygląd</legend>
	<input type="radio" id="star10-1" name="o_wyglad" value="10" /><label class = "full" for="star10-1" title="Bomba!"></label>
	<input type="radio" id="star9-1" name="o_wyglad" value="9" /><label class = "full" for="star9-1" title="Rewelacja"></label>
	<input type="radio" id="star8-1" name="o_wyglad" value="8" /><label class = "full" for="star8-1" title="Bardzo dobry"></label>
	<input type="radio" id="star7-1" name="o_wyglad" value="7" /><label class = "full" for="star7-1" title="Dobry"></label>
	<input type="radio" id="star6-1" name="o_wyglad" value="6" /><label class = "full" for="star6-1" title="Niezły"></label>	
    <input type="radio" id="star5-1" name="o_wyglad" value="5" /><label class = "full" for="star5-1" title="Średni"></label>
    <input type="radio" id="star4-1" name="o_wyglad" value="4" /><label class = "full" for="star4-1" title="Ujdzie"></label>
    <input type="radio" id="star3-1" name="o_wyglad" value="3" /><label class = "full" for="star3-1" title="Słaby"></label>
    <input type="radio" id="star2-1" name="o_wyglad" value="2" /><label class = "full" for="star2-1" title="Bardzo słaby"></label>
    <input type="radio" id="star1-1" name="o_wyglad" value="1" /><label class = "full" for="star1-1" title="Tragedia"></label>
</fieldset>	
</div>
</br>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_bateria">
	<legend>Oceń Baterię</legend>
    <input type="radio" id="star10-2" name="o_bateria" value="10" /><label class = "full" for="star10-2" title="Bomba!"></label>
	<input type="radio" id="star9-2" name="o_bateria" value="9" /><label class = "full" for="star9-2" title="Rewelacja"></label>
	<input type="radio" id="star8-2" name="o_bateria" value="8" /><label class = "full" for="star8-2" title="Bardzo dobry"></label>
	<input type="radio" id="star7-2" name="o_bateria" value="7" /><label class = "full" for="star7-2" title="Dobry"></label>
	<input type="radio" id="star6-2" name="o_bateria" value="6" /><label class = "full" for="star6-2" title="Niezły"></label>	
    <input type="radio" id="star5-2" name="o_bateria" value="5" /><label class = "full" for="star5-2" title="Średni"></label>
    <input type="radio" id="star4-2" name="o_bateria" value="4" /><label class = "full" for="star4-2" title="Ujdzie"></label>
    <input type="radio" id="star3-2" name="o_bateria" value="3" /><label class = "full" for="star3-2" title="Słaby"></label>
    <input type="radio" id="star2-2" name="o_bateria" value="2" /><label class = "full" for="star2-2" title="Bardzo słaby"></label>
    <input type="radio" id="star1-2" name="o_bateria" value="1" /><label class = "full" for="star1-2" title="Tragedia"></label>
</fieldset>
</div>
</br>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_cena_jakosc">
	<legend>Oceń Cena/Jakość</legend>
    <input type="radio" id="star10-3" name="o_cena_jakosc" value="10" /><label class = "full" for="star10-3" title="Bomba!"></label>
	<input type="radio" id="star9-3" name="o_cena_jakosc" value="9" /><label class = "full" for="star9-3" title="Rewelacja"></label>
	<input type="radio" id="star8-3" name="o_cena_jakosc" value="8" /><label class = "full" for="star8-3" title="Bardzo dobry"></label>
	<input type="radio" id="star7-3" name="o_cena_jakosc" value="7" /><label class = "full" for="star7-3" title="Dobry"></label>
	<input type="radio" id="star6-3" name="o_cena_jakosc" value="6" /><label class = "full" for="star6-3" title="Niezły"></label>	
    <input type="radio" id="star5-3" name="o_cena_jakosc" value="5" /><label class = "full" for="star5-3" title="Średni"></label>
    <input type="radio" id="star4-3" name="o_cena_jakosc" value="4" /><label class = "full" for="star4-3" title="Ujdzie"></label>
    <input type="radio" id="star3-3" name="o_cena_jakosc" value="3" /><label class = "full" for="star3-3" title="Słaby"></label>
    <input type="radio" id="star2-3" name="o_cena_jakosc" value="2" /><label class = "full" for="star2-3" title="Bardzo słaby"></label>
    <input type="radio" id="star1-3" name="o_cena_jakosc" value="1" /><label class = "full" for="star1-3" title="Tragedia"></label>
</fieldset>
</div>
</br>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_wytrzymalosc">
	<legend>Oceń Wytrzymałość</legend>
    <input type="radio" id="star10-4" name="o_wytrzymalosc" value="10" /><label class = "full" for="star10-4" title="Bomba!"></label>
	<input type="radio" id="star9-4" name="o_wytrzymalosc" value="9" /><label class = "full" for="star9-4" title="Rewelacja"></label>
	<input type="radio" id="star8-4" name="o_wytrzymalosc" value="8" /><label class = "full" for="star8-4" title="Bardzo dobry"></label>
	<input type="radio" id="star7-4" name="o_wytrzymalosc" value="7" /><label class = "full" for="star7-4" title="Dobry"></label>
	<input type="radio" id="star6-4" name="o_wytrzymalosc" value="6" /><label class = "full" for="star6-4" title="Niezły"></label>	
    <input type="radio" id="star5-4" name="o_wytrzymalosc" value="5" /><label class = "full" for="star5-4" title="Średni"></label>
    <input type="radio" id="star4-4" name="o_wytrzymalosc" value="4" /><label class = "full" for="star4-4" title="Ujdzie"></label>
    <input type="radio" id="star3-4" name="o_wytrzymalosc" value="3" /><label class = "full" for="star3-4" title="Słaby"></label>
    <input type="radio" id="star2-4" name="o_wytrzymalosc" value="2" /><label class = "full" for="star2-4" title="Bardzo słaby"></label>
    <input type="radio" id="star1-4" name="o_wytrzymalosc" value="1" /><label class = "full" for="star1-4" title="Tragedia"></label>
</fieldset>
</div>
</br>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_aparat">
	<legend>Oceń Aparat</legend>
    <input type="radio" id="star10-5" name="o_aparat" value="10" /><label class = "full" for="star10-5" title="Bomba!"></label>
	<input type="radio" id="star9-5" name="o_aparat" value="9" /><label class = "full" for="star9-5" title="Rewelacja"></label>
	<input type="radio" id="star8-5" name="o_aparat" value="8" /><label class = "full" for="star8-5" title="Bardzo dobry"></label>
	<input type="radio" id="star7-5" name="o_aparat" value="7" /><label class = "full" for="star7-5" title="Dobry"></label>
	<input type="radio" id="star6-5" name="o_aparat" value="6" /><label class = "full" for="star6-5" title="Niezły"></label>	
    <input type="radio" id="star5-5" name="o_aparat" value="5" /><label class = "full" for="star5-5" title="Średni"></label>
    <input type="radio" id="star4-5" name="o_aparat" value="4" /><label class = "full" for="star4-5" title="Ujdzie"></label>
    <input type="radio" id="star3-5" name="o_aparat" value="3" /><label class = "full" for="star3-5" title="Słaby"></label>
    <input type="radio" id="star2-5" name="o_aparat" value="2" /><label class = "full" for="star2-5" title="Bardzo słaby"></label>
    <input type="radio" id="star1-5" name="o_aparat" value="1" /><label class = "full" for="star1-5" title="Tragedia"></label>
</fieldset>
</div>
</br>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_oprogramowanie">
	<legend>Oceń Oprogramowanie</legend>
    <input type="radio" id="star10-6" name="o_oprogramowanie" value="10" /><label class = "full" for="star10-6" title="Bomba!"></label>
	<input type="radio" id="star9-6" name="o_oprogramowanie" value="9" /><label class = "full" for="star9-6" title="Rewelacja"></label>
	<input type="radio" id="star8-6" name="o_oprogramowanie" value="8" /><label class = "full" for="star8-6" title="Bardzo dobry"></label>
	<input type="radio" id="star7-6" name="o_oprogramowanie" value="7" /><label class = "full" for="star7-6" title="Dobry"></label>
	<input type="radio" id="star6-6" name="o_oprogramowanie" value="6" /><label class = "full" for="star6-6" title="Niezły"></label>	
    <input type="radio" id="star5-6" name="o_oprogramowanie" value="5" /><label class = "full" for="star5-6" title="Średni"></label>
    <input type="radio" id="star4-6" name="o_oprogramowanie" value="4" /><label class = "full" for="star4-6" title="Ujdzie"></label>
    <input type="radio" id="star3-6" name="o_oprogramowanie" value="3" /><label class = "full" for="star3-6" title="Słaby"></label>
    <input type="radio" id="star2-6" name="o_oprogramowanie" value="2" /><label class = "full" for="star2-6" title="Bardzo słaby"></label>
    <input type="radio" id="star1-6" name="o_oprogramowanie" value="1" /><label class = "full" for="star1-6" title="Tragedia"></label>
</fieldset>
</div>
</br>
<div class="rating_stars" id="rating_stars">
<fieldset class="rating" id="id_o_dodatki">
	<legend>Oceń Dodatki</legend>
    <input type="radio" id="star10-7" name="o_dodatki" value="10" /><label class = "full" for="star10-7" title="Bomba!"></label>
	<input type="radio" id="star9-7" name="o_dodatki" value="9" /><label class = "full" for="star9-7" title="Rewelacja"></label>
	<input type="radio" id="star8-7" name="o_dodatki" value="8" /><label class = "full" for="star8-7" title="Bardzo dobry"></label>
	<input type="radio" id="star7-7" name="o_dodatki" value="7" /><label class = "full" for="star7-7" title="Dobry"></label>
	<input type="radio" id="star6-7" name="o_dodatki" value="6" /><label class = "full" for="star6-7" title="Niezły"></label>	
    <input type="radio" id="star5-7" name="o_dodatki" value="5" /><label class = "full" for="star5-7" title="Średni"></label>
    <input type="radio" id="star4-7" name="o_dodatki" value="4" /><label class = "full" for="star4-7" title="Ujdzie"></label>
    <input type="radio" id="star3-7" name="o_dodatki" value="3" /><label class = "full" for="star3-7" title="Słaby"></label>
    <input type="radio" id="star2-7" name="o_dodatki" value="2" /><label class = "full" for="star2-7" title="Bardzo słaby"></label>
    <input type="radio" id="star1-7" name="o_dodatki" value="1" /><label class = "full" for="star1-7" title="Tragedia"></label>
</fieldset>
</div>
<fieldset style="	border:none; 
					padding: 5px;
  					height:100%;
  					width: 100%;
  					margin: auto;">
	<legend>Czy polecasz ten smartfon</legend>
	<input type="radio" id="czy_polecasz_tak" name="czy_polecasz" value="1" /><label>TAK</label>
    <input type="radio" id="czy_polecasz_nie" name="czy_polecasz" value="0" /><label>NIE</label>
</fieldset>
<fieldset>
	<legend>Podaj datę zakupu smartfona</legend>
	<input type="date" id="data_zakupu" name="data_zakupu" min="2000-01-01" required="required" />
</fieldset>
<fieldset>
	<legend>Napisz krótką opinię:</legend>
	<textarea name="opinia" cols="50" rows="8" placeholder maxlength="1000"  style="width: 75%;"></textarea></br>
</fieldset>

    <input type="submit" name="cos" class="submit">
</fieldset>

</form>
</div>

<script>
	$(function(){
	    var dtToday = new Date();

	    var month = dtToday.getMonth() + 1;
	    var day = dtToday.getDate();
	    var year = dtToday.getFullYear();

	    if(month < 10)
	        month = '0' + month.toString();
	    if(day < 10)
	        day = '0' + day.toString();

	    var maxDate = year + '-' + month + '-' + day;    
	    $('#data_zakupu').attr('max', maxDate);
	});
</script>
</div>
<?php require_once("include/footer.php"); ?>
</body>
</html>


