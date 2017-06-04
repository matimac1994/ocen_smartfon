<?php 

	require_once( 'baza.php' );

	$login = bezpieczneDane($db, $_POST['login']);
    $password = bezpieczneDane($db, $_POST['password']);
    $id_serv = bezpieczneDane($db, $_SERVER['REMOTE_ADDR']);
    $id_http = $_SERVER['HTTP_USER_AGENT'];

    mysqli_query($db, "DELETE FROM PROBYLOGOWANIA WHERE TIMESTAMPDIFF(MINUTE, CZAS, CURRENT_TIMESTAMP) > 10;");
    $zm = mysqli_query($db,"SELECT * FROM PROBYLOGOWANIA WHERE LOGIN = '$login' AND IP = '$id_serv' AND TIMESTAMPDIFF(MINUTE,CZAS,CURRENT_TIMESTAMP) < 10;");
    $zmFetch = mysqli_fetch_assoc($zm);
    $zm->free();
    $zm = mysqli_query($db,"SELECT * FROM PROBYLOGOWANIA WHERE IP = '$id_serv' AND TIMESTAMPDIFF(MINUTE,CZAS,CURRENT_TIMESTAMP) < 10;");
    $zmFetch_IP = mysqli_fetch_assoc($zm);
    $zm->free();
    if($zmFetch['BLOKADA'] == 1 || $zmFetch_IP['BLOKADA'] == 1)
    {
        setcookie("blad_logowania", 'Zbyt wiele błędnych prób logowania! Spróbuj ponownie za 10 minut', time() + 3600);
        header('Location: zaloguj.php');
        exit();
    }

    $q = mysqli_query($db,"SELECT * FROM UZYTKOWNICY WHERE LOGIN = '$login';");

    if(mysqli_num_rows($q) == 1){
    	$tabl = mysqli_fetch_assoc($q);
        if(password_verify($password, $tabl['HASLO']))
        {
            $id = sha1(rand(-1000, 1000).time().$_SERVER['REMOTE_ADDR']);
            $id_uzyt = $tabl['ID_UZYTKOWNIKA'];
            $typ_uzyt = $tabl['ID_TYP'];

            mysqli_query($db, "DELETE FROM SESJA WHERE ID_UZYTKOWNIKA = '$id_uzyt';");  
            mysqli_query($db, "DELETE FROM PROBYLOGOWANIA WHERE LOGIN = '$login';");

            mysqli_query($db, "INSERT INTO SESJA (ID_UZYTKOWNIKA, ID, IP, WEB, TYP_UZYT) 
                               VALUES ('$id_uzyt','$id','$id_serv','$id_http', '$typ_uzyt');");
            if (! mysqli_errno($db))
            {
                setcookie("id", $id);
                setcookie("login", $login); 
                setcookie("typ_uzyt", $typ_uzyt);               
                header("Location: zalogowany.php");
            } 
            else 
            {
                if (!isset($_COOKIE['blad_logowania']))
                {
                    setcookie("blad_logowania", 'Poblem z łączeniem z bazą danych!', time() + 3600);
                    header('Location: zaloguj.php');
                    exit();
                }
            }
    
        } 
        else {
                mysqli_query($db, "INSERT INTO PROBYLOGOWANIA (LOGIN, IP)
                                    VALUES ('$login', '$id_serv')"); 

                $sprawdz = mysqli_query($db,"SELECT count(ID) AS ILE FROM PROBYLOGOWANIA WHERE LOGIN = '$login' AND IP = '$id_serv';");
                $spr = mysqli_fetch_assoc($sprawdz);
                $sprawdz->free();
                $sprawdz = mysqli_query($db,"SELECT count(IP) AS ILE_IP FROM PROBYLOGOWANIA WHERE IP = '$id_serv';");
                $spr_ip = mysqli_fetch_assoc($sprawdz);
                $sprawdz->free();
                if($spr['ILE'] > 4)
                {
                    mysqli_query($db, "UPDATE PROBYLOGOWANIA SET BLOKADA = 1 WHERE LOGIN = '$login';");

                }
                else if($spr_ip['ILE_IP'] > 4)
                {
                    mysqli_query($db, "UPDATE PROBYLOGOWANIA SET BLOKADA = 1 WHERE IP = '$id_serv';");
                }

            if (!isset($_COOKIE['blad_logowania']))
            {
                setcookie("blad_logowania", 'Nieprawidłowy login lub hasło!', time() + 3600);
                header('Location: zaloguj.php');
                exit();
            }
        }
    }
    else {
            mysqli_query($db, "INSERT INTO PROBYLOGOWANIA (LOGIN, IP)
                                VALUES ('$login', '$id_serv')");

            $sprawdz = mysqli_query($db,"SELECT count(ID) AS ILE FROM PROBYLOGOWANIA WHERE LOGIN = '$login' AND IP = '$id_serv';");
            $spr = mysqli_fetch_assoc($sprawdz);
            $sprawdz->free();
            $sprawdz = mysqli_query($db,"SELECT count(IP) AS ILE_IP FROM PROBYLOGOWANIA WHERE IP = '$id_serv';");
            $spr_ip = mysqli_fetch_assoc($sprawdz);
            $sprawdz->free();
            if($spr['ILE'] > 4)
            {
                mysqli_query($db, "UPDATE PROBYLOGOWANIA SET BLOKADA = 1 WHERE LOGIN = '$login';");

            }
            else if($spr_ip['ILE_IP'] > 4)
            {
                mysqli_query($db, "UPDATE PROBYLOGOWANIA SET BLOKADA = 1 WHERE IP = '$id_serv';");
            }

            if (!isset($_COOKIE['blad_logowania']))
            {
                setcookie("blad_logowania", 'Nieprawidłowy login lub hasło!', time() + 3600);
                header('Location: zaloguj.php');
                exit();
            }
    }

    $db->close();
?>