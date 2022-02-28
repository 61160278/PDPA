<?
include "../ENG/dbconnect.php";
$sql_amphur = "SELECT * FROM amphur WHERE Province_ID = '".$_POST["ID"]."'";
$query_amphur = $condbmc->query($sql_amphur);					
while($row_amphur = $query_amphur->fetch_assoc()){
	echo '<option value ="'.$row_amphur["AMPHUR_ID"].'">'.$row_amphur["amphur_name"].'</option>';	
}
?>