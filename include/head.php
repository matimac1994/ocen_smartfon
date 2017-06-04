	 <meta charset="utf-8">
	 <link rel="Shortcut icon" href="logo.png" />
	 <title>Oceń smartfon</title>
	 <meta name="description" content="ocen-smartfon.pl Oceń posiadane telefony zobacz co sądzą o nich inni konsumenci." />
	 <meta name="keywords" content="oceń, smartfon, oceń smartfon, telefon, telefony," />
	 <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	 <link rel="stylesheet" href="style.css" />
	 <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		 function setCookie(cname, cvalue, exdays) {
	   		var d = new Date();
		    d.setTime(d.getTime() + (exdays*24*60*60*1000));
		    var expires = "expires="+d.toUTCString();
		    document.cookie = cname + "=" + cvalue + "; " + expires;
		}

		function akceptuj_cookies(){
		    setCookie("akceptacja_cookies","set",365);
		    document.getElementById("cookies").style.display = "none";
		}
	</script>
	<noscript>
		<p style="text-align: center; font-weight: bold; margin: 0 auto; display: block; position: fixed; top: 30%; background-color: #306BAC; width: 100%; height: 100px; padding-top: 50px; z-index: 999;">Twój JavaScript jest wyłączony. <br/>
    	Włącz go jeżeli chcesz korzystać z pełnej funkcjonalności strony!</p>
	</noscript>
	<style>
		#cookies{
			width: 50%;
			position: fixed;
			background-color: black;
			text-align: center;
			margin-left: 25%;
			height: 50px;
			color: white;
			opacity: 0.7;
			font-size: 20px;
			cursor: default;
			bottom: 0;
		}
	</style>