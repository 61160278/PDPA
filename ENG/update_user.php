<?php
include "dbconnect.php";
        session_start();     
        $emp_id=$_SESSION["tms_id"];
        $Country=$_POST['country'];
        $Travel_to=$_POST['travel_to'];
        $Purpose=$_POST['purpose'];
        $Flight=$_POST['flight'];
        $Data_item1=$_POST['data_item1'];
        $Date_d=$_POST['date_d'];
        $Time_d=$_POST['time_d'];
        $Date_depart=$_POST['date_depart'];
        $Time_depart=$_POST['time_depart'];
        $Date_r=$_POST['date_r'];
        $Time_r=$_POST['time_r'];
        $Date_return=$_POST['date_return'];
        $Time_return=$_POST['time_return'];
        $Data_item2=$_POST['data_item2'];
        $scd_id=$_POST['scd_id'];
        $data2=$_POST['data2'];
        $data3=$_POST['data3'];
        $data4=$_POST['data4'];
        $data5=$_POST['data5'];
        $data6=$_POST['data6'];
        $data8=$_POST['data8'];
        
        for($i=0; $i<sizeof($data2); $i++) {
                echo $scd_id[$i];
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
        $Check=$_POST['mgr'];
        $Acknowledge=$_POST['acknow'];
        $Approve=$_POST['approve'];
        
        $update  = mysqli_query($condbmc,"UPDATE employee_travel set emp_trv_country='".$Country. "',
        emp_trv_to='".$Travel_to. "',
        emp_trv_purpose='".$Purpose. "',
        emp_trv_duration='".$Flight. "',
        emp_trv_date_go_flight='".$Date_d. "',
        emp_trv_time_go_flight='".$Time_d. "',
        emp_trv_date_go_schedule='".$Date_depart. "',
        emp_trv_time_go_schedule='".$Time_depart. "',
        emp_trv_date_return_flight='".$Date_r. "',
        emp_trv_time_return_flight='".$Time_r. "',
        emp_trv_date_return_schedule='".$Date_return. "',
        emp_trv_time_return_schedule='".$Time_return. "',
        emp_trv_trv_id='".$Data_item1. "',
        emp_trv_bsn_id='".$Data_item2. "',
        emp_trv_wid_id='".$Data_item3. "',
        emp_trv_emp_id='".$emp_id. "',
        emp_trv_check='".$Check."' ,
        emp_trv_acknowledge='".$Acknowledge."' ,
        emp_trv_approve='".$Approve."' ,
        emp_trv_status='".$status."' 
        WHERE emp_trv_id='" .$_GET['id']. "'");

        for($j=0; $j<sizeof($data2); $j++) {
                $update  = mysqli_query($condbmc,"UPDATE schedule_table set scd_date='".$data2[$j]. "',
                scd_place='".$data4[$j]. "',
                scd_description='".$data5[$j]. "',
                scd_remarks='".$data8[$j]. "',
                scd_calender='".$data3[$j]. "',
                scd_define='".$data6[$j]. "'
                WHERE scd_id='".$scd_id[$j]."'");
        }
        echo '<meta http-equiv=refresh content=0;URL=../INT/home_user.php>';
        $message = "Record Modified Successfully";
?>