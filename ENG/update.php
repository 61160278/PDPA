<?php
include "dbconnect.php";
        session_start();     
        $emp_id=$_SESSION["tms_id"];

        if($_POST['button'] == 1 ){
            $Comment = $_POST['comment'];
            $status = 2;
            echo "<script language=\"JavaScript\">";
            echo "alert('Approved successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/approve.php>';
         } else if($_POST['button']== 2){ 
            $Comment = $_POST['comment'];
            $status = 3;
            echo "<script language=\"JavaScript\">";
            echo "alert('Approved successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/approve.php>';
            echo '<meta http-equiv=refresh content=0;URL=../INT/home_user.php>';
        } else if($_POST['button']== 3){ 
            $Comment = $_POST['comment'];
            $status = 4;
            echo "<script language=\"JavaScript\">";
            echo "alert('Approved successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/approve.php>';
            echo '<meta http-equiv=refresh content=0;URL=../INT/home_user.php>';
        } else if($_POST['button']== 5){ 
            $Comment = $_POST['comment1'];
            $status = 5;
            echo "<script language=\"JavaScript\">";
            echo "alert('Rejected successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/home_user.php>';
        } else if($_POST['button']== 6){ 
            $status = 6;
            echo "<script language=\"JavaScript\">";
            echo "alert('Cancel successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/home_user.php>';
        }
    mysqli_query($condbmc,"UPDATE employee_travel set emp_trv_comment='".$Comment."', emp_trv_status='".$status."' WHERE emp_trv_id='" .$_GET['id']. "'");
    $message = "Record Modified Successfully";
?>