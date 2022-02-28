<?php
////////////    DBMC     //////////////////
$servername_data = "localhost";
$username_data = "root";
$password_data = "root123456";
$dbname_data = "dbmc";


$condbmc = mysqli_connect($servername_data, $username_data, $password_data,$dbname_data);

if (!$condbmc) {
    die("Connection failed: " . mysqli_connect_error());
} 
// else{
//     echo "connect sucsess";       
// }

////////////    TMS     //////////////////
// $servername_tms = "localhost";
// $username_tms = "root";
// $password_tms = "root123456";
// $dbname_tms = "tms";


// $contms = new mysqli($servername_tms, $username_tms, $password_tms, $dbname_tms);

// if ($contms->connect_error) {
//     die("Connection failed: " . $contms->connect_error);
// } 
?>