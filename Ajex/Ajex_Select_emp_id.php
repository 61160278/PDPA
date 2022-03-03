<?
include "../ENG/dbconnect.php";

$sql_employee = "SELECT * FROM employee 
                WHERE Emp_ID = '".$_POST["Emp_id"]."'" ;
$query_employee = $condbmc->query($sql_employee);
//print_r($query_employee->fetch_assoc());

foreach($query_employee as $row){
 $name = $row['Empname_eng']." ".$row["Empsurname_eng"];
}
//echo $name;
echo json_encode($name);
?>