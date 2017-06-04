 <?php
ob_start();
mysqli_report(MYSQLI_REPORT_STRICT);
	require_once('dane_bazy.php');

    try
    {
        $db = @new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($db->connect_errno) {
            throw new Exception(mysqli_connect_errno());
            echo "ERROR: " . $db->connect_errno;
            exit();
        }
        else {
            if (!$db->set_charset("utf8")) {
                printf("Error loading character set utf8: %s\n", $db->error);
                exit();
            }   
        }
    }
    catch (Exception $e)
    {
        echo "błąd połączenia z bazą danych </br>";
        exit();
    }
	

	
    function bezpieczneDane($baza, $value)
    {
        $data = $value;
        $data = addslashes($value);
        $data = htmlentities($value,ENT_QUOTES, "UTF-8");
        $data = mysqli_real_escape_string($baza, $value);
        return $data;
    }
ob_end_flush();
?>
