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

        if(sizeof($data_no) != 0){
                for($i=0; $i<sizeof($data_no); $i++) {
                        echo $data_no[$i];
                        echo $emp_ID[$i];
                        echo $reason[$i];
                        echo $delect[$i];
                        echo "<br>";
                }
        }
        // if 
      
        $status=$_POST['data_report_status'];
        $status=1;
        $date = date("Y-m-d");
        $Check=$_POST['A_id'];
        $Acknowledge=$_POST['Acknow_id'];
        $Approve=$_POST['Approve_id'];

        $type = 0;
        if(sizeof($data_no) != 0){
                $type = 1;
        }else{
                $type = 2;
        }
        $insert  = mysqli_query($condbmc,"INSERT INTO data_report (data_report_requester_emp_id,data_report_date,data_report_status,data_report_type, data_report_check, data_report_acknowledge, data_report_approve) 
        VALUES ('$emp_id','$date','$status','$type','$Check','$Acknowledge','$Approve')");
        $insert_id = mysqli_insert_id($condbmc); // get id from table data_report after insert new data *****
        // insert main table 

        if(sizeof($checkbox_Genaral) != 0){
                foreach($checkbox_Genaral as $index => $row){
                        $insert_general  = mysqli_query($condbmc,"INSERT INTO data_report_general (General_data_id,data_report_id) 
                                                VALUES ('$row','$insert_id')");
                }
                // foreach
        }
        // if insert general

        
        if(sizeof($checkbox_Personal) != 0){
                foreach($checkbox_Personal as $index => $row){
                        $insert_general  = mysqli_query($condbmc,"INSERT INTO data_report_customize (customize_data_id,data_report_id) 
                                                        VALUES ('$row','$insert_id')");
                }
                // foreach
        }
        // if insert customize


        if(sizeof($data_no) != 0){
                for($i=0; $i<sizeof($data_no); $i++) {
                        echo $i;
                        $insert  = mysqli_query($condbmc,"INSERT INTO data_employee_report (data_employee_emp_report_id, data_employee_report_reason, data_employee_report_date, data_employee_report_status, data_employee_data_report_id) 
                        VALUES ('$data_no[$i]','$reason[$i]','$date','$status','$insert_id')");
                }
                // for 
        }
        // if insert emp
        else{
                $insert  = mysqli_query($condbmc,"INSERT INTO data_department_report (data_company_report, data_department_report, data_department_date_report, data_department_status_report, data_department_data_report_id) 
                VALUES ('$type_data','$department','$date','$status','$insert_id')");
        }
        // else insert department
        
        if (mysqli_affected_rows($condbmc)>0){
                echo '<meta http-equiv=refresh content=0;URL=../INT/report.php>';
        }
        // if
        else{
                echo mysqli_error($condbmc);
        }
        // else 
?>