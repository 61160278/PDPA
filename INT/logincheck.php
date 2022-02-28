<?php
session_start();
include "dbconnect.php";
$empid = $_POST["empid"];
$sqlemp = "SELECT * FROM employee WHERE Emp_ID = '".$empid."'";
			$queryemp = $condbmc->query($sqlemp);
			$rowemp = $queryemp->fetch_assoc();
            $_SESSION["tms_id"] = $empid;
            $_SESSION["tms_name"] = $rowemp["Empname_engTitle"]." ".$rowemp["Empname_eng"]."  ".$rowemp["Empsurname_eng"];

echo '<meta http-equiv=refresh content=0;URL=home_user.php>';


?>