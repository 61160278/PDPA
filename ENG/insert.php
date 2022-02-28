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
        echo $emp_id;
        print_r($data2);
        for($i=0; $i<sizeof($data2); $i++) {
                echo $data2[$i];
                echo $data3[$i];
                echo $data4[$i];
                echo $data5[$i];
                echo $data6[$i];
                echo $data8[$i];
                echo "<br>";
        }
        $Data_item3=$_POST['data_item3'];
        $status=$_POST['emp_trv_status'];
        $status=1;
        $Check=$_POST['A_id'];
        $Acknowledge=$_POST['Acknow_id'];
        $Approve=$_POST['Approve_id'];
        $Comment=$_POST['emp_trv_comment'];
        
        $insert  = mysqli_query($condbmc,"INSERT INTO employee_public_data (emp_pub_typ_com, emp_pub_department, emp_pub_name, emp_pub_emp_id,
        emp_pub_reason, emp_pub_bor_date) 
        VALUES ('$Type_com','$Department','$Name','$Emp_id','$Reason','$Bor_date')");

        $sql = "SELECT emp_trv_id
		FROM employee_travel ";
	$query = $condbmc->query($sql);
        while($row = $query->fetch_assoc()) {
                $emp_trv_emp_id = $row["emp_trv_id"];
        }
        
        for($i=0; $i<sizeof($data2); $i++) {
                echo $i;
                $insert  = mysqli_query($condbmc,"INSERT INTO schedule_table (scd_date, scd_place, scd_description,
                scd_remarks, scd_trv_id, scd_calender, scd_define) 
                VALUES ('$data2[$i]','$data4[$i]','$data5[$i]','$data8[$i]','$emp_trv_emp_id','$data3[$i]','$data6[$i]')");
        }
        
        if (mysqli_affected_rows($condbmc)>0){
                echo '<meta http-equiv=refresh content=0;URL=../INT/home_user.php>';
        } else{
                echo mysqli_error($condbmc);
        }
?>