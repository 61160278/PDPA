<?php
include "dbconnect.php";
        session_start();     
        $emp_id=$_SESSION["tms_id"];

        if($_POST['button'] == 1){
            $status = 2;
            echo "<script language=\"JavaScript\">";
            echo "alert('Approved successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/approve.php>';
         } else if($_POST['button']== 2){ 
            $status = 3;
            echo "<script language=\"JavaScript\">";
            echo "alert('Approved successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/approve.php>';
            // echo '<meta http-equiv=refresh content=0;URL=../INT/borrow.php>';
        } else if($_POST['button']== 3){ 
            $status = 4;
            echo "<script language=\"JavaScript\">";
            echo "alert('Approved successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/approve.php>';
            // echo '<meta http-equiv=refresh content=0;URL=../INT/borrow.php>';
        } else if($_POST['button']== 5){ 
            $status = 5;
            echo "<script language=\"JavaScript\">";
            echo "alert('Rejected successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/approve.php>';
        } else if($_POST['button']== 6){ 
            $status = 6;
            echo "<script language=\"JavaScript\">";
            echo "alert('Cancel successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/borrow.php>';
        }
        mysqli_query($condbmc,"UPDATE borrow set 'status'='".$status."' WHERE emp_no='" .$_GET['id']. "'");
    $message = "Record Modified Successfully";
?>