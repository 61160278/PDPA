<?
include "../ENG/dbconnect.php";
$sql_district = "SELECT * FROM district WHERE Amphur_ID = '".$_POST["ID"]."'";
$query_district = $condbmc->query($sql_district);					
while($row_district = $query_district->fetch_assoc()){
	echo '<option value ="'.$row_district["DISTRICT_ID"].'">'.$row_district["district_name"].'</option>';	
}
?>