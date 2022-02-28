<?php include "dbconnect.php";?>

<?php
        session_start();     
        $emp_id=$_SESSION["tms_id"];
        $Borrow_emp_id=$_POST['borrow_emp_id'];
        $Type_data=$_POST['type_data'];
        $Department=$_POST['department'];
        $data1=$_POST['data1'];
        $data2=$_POST['data2'];
        $status=$_POST['borrow_detail_status'];
        $status=1;
        // $data4=$_POST['data4'];
        // $data5=$_POST['data5'];
        // $data6=$_POST['data6'];
        echo $emp_id;
        print_r($data1);
        for($i=1; $i<sizeof($data1); $i++) {
                echo $data1[$i];
                echo $data2[$i];
                echo "<br>";
        }
        // $Data_item3=$_POST['data_item3'];
        // $status=$_POST['emp_trv_status'];
        // $status=1;
        // $Check=$_POST['A_id'];
        // $Acknowledge=$_POST['Acknow_id'];
        // $Approve=$_POST['Approve_id'];
        // $Comment=$_POST['emp_trv_comment'];
        
        // $insert  = mysqli_query($condbmc,"INSERT INTO borrow_detail (borrow_detail_emp_id, borrow_detail_reason, borrow_detail_borrow, borrow_detail_return,
        // borrow_detail_date_approve, borrow_detail_status_return_file, borrow_detail_date_actual_return_file, borrow_detail_checker_id, borrow_detail_approver_id,
        // emp_trv_date_return_schedule, emp_trv_time_return_schedule, emp_trv_trv_id, emp_trv_bsn_id, emp_trv_wid_id, emp_trv_emp_id, emp_trv_country, 
        // borrow_detail_head_section_emp_id) 
        // VALUES ('$Type_data','$Department')");

        $insert  = mysqli_query($condbmc,"INSERT INTO borrow_detail (borrow_detail_emp_id, borrow_detail_reason, borrow_detail_status, borrow_detail_type_data, borrow_detail_department) 
        VALUES ('$emp_id','$data1','$status','$Type_data','$Department')");


        // $sql = "SELECT borrow_detail_id
	// 	FROM borrow_detail ";
	// $query = $condbmc->query($sql);
        // while($row = $query->fetch_assoc()) {
        //         $borrow_detail_emp_id = $row["borrow_detail_id"];
        // }
        
        for($i=0; $i<sizeof($data1); $i++) {
                echo $i;
                $insert  = mysqli_query($condbmc,"INSERT INTO borrow_detail (borrow_detail_reason, borrow_detail_emp_id) 
                VALUES ('$data1[$i]','$Borrow_emp_id')");
        }
        
        if (mysqli_affected_rows($condbmc)>0){
                echo '<meta http-equiv=refresh content=0;URL=../INT/public_data.php>';
        } else{
                echo mysqli_error($condbmc);
        }
?>