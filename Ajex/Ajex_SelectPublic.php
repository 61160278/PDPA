<?
include "../ENG/dbconnect.php";
$temp = [];
for ($i=0; $i<sizeof($_POST["get_emp"]); $i++){
    $sql_employee = "SELECT * FROM employee WHERE Emp_ID = '".$_POST["get_emp"][$i]."'";
    $query_employee = $condbmc->query($sql_employee);
    foreach ($query_employee as $index => $row){
        array_push($temp, $row);
    }
}

// while(){}
// var_dump($query_employee->fetch_assoc()); //แสดงค่าแล้วหยุดการทำงานบรรทัดนั้น ดีบัก
// print_r($query_employee->fetch_assoc()); //แสดงค่าที่ต้องการเลย
$i = 0;
foreach ($temp as $index => $row_employee){
    // ต่อสติง tr td เอาไปยัดไว้ในตารางก่อนหน้า
    $table = "<tr class='row-information'>";
    $table .= "<td align='center'>".($index+1)."</td>";
    $table .= "<td align='center' id='emp_".$index."'>".$row_employee["Emp_ID"]."</td>";
    $table .= "<td>".$row_employee["Empname_engTitle"]." ".$row_employee["Empname_eng"]." ".$row_employee["Empsurname_eng"]."</td>";
    $table .= "<td>".$_POST["get_res"][$index]."</td>";
    $table .= "<td align='center'>"."<button class='delete-row' type='button'>"."<i class='fa fa-trash'>"."</i>"."</button>"."</td></tr>";
    echo $table;
    $i++;
}
?>