<?php
	header("Cache-Control: no-store, no-cache, must-revalidate");  
	header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
	header("Pragma: no-cache");

	if(isset($_COOKIE["id"]))
		header("Location: zalogowany.php");
	setcookie("blad_logowania", '', time()-3600);
	setcookie("blad_rejestracja", '', time()-3600);	
?>

<!DOCTYPE html>
<html lang = "pl">
<head>
<?php require_once("include/head.php"); ?>


	<script type="text/javascript">
		$(document).ready(function() {
		    var x_timer;    
		    $("#username").keyup(function (e){
		        clearTimeout(x_timer);
		        var user_name = $(this).val();
		        x_timer = setTimeout(function(){
		            check_login_ajax(user_name);
		        }, 1000);
		    }); 
		    $("#email").keyup(function (e){
		        clearTimeout(x_timer);
		        var email = $(this).val();
		        x_timer = setTimeout(function(){
		            check_mail_ajax(email);
		        }, 1000);
		    }); 

		function check_login_ajax(username){
		    $("#user-result").html('<img src="loading.gif" height="16" width="16" />');
		    $.post('login-checker.php', {'username':username}, function(data) {
		      $("#user-result").html(data);
		    });
		}

		function check_mail_ajax(email){
		    $("#mail-result").html('<img src="loading.gif" height="16" width="16" />');
		    $.post('login-checker.php', {'email':email}, function(data) {
		      $("#mail-result").html(data);
		    });
		}
		});
	</script>

	<script>
		function validateEmail(mail)
		{
		    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
		    {
		        return (true)
		    }
		    return (false)
		}

		function sprawdz_rej(value)
		{
		    var username = document.getElementById('username').value;
		    var password1 = document.getElementById('password1').value;
		    var password2 = document.getElementById('password2').value;
		    var email = document.getElementById('email').value;
		    var imie = document.getElementById('imie').value;
		    var nazwisko = document.getElementById('nazwisko').value;
		    var miasto = document.getElementById('miasto').value;
		    
		    if(value == 1)
		    {
		        if(username.length < 3 || username.length > 100 || !(/\S/.test(username)))
		        {
		            document.getElementById('username_rej').innerHTML = "Login musi zawierać ponad 3 znaki.";
		        }
		        else
		        {
		            document.getElementById('username_rej').innerHTML = "";
		        }
		    }
		    else if(value == 2)
		    {
		        if(password1.length < 5 || password1.length > 300)
		        {
		            document.getElementById('password1_rej').innerHTML = "Hasło musi być dłuższe niż 5 znaków";
		        }
		        else if(password1 != password2)
		        {
		            document.getElementById('password2_rej').innerHTML = "Hasła nie są zgodne.";
		            document.getElementById('password1_rej').innerHTML = "";
		        }
		        else
		        {
		            document.getElementById('password2_rej').innerHTML = "";
		        }
		    }
		    else if(value == 3)
		    {
		    	if(email.length == 0 || email.length > 50 || !validateEmail(email))
		        {
		            document.getElementById('email_rej').innerHTML = "Nieprawidłowy mail.";
		        }
		        else
		        {
		            document.getElementById('email_rej').innerHTML = "";
		        }
		    }
		    else if(value == 4)
		    {
		    	if(imie.length > 100)
		        {
		        	document.getElementById('imie_rej').innerHTML = "Maksymalna długość imienia to 100 znaków.";
		        }
		        else if(nazwisko.length > 100)
		        {
		            document.getElementById('nazwisko_rej').innerHTML = "Maksymalna długość nazwiska to 100 znaków.";
		        }
		        else if(miasto.length > 100)
		        {
		            document.getElementById('miasto_rej').innerHTML = "Maksymalna długość nazwy miasta to 100 znaków.";
		        }
		        else 
		        {
		            document.getElementById('imie-error').innerHTML = "";
		            document.getElementById('nazwisko-error').innerHTML = "";
		            document.getElementById('miasto-error').innerHTML = "";
		        }
		    }
		}
	</script>
</head>
<body>
<?php require_once("include/bar_niezalogowany.php"); ?>
<div class="container" id="container">



	<div id="panel">
		<div class="loginPanel">
			<h1>Masz już konto</h1>
			<h2>Zaloguj się</h2>
			<form id="logowanie" method="post" action="login.php">
				<div>
					<input type="text" name="login" placeholder="Login" maxlength="100" id="login" autofocus="autofocus" required><br>
				</div>
				<div>
				    <input type="password" name="password" placeholder="Hasło" maxlength="300" id="password" required><br>
				</div>
				<div>
			    	<input type="submit" class="submit" value="Zaloguj">	
				</div>
			</form>
			<?php
	            if(isset($_COOKIE["blad_logowania"]))
	            {
	                echo $_COOKIE["blad_logowania"]; 
	                unset($_COOKIE["blad_logowania"]);
	            }
            ?>
		</div>

		<div class="loginPanel">
			<h1>Nie masz jeszcze konta</h1>
			<h2>Załóż je!</h2>
			<form id="rejestracja" method="post" action="rejestracja.php">
				<div class="wyrownaj_form">Login*:</div>
				<input type="text" name="username" placeholder="Login" maxlength="100" id="username" onkeyup="sprawdz_rej(1)" required>
				<span id="user-result"></span><br>
				<div id="username_rej" style="color: red; font-size: 12px;"></div>
	
				<div class="wyrownaj_form">Hasło*:</div>
				<input type="password" name="password1" placeholder="Hasło" maxlength="300" id="password1" class="password_test" onkeyup="sprawdz_rej(2)"required><br>
				<div id="password1_rej" style="color: red; font-size: 12px;"></div>
				<div class="wyrownaj_form">Powtórz Hasło*:</div>
				<input type="password" name="password2" placeholder="Powtórz Hasło" maxlength="300" id="password2" onkeyup="sprawdz_rej(2)" required><br>
				<div id="password2_rej" style="color: red; font-size: 12px;"></div>

				<div class="wyrownaj_form">Email*:</div>
					<input type="email" name="email" placeholder="Email" maxlength="100" id="email" onkeyup="sprawdz_rej(3)" required>
					<span id="mail-result"></span><br>
					<div id="email_rej" style="color: red; font-size: 12px;"></div>
				
				<div class="wyrownaj_form">Imię:</div>
				<input type="text" name="imie" placeholder="Imię" maxlength="100" id="imie" onkeyup="sprawdz_rej(4)"><br>
				<div id="imie_rej" style="color: red; font-size: 12px;"></div>
				
				<div class="wyrownaj_form">Nazwisko:</div>
				<input type="text" name="nazwisko" placeholder="Nazwisko" maxlength="100" id="nazwisko" onkeyup="sprawdz_rej(4)"><br>
				<div id="nazwisko_rej" style="color: red; font-size: 12px;"></div>
				
				<div class="wyrownaj_form">Miasto:</div>
				<input type="text" name="miasto" placeholder="Miasto" maxlength="100" id="miasto" onkeyup="sprawdz_rej(4)"><br>
				<div id="miasto_rej" style="color: red; font-size: 12px;"></div>
				<div>
			    	<input type="submit" class="submit" value="Zarejestruj">	
				</div>
				<p style="font-size: 12px">* - Pola wymagane</p>
			 </form>
			 <?php
		         if(isset($_COOKIE["blad_rejestracja"]))
		         {
	                echo $_COOKIE["blad_rejestracja"]; 
	                unset($_COOKIE["blad_rejestracja"]);
		         }
	         ?>
		</div>
	</div>
</div>
<?php 	require_once("include/footer.php");?>
</body>
</html>


