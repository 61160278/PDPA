<?php
 session_start();
// include "dbconnect.php";
// include "condbmc.php";
// date_default_timezone_set('asia/bangkok');
// $strusername = $_POST['username'];
// $strpassword = $_POST['password'];
// $lang = $_POST['language'];

		// $sql = "SELECT * FROM user WHERE emp_id = '".$strusername."' AND password = '".$strpassword."' ";
		// $query = $conn->query($sql);
		// $objResult = $query->fetch_assoc();
			
				// if($objResult == False){
					
				// echo "<script language=\"JavaScript\">";
				// echo "alert('Username and Password Incorrect!')";
				// echo "</script>";
				//echo '<meta http-equiv=refresh content=0;URL=../index.php>';
				
				// }else{
				// $sql10 = "SELECT * FROM employee WHERE Emp_ID = '".$strusername."'";
				// $query10 = $condbmc->query($sql10);
				// $row10 = $query10->fetch_assoc();
				// $sql11 = "SELECT * FROM sectioncode WHERE Sectioncode = '".$row10["Sectioncode_ID"]."'";
				// $query11 = $condbmc->query($sql11);
				// $row11 = $query11->fetch_assoc();
				// $sql12 = "SELECT * FROM position WHERE Position_ID = '".$row10["Position_ID"]."'";
				// $query12 = $condbmc->query($sql12);
				// $row12 = $query12->fetch_assoc();
				// $sql13 = "SELECT * FROM company WHERE Company_ID = '".$row10["Company_ID"]."'";
				// $query13 = $condbmc->query($sql13);
				// $row13 = $query13->fetch_assoc();
				
				// if($lang == "EN"){
					// $_SESSION["empname"] = $row10["Empname_eng"];
					// $_SESSION["emplast"] = $row10["Empsurname_eng"];
					// $_SESSION["empid"] = $objResult["emp_id"];
					 $_SESSION["empid"] = "05483";
					// $_SESSION["sct"] = $row11["Sectioncode"];
					// $_SESSION["dept"] = $row11["Department"];
					// $_SESSION["postid"] = $row12["Position_ID"];
					// $_SESSION["pos"] = $row12["Position_name"];
					// $_SESSION["companyid"] = $row13["Company_ID"];
					// $_SESSION["company"] = $row13["Company_shortname"];
					// $_SESSION["role"] = $objResult["role_id"];
					// $_SESSION["language"]= "EN";
				// }else{
					// $_SESSION["empname"] = $row10["Empname_th"];
					// $_SESSION["emplast"] = $row10["Empsurname_th"];
					// $_SESSION["empid"] = $objResult["emp_id"];
					// $_SESSION["sct"] = $row11["Sectioncode"];
					// $_SESSION["dept"] = $row11["Department"];
					// $_SESSION["postid"] = $row12["Position_ID"];
					// $_SESSION["pos"] = $row12["Position_name"];
					// $_SESSION["companyid"] = $row13["Company_ID"];
					// $_SESSION["company"] = $row13["Company_shortname"];
					// $_SESSION["role"] = $objResult["role_id"];
					 $lang = "TH";
					 $_SESSION["language"]= "TH";
				// }
				
				// if($row12["Num"] >= 24 AND $objResult["role_id"] == 1){
					// $_SESSION["user"] = "Employee";
				// }else if($row12["Num"] <= 23 AND $objResult["role_id"] == 1){
					// $_SESSION["user"] = "Manager";
				// }else if($objResult["role_id"] == 3){
					// $_SESSION["user"] = "HRcheck1";
				// }else if($objResult["role_id"] == 4){
					// $_SESSION["user"] = "HRcheck2";
				// }else if($objResult["role_id"] == 5){
					// $_SESSION["user"] = "HRapproved";
				// }else if($objResult["role_id"] == 6){
					// $_SESSION["user"] = "ACcheck";
				// }else if($objResult["role_id"] == 7){
					// $_SESSION["user"] = "ACapproved";
				// }else if($objResult["role_id"] == 10){
					// $_SESSION["user"] = "Admin";
				// }else if($objResult["role_id"] == 8){
					// $_SESSION["user"] = "HRapprovedVP";
				// }
				
				// if($_SESSION["user"] == "Admin"){
					// $link = "admin";
					
				// }else if ($_SESSION["user"] == "HRapprovedVP"){
					// $link = "home"; //approve-vp
				// }else{
					// $link = "home";
				// }
					// if($objResult["end_date"] < date("Y-m-d")){
						// echo "<script language=\"JavaScript\">";
						// echo "alert('Password expired : Please change the new password.')";
						// echo "</script>";
						// echo '<meta http-equiv=refresh content=0;URL=../INT/change.php>';
					// }else{
						 header("location:../INT/home.php?l=$lang");
					// }
				// } 
				// $conn->close();
// session_write_close();
?>