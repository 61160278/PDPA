<?php include "dbconnect.php";?>

<?php
        session_start();     
        $emp_id=$_SESSION["tms_id"];

        $data_no=$_POST['data_no'];
        $emp_ID=$_POST['emp_ID'];
        $reason=$_POST['reason'];
        $delect=$_POST['delect'];
        echo $emp_id;
        print_r($data_no);
        for($i=0; $i<sizeof($data_no); $i++) {
                echo $data_no[$i];
                echo $emp_ID[$i];
                echo $reason[$i];
                echo $delect[$i];
                echo "<br>";
        }
        
        $status=$_POST['data_public_status'];
        $status=1;
        $date = date("Y-m-d");

        $insert  = mysqli_query($condbmc,"INSERT INTO data_public_pdpa (data_public_requester_emp_id, data_public_date, data_public_status, data_department_data_id) 
        VALUES ('$emp_id','$date','$status')");


        $sql = "SELECT data_public_id
		FROM data_public_pdpa ";
	$query = $condbmc->query($sql);
        while($row = $query->fetch_assoc()) {
                $data_public_requester_emp_id = $row["data_public_id"];
        }
        
        if(sizeof($data_no) != 0){
                for($i=0; $i<sizeof($data_no); $i++) {
                        echo $i;
                        $insert  = mysqli_query($condbmc,"INSERT INTO data_employee_pdpa (data_employee_emp_id, data_employee_reason, data_employee_date, data_employee_status, data_employee_data_id) 
                        VALUES ('$data_no[$i]','$reason[$i]','$date','$status','$data_public_requester_emp_id')");
                }
        }else{
                // สร้างอีกตาราง ที่ไม่มีเหตุผล
                $insert  = mysqli_query($condbmc,"INSERT INTO data_department_pdpa (data_department_sectioncode_id, data_department_sectioncode_id, data_department_status, data_department_data_id) 
                VALUES ('$data_no[$i]','$reason[$i]','$date','$status','$data_public_requester_emp_id')");
        }
        
        if (mysqli_affected_rows($condbmc)>0){
                echo '<meta http-equiv=refresh content=0;URL=../INT/public_data.php>';
        } else{
                echo mysqli_error($condbmc);
        }
?>