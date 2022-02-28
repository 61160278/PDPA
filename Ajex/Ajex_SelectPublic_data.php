<?
include "../ENG/dbconnect.php";
// $sql_employee = "SELECT * FROM employee WHERE Province_ID = '".$_POST["ID"]."'";
$sql_employee = "SELECT * FROM employee WHERE Company_ID = '".$_GET["Company_ID"]."' AND Sectioncode_ID = '".$_GET["Sectioncode_ID"]."'";
$query_employee = $condbmc->query($sql_employee);
// while(){}
// var_dump($query_employee->fetch_assoc()); //แสดงค่าแล้วหยุดการทำงานบรรทัดนั้น ดีบัก
// print_r($query_employee->fetch_assoc()); //แสดงค่าที่ต้องการเลย
$i = 1;
while($row_employee = $query_employee->fetch_assoc()){
    // ต่อสติง tr td เอาไปยัดไว้ในตารางก่อนหน้า
    $table = "<tr>";
    $table .= "<td align='center'>"."<input name='checkbox' type='checkbox'>"."</td>";
    $table .= "<td align='center'>".$row_employee["Emp_ID"]."</td>";
    $table .= "<td>".$row_employee["Empname_engTitle"]." ".$row_employee["Empname_eng"]." ".$row_employee["Empsurname_eng"]."</td>";
    $table .= "<td>"."<textarea class='form-control' name='data1[]' rows='4' required>"."</textarea>"."</td></tr>";
    echo $table;
        // var tr = $("<tr>");
        // tr = tr + "<td>" + $row_employee["Empname_eng"] + "</td>";
	// echo '<option value ="'.$row_employee["Empname_eng"].'">'.$row_employee["Empsurname_eng"].'</option>';	
    // print_r($query_employee->fetch_assoc()); 
}
?>