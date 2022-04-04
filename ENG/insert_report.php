<?php include "dbconnect.php";?>

<?php
        session_start();     
        $emp_id=$_SESSION["tms_id"];


        $data_no=$_POST['data_no'];
        $emp_ID=$_POST['emp_ID'];
        $reason=$_POST['reason'];
        $delect=$_POST['delect'];
        $type_data=$_POST['type_data'];
        $department=$_POST['department'];
        $checkbox_Genaral=$_POST['checkbox_Genaral'];
        $checkbox_Personal=$_POST['checkbox_Personal'];
        echo $emp_id;
        print_r($data_no);
        for($i=0; $i<sizeof($data_no); $i++) {
                echo $data_no[$i];
                echo $emp_ID[$i];
                echo $reason[$i];
                echo $delect[$i];
                echo $checkbox_Personal[$i];
                echo $checkbox_Genaral[$i];
                echo "<br>";
        }
        
        $status=$_POST['data_report_status'];
        $status=1;
        date_default_timezone_set("asia/bangkok");
        $date = date("d-m-Y");

        
        // for($i=0;$i<count($_POST["checkbox_Genaral"]);$i++)
        // {
        //         if(trim($_POST["checkbox_Genaral"][$i]) != "")
        //         {
        //                 $insert  = mysqli_query($condbmc,"INSERT INTO data_report (data_report_select) VALUES ('".$_POST["checkbox_Genaral"][$i]."')");
        //         }
        // }
        
        

        
        $type = 0;
        if(sizeof($data_no) != 0){
                $type = 1;
        }else{
                $type = 2;
        }
        $insert  = mysqli_query($condbmc,"INSERT INTO data_report (data_report_requester_emp_id,data_report_date,data_report_status,data_report_type) 
        VALUES ('$emp_id','$date','$status','$type')");


        

        $sql = "SELECT data_report_id
		FROM data_report
                ORDER BY data_report_id ASC";
	$query = $condbmc->query($sql);
        while($row = $query->fetch_assoc()) {
                $data_report_requester_emp_id = $row["data_report_id"];
        }


        if(sizeof($data_no) != 0){
                for($i=0; $i<sizeof($data_no); $i++) {
                        echo $i;
                        $insert  = mysqli_query($condbmc,"INSERT INTO data_employee_report (data_employee_emp_report_id, data_employee_report_reason, data_employee_report_date, data_employee_report_status, data_employee_data_report_id) 
                        VALUES ('$data_no[$i]','$reason[$i]','$date','$status','$data_report_requester_emp_id')");
                }
        }else{
                // สร้างอีกตาราง ที่ไม่มีเหตุผล
                $insert  = mysqli_query($condbmc,"INSERT INTO data_department_report (data_company_report, data_department_report, data_department_date_report, data_department_status_report, data_department_data_report_id,data_select) 
                VALUES ('$type_data','$department','$date','$status','$data_report_requester_emp_id','$checkbox[$i]')");
        }
        
        if (mysqli_affected_rows($condbmc)>0){
                echo '<meta http-equiv=refresh content=0;URL=../INT/report.php>';
        } else{
                echo mysqli_error($condbmc);
        }
?>