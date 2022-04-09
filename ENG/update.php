<?php
include "dbconnect.php";
        session_start();     
        $emp_id=$_SESSION["tms_id"];

        if($_POST['button']== "inactive"){ 
            $status = "inactive";
            echo "<script language=\"JavaScript\">";
            echo "alert('Cancel successfully.');";
            echo "</script>";
            echo '<meta http-equiv=refresh content=0;URL=../INT/public_data.php>';
        }
        $update  = mysqli_query($condbmc,"UPDATE data_public_pdpa set data_public_status='".$status."' WHERE data_public_id='" .$_GET['id']. "'");
    $message = "Record Modified Successfully";
?>