<?php include "dbconnect.php";?>

<?php
        session_start();     
        $emp_id=$_SESSION["tms_id"];
        $Type_com=$_POST['type_com'];
        $Department=$_POST['department'];
        $Name=$_POST['name'];
        $Emp_id=$_POST['emp_id'];
        $Reason=$_POST['reason'];
        $Bor_date=$_POST['bor_date'];
        $data2=$_POST['data_no'];
        $data3=$_POST['data_name'];
        $data4=$_POST['data_re'];
        $data5=$_POST['data1'];
        $data6=$_POST['data'];
        $status=1;
        
        echo $emp_id;
        print_r($data2);
        for($i=0; $i<sizeof($data2); $i++) {
                echo $data2[$i];
                echo $data3[$i];
                echo $data4[$i];
                echo $data5[$i];
                echo $data6[$i];
                echo $datastatus[$i];
                echo "<br>";
        }
        $Data_item3=$_POST['data_item3'];
        $status=$_POST['status'];
        $status=1;
        $Check=$_POST['A_id'];
        $Acknowledge=$_POST['Acknow_id'];
        $Approve=$_POST['Approve_id'];
        $Comment=$_POST['emp_trv_comment'];
        
        /*$insert  = mysqli_query($condbmc,"INSERT INTO employee_public_data (emp_pub_typ_com, emp_pub_department, emp_pub_name, emp_pub_emp_id,
        emp_pub_reason, emp_pub_bor_date) 
        VALUES ('$Type_com','$Department','$Name','$Emp_id','$Reason','$Bor_date')");
*/

        /*$sql = "SELECT *
			FROM employee
			WHERE employee.Emp_ID = ? ";
	$query = $this->db->query($sql, array($this->Emp_ID));
	return $query->result();*/


        $sql = "SELECT emp_trv_id
		FROM employee_travel ";
	$query = $condbmc->query($sql);
        while($row = $query->fetch_assoc()) {
                $emp_trv_emp_id = $row["emp_trv_id"];
        }
        
        for($i=0; $i<sizeof($data2); $i++) {
                echo $i;
                $insert  = mysqli_query($condbmc,"INSERT INTO borrow (emp_no,reason,date_borrow,date_return,status) 
                VALUES ('$data2[$i]','$data4[$i]','$data5[$i]','$data6[$i]','$status')");
        }
        
        if (mysqli_affected_rows($condbmc)>0){
                echo '<meta http-equiv=refresh content=0;URL=../INT/borrow.php>';
        } else{
                echo mysqli_error($condbmc);
        }
?>