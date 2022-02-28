<?php
session_start();
date_default_timezone_set('asia/bangkok');		
include "dbconnect.php";
	
	$Today = date("Y-m-d");
	$_SESSION["language"]= $_POST["language"];
	$empid = $_POST["username"];
	$pass = $_POST["password"];
	$sql_user = "SELECT * From username WHERE emp_id = '".$empid."' AND password = '".$pass."'";
	$result_user = mysqli_query($conid, $sql_user);
	if($row_user = mysqli_fetch_array($result_user)){
		if($Today <= $row_user["end_date"]){
			$sql_role = "SELECT * From username WHERE emp_id = '".$row_user["emp_id"]."'";
			$result_role = mysqli_query($contms, $sql_role);
			$row_role = mysqli_fetch_array($result_role);
			$sqllog = "INSERT INTO login_log (emp_id,ip) value ('".$empid."','".$_SERVER['REMOTE_ADDR']."')";
			$querylog = $contms->query($sqllog);
			$sqlemp = "SELECT * FROM employee WHERE Emp_ID = '".$empid."'";
			$queryemp = $condbmc->query($sqlemp);
			$rowemp = $queryemp->fetch_assoc();
			$sqlsec = "SELECT * FROM sectioncode WHERE Sectioncode = '".$rowemp["Sectioncode_ID"]."'";
			$querysec = $condbmc->query($sqlsec);
			$rowsec = $querysec->fetch_assoc();
			$sqlpos = "SELECT * FROM position WHERE Position_ID = '".$rowemp["Position_ID"]."'";
			$querypos = $condbmc->query($sqlpos);
			$rowpos = $querypos->fetch_assoc();
			$sqlcom = "SELECT * FROM company WHERE Company_ID = '".$rowemp["Company_ID"]."'";
			$querycom = $condbmc->query($sqlcom);
			$rowcom = $querycom->fetch_assoc();
			$_SESSION["empname_tms"] = $rowemp["Empname_eng"];
			$_SESSION["emplast_tms"] = $rowemp["Empsurname_eng"];
			$_SESSION["empid_tms"] = $empid;
			$_SESSION["sct_tms"] = $rowsec["Sectioncode"];
			$_SESSION["dept_tms"] = $rowsec["Department"];
			$_SESSION["postid_tms"] = $rowpos["Position_ID"];
			$_SESSION["pos_tms"] = $rowpos["Position_name"];
			$_SESSION["companyid_tms"] = $rowcom["Company_ID"];
			$_SESSION["company_tms"] = $rowcom["Company_shortname"];
			$_SESSION['role_tms'] = $row_role["role_id"];	
			echo '<meta http-equiv=refresh content=0;URL=../INT/home.php>';
			
		}else{
			echo "<script language=\"JavaScript\">";
			echo "alert('Password expired : Please change the new password. ')";
			echo "</script>";
			echo '<meta http-equiv=refresh content=0;URL=../INT/change_password.php?emp=';echo $_POST["username"];echo '>';
		}	
	}else{
		echo "<script language=\"JavaScript\">";
		echo "alert('Login fail : Please register or verify the username and password.')";
		echo "</script>";
		echo '<meta http-equiv=refresh content=0;URL=../index.php>';
	}
	
	
					
?>