<?
function Select_Type_Company($condbmc){
	$sql_Type_Company = "SELECT * From company where Company_ID != 0";
	$result_Type_Company = mysqli_query($condbmc, $sql_Type_Company);
	while($row_Type_Company = mysqli_fetch_array($result_Type_Company)){
		echo '<option value="'.$row_Type_Company["Company_ID"].'">'.$row_Type_Company["Company_shortname"].'</option>';
	}
}


function get_name_emp_by_IDemp_sdm(){	
	include "../ENG/dbconnect.php";
	$sql = "SELECT *
			FROM employee
			WHERE employee.Emp_ID = ".$_POST["Emp_id"]."";
			$result_emp_id = $condbmc->query($sql);
			print_r($result_emp_id);
echo json_encode($result_emp_id);
}



function Select_Type_Borrow($condbmc){
	$sql_Type_Borrow = "SELECT * From type_borrow where typ_id != 0";
	$result_Type_Borrow = mysqli_query($condbmc, $sql_Type_Borrow);
	while($row_Type_Borrow = mysqli_fetch_array($result_Type_Borrow)){
		echo '<option value="'.$row_Type_Borrow["typ_id"].'">'.$row_Type_Borrow["typ_name"].'</option>';
	}
}

function Select_Type_Sectioncode($condbmc){
	$sql_Type_Sectioncode = "SELECT * From sectioncode where Sectioncode != 0";
	$result_Type_Sectioncode = mysqli_query($condbmc, $sql_Type_Sectioncode);
	while($row_Type_Sectioncode = mysqli_fetch_array($result_Type_Sectioncode)){
		echo '<option value="'.$row_Type_Sectioncode["Sectioncode"].'">'.$row_Type_Sectioncode["Department"].'</option>';
	}
}

function Select_Get_Department($condbmc, $temp){
	$sql_Get_Department = "SELECT * 
							FROM dbmc.master_mapping AS map
							WHERE Department != '' AND Company_id = '".$temp."'
							GROUP BY Department_id
							ORDER BY Department_id";
	$result_Get_Department = mysqli_query($condbmc, $sql_Get_Department);
	while($row_Get_Department = mysqli_fetch_array($result_Get_Department)){
		echo '<option value="'.$row_Get_Department["Department_id"].'">'.$row_Get_Department["Department"].'</option>';
	}
}

function Select_Approve($condbmc){
		$sql_Approve = "SELECT * From employee";
		$result_Approve = mysqli_query($condbmc, $sql_Approve);
		while($row_Approve = mysqli_fetch_array($result_Approve)){
			echo '<option value="'.$row_Approve["Emp_ID"].'">'.$row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"].'</option>';
		}
	}

function Select_TrainingGroup($condbmc){
	$sql_TrainingGroup = "SELECT * From traininggroup where t_id != 0";
	$result_TrainingGroup = mysqli_query($condbmc, $sql_TrainingGroup);
	while($row_TrainingGroup = mysqli_fetch_array($result_TrainingGroup)){
		echo '<option value="'.$row_TrainingGroup["t_id"].'">'.$row_TrainingGroup["name"].'</option>';
	}
}

function Select_Travel_Type($condbmc){
	$sql_Travel_Type = "SELECT * From travel_type where trv_id != 0";
	$result_Travel_Type = mysqli_query($condbmc, $sql_Travel_Type);
	while($row_Travel_Type = mysqli_fetch_array($result_Travel_Type)){
		echo '<option value="'.$row_Travel_Type["trv_id"].'">'.$row_Travel_Type["trv_name"].'</option>';
	}
}



function Select_Calendar_Type($condbmc){
	$sql_Calendar_Type = "SELECT * From calendar_type where cld_id != 0";
	$result_Calendar_Type = mysqli_query($condbmc, $sql_Calendar_Type);
	while($row_Calendar_Type = mysqli_fetch_array($result_Calendar_Type)){
		echo '<option value="'.$row_Calendar_Type["cld_id"].'">'.$row_Calendar_Type["cld_name"].'</option>';
	}
}

function Select_Define_Type($condbmc){
	$sql_Define_Type = "SELECT * From define_type where def_id != 0";
	$result_Define_Type = mysqli_query($condbmc, $sql_Define_Type);
	while($row_Define_Type = mysqli_fetch_array($result_Define_Type)){
		echo '<option value="'.$row_Define_Type["def_id"].'">'.$row_Define_Type["def_name"].'</option>';
	}
}

function Select_Get_Emp($condbmc){
	$sql_Get_Emp = "SELECT * From traininggroup where t_id != 0"; 
	$result_Get_Emp = mysqli_query($condbmc, $sql_Get_Emp); //ค่าข้อมูลที่ดึงจาก database
	echo json_encode($result_Get_Emp);
}

?>