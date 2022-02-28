<?php
////////////    TMS     //////////////////
$servername_tms = "localhost";
$username_tms = "root";
$password_tms = "root123456";
$dbname_tms = "tms";


$contms = new mysqli($servername_tms, $username_tms, $password_tms, $dbname_tms);

if ($contms->connect_error) {
    die("Connection failed: " . $contms->connect_error);
} 

////////////    TMS     //////////////////
$servername_ews = "localhost";
$username_ews = "root";
$password_ews = "root123456";
$dbname_ews = "welfare";


//$conews = new mysqli($servername_ews, $username_ews, $password_ews, $dbname_ews);

if ($contms->connect_error) {
    die("Connection failed: " . $contms->connect_error);
} 
////////////    DBMC     //////////////////
$servername_data = "localhost";
$username_data = "root";
$password_data = "root123456";
$dbname_data = "dbmc";


$condbmc = new mysqli($servername_data, $username_data, $password_data, $dbname_data);

if ($condbmc->connect_error) {
    die("Connection failed: " . $condbmc->connect_error);
} 

////////////    HRIS ID     //////////////////

$servername_id = "localhost";
$username_id = "root";
$password_id = "root123456";
$dbname_id = "hris_id";


//$conid = new mysqli($servername_id, $username_id, $password_id, $dbname_id);

if ($conid->connect_error) {
    die("Connection failed: " . $conid->connect_error);
}
?>
