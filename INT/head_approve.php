<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../IMG/ico.ico" type="image/x-icon" />

    <title>TRAVELLING | DENSO</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <?php 
		
			include "menu.php";
			
            $sql_home = "SELECT * From employee_travel 
            WHERE emp_trv_id = ".$_GET["id"]."";
            $result_home = mysqli_query($condbmc, $sql_home);
			$row_home = mysqli_fetch_array($result_home);
        
            $row=0;
            $sql_homeTable = "SELECT * From schedule_table WHERE scd_trv_id = ".$_GET["id"]."";
            $result_homeTable = mysqli_query($condbmc, $sql_homeTable);
			while($row_homeTable = mysqli_fetch_array($result_homeTable)){
                $array[$row]=$row_homeTable['scd_date'];
                $array2[$row]=$row_homeTable['scd_calender'];
                $array3[$row]=$row_homeTable['scd_place'];
                $array4[$row]=$row_homeTable['scd_description'];
                $array5[$row]=$row_homeTable['scd_define'];
                $array6[$row]=$row_homeTable['scd_remarks'];
                $row++;
            }
        ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php include "top-bar.php";?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <form id="ow" name="ow" method="POST" action="../ENG/update.php?id=<?php echo $_GET["id"]?>">
                    <input type="hidden" id="button" name="button">
                    <div class="col-lg-12">
                        <br>
                        <ol class="breadcrumb">
                            <li>
                                <a href="home.php">Home</a>
                            </li>
                            <li class="active">
                                <strong>Working Outside</strong>
                            </li>
                        </ol>
                        <h2>
                            <b><u>
                                    <center>INTERNATIONAL TRAVEL</center>
                                </u></b><br>
                            <center>Traveling Application & Expense<center>
                        </h2>
                    </div>

                    <div class="col-lg-12">
                        <h2>&nbsp;&nbsp;&nbsp;</h2>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-3 b-r">
                                <div class="form-group"><label class="font-noraml">ประเทศ | Country</label>
                                    <textarea type="text" name="country" class="form-control" rows="3" readonly><? echo $row_home["emp_trv_country"]?></textarea>
                                </div>
                            </div>
                            <!--ประเทศ-->
                            
                            <div class="col-sm-3 b-r">
                                <div class="form-group"><label class="font-noraml">เดินทางไป | Travel to</label>
                                    <textarea type="text" name="travel_to" class="form-control" rows="3" readonly><? echo $row_home["emp_trv_to"]?></textarea>
                                </div>
                            </div>
                            <!--สถานที่ไป-->

                            <div class="col-sm-6 b-r">
                                <div class="form-group"><label class="font-noraml">วัตถุประสงค์*คำอธิบายรายละเอียด | Purpose*Describe detail</label>
                                    <textarea class="form-control" name="purpose" rows="3" readonly><? echo $row_home["emp_trv_purpose"]?></textarea>
                                </div>
                            </div>
                            <!--Describe-->
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2" style="text-align:center">
                                                    Duration (flight) <label> <input type="text" name="flight" 
                                                    class="form-control" size="1" value="<? echo $row_home["emp_trv_duration"]?>" readonly></label>&nbsp;days 
                                                            <br>ระยะเวลา (บิน)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วัน
                                                </th>

                                                <th colspan="2" style="text-align:center">
                                                    Flight Schedule | ตารางเวลาบิน
                                                </th>
                                                <th colspan="2" class="form-group" style="text-align:center">
                                                    <center><label class="col-sm-7 control-label">Schedule
                                                            (depart/return)<br>ตารางเวลา (ไป/กลับ)</label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control" style="width:130px" name="data_item1" disabled>
                                                            <?
										                        $sql_Travel_Type = "SELECT * From travel_type";
                                                                $result_Travel_Type = mysqli_query($condbmc, $sql_Travel_Type);
                                                                while($row_Travel_Type = mysqli_fetch_array($result_Travel_Type)){
									                        ?>
                                                            <option value ="<?echo $row_Travel_Type["trv_id"];?>"<?php if($row_Travel_Type["trv_id"]==$row_home["emp_trv_trv_id"]){echo "selected=selected";}?>><? echo $row_Travel_Type["trv_name"]; ?></option>
                                                            <? } ?>
                                                            </select>
                                                        </div>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr align="center">
                                                <td rowspan="2"> <br><br><br> Planned <br> Schedule </td>
                                                <td><br>Depart</td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml" class="input-group-addon">Date | วันเดินทางไป</label>
                                                        <input type="date" name="date_d" class="form-control" value="<? echo $row_home["emp_trv_date_go_flight"]?>" readonly>
													</div>
												</td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางไป</label>
                                                        <div class="input-group time">
															<input type="time" name="time_d" class="form-control" value="<? echo $row_home["emp_trv_time_go_flight"]?>" readonly >
                                                        </div>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml"
                                                            class="input-group-addon">Date | วันเดินทางไป</label>
                                                        <input type="date" name="date_depart" class="form-control" value="<? echo $row_home["emp_trv_date_go_schedule"]?>" readonly>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางไป</label>
                                                        <div class="input-group time">
															<input type="time" name="time_depart" class="form-control" value="<? echo $row_home["emp_trv_time_go_schedule"]?>" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr align="center">
                                                <td> <br>Return </td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml"
                                                            class="input-group-addon">Date | วันเดินทางกลับ</label>
                                                        <input type="date" name="date_r" class="form-control" value="<? echo $row_home["emp_trv_date_return_flight"]?>" readonly>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางกลับ</label>
                                                        <div class="input-group time">
															<input type="time" name="time_r" class="form-control" value="<? echo $row_home["emp_trv_time_return_flight"]?>" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml"
                                                            class="input-group-addon">Date | วันเดินทางกลับ</label>
                                                        <input type="date" name="date_return" class="form-control" value="<? echo $row_home["emp_trv_date_return_schedule"]?>" readonly>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางกลับ</label>
                                                        <div class="input-group time"><input type="time"
                                                                name="time_return" class="form-control" value="<? echo $row_home["emp_trv_time_return_schedule"]?>" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="form-group">
                                                    <div class="form-group"><label
                                                            class="col-sm-2 control-label">Private schedule :<br>กิจส่วนตัว</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" style="width:500px" tabindex="2" name="data_item2" disabled>
                                                            <?
										                        $sql_Business_Type = "SELECT * From business_type";
                                                                $result_Business_Type = mysqli_query($condbmc, $sql_Business_Type);
                                                                while($row_Business_Type = mysqli_fetch_array($result_Business_Type)){
									                        ?>
                                                            <option value ="<?echo $row_Business_Type["bsn_id"];?>"<?php if($row_Business_Type["bsn_id"]==$row_home["emp_trv_bsn_id"]){echo "selected=selected";}?>><? echo $row_Business_Type["bsn_name"]; ?></option>
                                                            <? } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <h3><span class="badge">
                                <font size="4px" color="black">
                                    <b>Schedule of International Travel | ตารางการเดินทางระหว่างประเทศ</b>
                            </span>
                            </font>
                        </h3>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="myTbl" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:40px">
                                                    <center>Day<br>วัน
                                                </th>
                                                <th style="width:80px">
                                                    <center>Date<br>วันที่
                                                </th>
                                                <th style="width:80px">
                                                    <center>Calendar*<br>ปฏิทิน
                                                </th>
                                                <th>
                                                    <center>Place<br>สถานที่
                                                </th>
                                                <th>
                                                    <center>Description<br>คำอธิบาย
                                                </th>
                                                <th style="width:80px">
                                                    <center>Define (business/private)<br>นิยาม (ธุรกิจ/ส่วนตัว)
                                                </th>
                                                <!--th>
                                                    <center>Access by
                                                </th-->
                                                <th>
                                                    <center>Accommodation & Remarks<br>ที่พัก & ความเห็น
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php for($i=0; $i<count($array); $i++) {?>
                                            <tr id="firstTr">
                                                <td align="center" name="data1"><?php echo $i+1?></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" style="width:150px" name="data2[]" value="<? echo $array[$i]?>" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                <select class="form-control" style="width:80px" name="data3[]" disabled>
                                                    <?
										                $sql_Calendar_Type = "SELECT * From calendar_type";
                                                        $result_Calendar_Type = mysqli_query($condbmc, $sql_Calendar_Type);
                                                        while($row_Calendar_Type = mysqli_fetch_array($result_Calendar_Type)){
								                    ?>
                                                        <option value ="<?echo $row_Calendar_Type["cld_id"];?>"<?php if($row_Calendar_Type["cld_id"]==$array2[$i]){echo "selected=selected";}?>><? echo $row_Calendar_Type["cld_name"]; ?></option>
                                                    <? } ?>
                                                </select>

                                                <!-- <select class="form-control" name="data3[]" readonly>
                                                    <option value="<? //echo $array2[$i]?>"><? //echo $array2[$i]?></option>
                                                    </select>     -->
                                                </td>
                                                <td><textarea type="text" placeholder="" class="form-control"
                                                        name="data4[]" rows="2" readonly><? echo $array3[$i]?></textarea></td>
                                                <td><textarea type="text" placeholder="" class="form-control"
                                                        name="data5[]" rows="4" readonly><? echo $array4[$i]?></textarea></td>
                                                <td>
                                                    <select class="form-control" name="data6[]" style="width:155px" disabled>
                                                        <?
										                    $sql_Define_Type = "SELECT * From define_type";
                                                            $result_Define_Type = mysqli_query($condbmc, $sql_Define_Type);
                                                            while($row_Define_Type = mysqli_fetch_array($result_Define_Type)){
									                    ?>
                                                        <option value ="<?echo $row_Define_Type["def_id"];?>"<?php if($row_Define_Type["def_id"]==$array5[$i]){echo "selected=selected";}?>><? echo $row_Define_Type["def_name"]; ?></option>
                                                        <? } ?>
                                                    </select>
                                                    <!-- <select class="form-control" name="data6[]" readonly>
                                                        <option value="<? //echo $array5[$i]?>"><? //echo $array5[$i]?></option>
                                                    </select> -->
                                                </td>
                                                <!-- td><input type="text" placeholder="" class="form-control" name="data7[]" id="data7[]"></td-->
                                                <td><textarea type="text" placeholder="" class="form-control"
                                                        name="data8[]" rows="2" readonly><? echo $array6[$i]?></textarea></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- <p align="right">
                                        <button class="btn btn-info" type="button" id="addRow"><i
                                                class="fa fa-plus"></i>&nbsp;New</button>
                                        <button class="btn btn-danger" type="button" id="removeRow"><i
                                                class="fa fa-plus"></i>&nbsp;Delete</button>
                                    </p> -->

                                </div>
                            </div>
                        </div>

						<h3><span class="badge">
							<font size="4px" color="black">
								<b>Expense Approve | การอนุมัติค่าใช้จ่าย</b>
							</span>
							</font>
						</h3>
						<br>
							<div class="row">
								<div class="col-sm-12">
									<tr>
										<td class="form-group">
											<div class="col-sm-2">Payment | ค่าตอบแทน</div>
											<div class="col-sm-4">
												<select class="form-control" name="data_item3" disabled>
													<?
														$sql_Withdraw_Type = "SELECT * From withdraw_type";
														$result_Withdraw_Type = mysqli_query($condbmc, $sql_Withdraw_Type);
														while($row_Withdraw_Type = mysqli_fetch_array($result_Withdraw_Type)){
													?>
														<option value ="<?echo $row_Withdraw_Type["wid_id"];?>"<?php if($row_Withdraw_Type["wid_id"]==$row_home["emp_trv_wid_id"]){echo "selected=selected";}?>><? echo $row_Withdraw_Type["wid_name"]; ?></option>
													<? } ?>
												</select>
											</div>
										</td>
									</tr>
								</div>
								<!-- col-sm-2 -->
							</div>
							<!-- row -->
						<br>

						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>
													<center> Detail
												</th>
												<th>
													<center> Check (MGR.up)
												</th>
												<th>
													<center> Acknowledge (ED)
												</th>
												<th>
													<center> Approve (President)
												</th>
											</tr>
										</thead>

										<tbody>
											<tr align="center">
												<td>Advance Payment</td>
												<td>
													<select class="select2_demo_1 form-control" name="mgr" id="mgr" style="width:100%;"
													tabindex="2" disabled>
													<?
														$sql_Approve = "SELECT * From employee";
														$result_Approve = mysqli_query($condbmc, $sql_Approve);
														while($row_Approve = mysqli_fetch_array($result_Approve)){
													?>
														<option value ="<?echo $row_Approve["Emp_ID"];?>"<?php if($row_Approve["Emp_ID"]==$row_home["emp_trv_check"]){echo "selected=selected";}?>>
														<? echo $row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"]; ?></option>
													<? } ?>
													</select>
												</td>											
												<td>
													<select class="select2_demo_1 form-control" name="acknow" id="acknow" style="width:100%;"
													tabindex="2" disabled>
													<?
														$sql_Approve = "SELECT * From employee";
														$result_Approve = mysqli_query($condbmc, $sql_Approve);
														while($row_Approve = mysqli_fetch_array($result_Approve)){
													?>
														<option value ="<?echo $row_Approve["Emp_ID"];?>"<?php if($row_Approve["Emp_ID"]==$row_home["emp_trv_acknowledge"]){echo "selected=selected";}?>>
														<? echo $row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"]; ?></option>
													<? } ?>
													</select>
												</td>
												<td>
													<select class="select2_demo_1 form-control" name="approve" id="approve" style="width:100%;"
													tabindex="2" disabled>
													<?
														$sql_Approve = "SELECT * From employee";
														$result_Approve = mysqli_query($condbmc, $sql_Approve);
														while($row_Approve = mysqli_fetch_array($result_Approve)){
													?>
														<option value ="<?echo $row_Approve["Emp_ID"];?>"<?php if($row_Approve["Emp_ID"]==$row_home["emp_trv_approve"]){echo "selected=selected";}?>>
														<? echo $row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"]; ?></option>
													<? } ?>
													</select>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- Expense Approve -->

						<div class="row">
							<div class="col-lg-12">
								<div class="col-lg-5"></div>
								<div class="col-lg-5">
									<button type="button" data-toggle="modal" data-target="#modal_simple"
										class="btn btn-outline btn-primary">
									<i class="fa fa-check"></i>&nbsp;APPROVE
									</button>
									<button type="button" data-toggle="modal" data-target="#modal"
										class="btn btn-outline btn-danger">
									<i class="fa fa-check"></i>&nbsp;REJECT
									</button>
								</div>
							</div>
						</div>

						<!-- <div class="DTTT btn-group pull-right mt-sm">
							<input type="submit" name="submit" class="btn btn-primary" value="Save">
						</div>
						<div class="DTTT btn-group pull-left mt-sm">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
						</div> -->
            
					</div>        
				</form>
		
				<?php
					if($row_home["emp_trv_status"] == 1){
						$value = "1";
					}else if($row_home["emp_trv_status"] == 2){
						$value = "2";	
					}else if($row_home["emp_trv_status"] == 3){
						$value = "3";
					}
				?>
			
				<!--input type="hidden" id="comment" name="comment">
				<input type="hidden" id="comment1" name="comment1">
				<input type="hidden" id="button" name="button"-->
                <div id="modal_simple" class="modal fade" tabindex="-1" role="dialog">
					<form id="ow" name="ow" method="POST" action="../ENG/update.php?id=<?php echo $_GET["id"]?>" >
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
							<div class="modal-header"style="background-color:green;">
									<h2 class="modal-title"><font color ="white"><b>APPROVE</b></font></h2>
								</div>
								<div class="modal-body">
									<label class="font-noraml">Confirm Approve ?</label>
									<br>
									<label class="font-noraml">Please specify the approval</label>
									<textarea type="text" class="form-control" rows="8" name="comment" id="comm" cols="60 "style="resize:none;"></textarea>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="button" value="<? echo $value;?>" class="btn btn-primary">Approve</button>
								</div>
							</div>
						</div>
					</form>
                        <!-- modal-bialog .// -->
                </div>
                    <!-- modal.approve// -->
                    
                <div id="modal" class="modal fade" tabindex="-1" role="dialog">
					<form id="ow" name="ow" method="POST" action="../ENG/update.php?id=<?php echo $_GET["id"]?>" >
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header" style="background-color:red;">
									<h2 class="modal-title"><font color ="white"><b>REJECT</b></font></h2>
								</div>
								<div class="modal-body">
									<label class="font-noraml">Confirm Approve ?</label>
									<br>
									<label class="font-noraml">Please specify the approval</label>
									<textarea type="text" class="form-control" rows="8" name="comment1" id="com" cols="60" style="resize:none;" required></textarea>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="button" value="5" class="btn btn-danger">REJECT</button>
								</div>
							</div>
						</div>
					</form>
                        <!-- modal-bialog .// -->
                </div>
                    <!-- modal.approve// -->
       

			</div>
			<br>
			<br>
			<?php include "footer.php";?>
		</div>
		
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>
    <!-- JSKnob -->
    <script src="js/plugins/jsKnob/jquery.knob.js"></script>
    <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- NouSlider -->
    <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>
    <!-- Switchery -->
    <script src="js/plugins/switchery/switchery.js"></script>
    <!-- IonRangeSlider -->
    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <!-- MENU -->
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- Color picker -->
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- Clock picker -->
    <script src="js/plugins/clockpicker/clockpicker.js"></script>
    <!-- Image cropper -->
    <script src="js/plugins/cropper/cropper.min.js"></script>
    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>
    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>
    <!-- TouchSpin -->
    <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script>
	function rejectform(){
        console.log("12");
        document.getElementById("button").value = 5;
        document.getElementById("ow").submit();
    }
	</script>

    <script>
    /*function submitform(status_emp) {
        console.log(status_emp);
        if(status_emp == 1){
            document.getElementById("button").value = 2;
        }else if(status_emp == 2){
            document.getElementById("button").value = 3;
        }else if(status_emp == 3){
            document.getElementById("button").value = 4;
        }
        document.getElementById("ow").submit();
    }*/
    </script>

    <script>
        /*$(document).ready(function() {
            $("#comm").change(function() {
                var ID = $(this).val();
                document.getElementById("comment").value = ID;
            });
        });

        $(document).ready(function() {
            $("#com").change(function() {
                var ID = $(this).val();
                document.getElementById("comment1").value = ID;
            });
        });
       */
    $(function() {

        $(".css_data_item").click(function() { // เมื่อคลิก checkbox  ใดๆ  
            if ($(this).prop("checked") == true) { // ตรวจสอบ property  การ ของ   
                var indexObj = $(this).index(".css_data_item"); //   
                $(".css_data_item").not(":eq(" + indexObj + ")").prop("checked",
                    false); // ยกเลิกการคลิก รายการอื่น  
            }
        });

        $("#form_checkbox1").submit(function() { // เมื่อมีการส่งข้อมูลฟอร์ม  
            if ($(".css_data_item:checked").length == 0) { // ถ้าไม่มีการเลือก checkbox ใดๆ เลย  
                alert("NO");
                return false;
            }
        });

    });

    $(function() {
        var row = 6;
        $("#addRow").click(function() {
            var tr = '';
            tr += '<tr id="firstTr">'
            tr += '<td align="center" name="data1">'+ row +'</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr += '<input type="date" class="form-control" name="data2[]" required>'
            tr += '</div>'
            tr += '</td>'
            tr += '<td>'
            tr += '<select class="form-control" style="width:80px" name="data3[]" required>'
            tr += '<? echo Select_Calendar_Type($condbmc); ?>'
            tr += '</select>'
            tr += '</td>'
            tr += '<td><textarea type="text" placeholder="" class="form-control" name="data4[]" rows="2" required></textarea>'
            tr += '</td>'
            tr += '<td><textarea type="text" placeholder="" class="form-control"name="data5[]" rows="4" required></textarea>'
            tr += '</td>'
            tr += '<td><select class="form-control" style="width:155px" name="data6[]" required>'
            tr += '<? echo Select_Define_Type($condbmc); ?>'
            tr += '</select></td>'
            tr += '<td><textarea type="text" placeholder="" class="form-control" name="data8[]" rows="2" required></textarea>'
            tr += '</td>'
            tr += '</tr>'

            $('#myTbl > tbody:last').append(tr);
            // $('#myTbl').append(firstTr);
            // $('#myTbl').append(tr);

            row = row + 1;
            // $("#myTbl").append($("#firstTr").clone());
        });
        $("#removeRow").click(function() {
            if ($("#myTbl tr").size() > 6) {
                $("#myTbl tr:last").remove();
                row -= 1;
            } else {
                alert("ต้องใส่ข้อมูลอย่างน้อย 5 รายการ");
            }
        });
    });


    $(document).ready(function() {
        var rows = 1;
        $("#createRows").click(function() {
            var tr = "<tr>";
            tr = tr + "<td><input type='text' name='txtCustomerID" + rows + "' id='txtCustomerID" +
                rows + "' size='5'></td>";
            tr = tr + "<td><input type='text' name='txtName" + rows + "' id='txtName" + rows +
                "' size='10'></td>";
            tr = tr + "<td><input type='text' name='txtEmail" + rows + "' id='txtEmail" + rows +
                "' size='15'></td>";
            tr = tr + "<td><input type='text' name='txtCountryCode" + rows + "' id='txtCountryCode" +
                rows + "' size='5'></td>";
            tr = tr + "<td><input type='text' name='txtBudget" + rows + "' id='txtBudget" + rows +
                "' size='5'></td>";
            tr = tr + "<td><input type='text' name='txtUsed" + rows + "' id='txtUsed" + rows +
                "' size='5'></td>";
            tr = tr + "</tr>";
            $('#myTable > tbody:last').append(tr);

            $('#hdnCount').val(rows);
            rows = rows + 1;
        });
    });


    $(document).ready(function() {
        $("#Province").change(function() {
            var ID = $(this).val();
            $.ajax({
                url: "../Ajex/Ajex_SelectDistrict.php",
                type: "POST",
                data: {
                    ID: ID
                },
                success: function(data) {
                    console.log(data);
                    $('#District_ID').html(data);
                    document.getElementById('District_ID').disabled = false;
                }

            });
        });
    });

    $(document).ready(function() {
        $("#District_ID").change(function() {
            var ID_Sub = $(this).val();
            $.ajax({
                url: "../Ajex/Ajex_SelectSub.php",
                type: "POST",
                data: {
                    ID: ID_Sub
                },
                success: function(Sub) {
                    console.log(Sub);
                    $('#Sub').html(Sub);
                    document.getElementById('Sub').disabled = false;
                }

            });
        });
    });
    </script>

    <script>
    $(document).ready(function() {

        var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1.618,
            preview: ".img-preview",
            done: function(data) {
                // Output the result data for cropping image.
            }
        });

        var $inputImage = $("#inputImage");
        if (window.FileReader) {
            $inputImage.change(function() {
                var fileReader = new FileReader(),
                    files = this.files,
                    file;

                if (!files.length) {
                    return;
                }

                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function() {
                        $inputImage.val("");
                        $image.cropper("reset", true).cropper("replace", this.result);
                    };
                } else {
                    showMessage("Please choose an image file.");
                }
            });
        } else {
            $inputImage.addClass("hide");
        }

        $("#download").click(function() {
            window.open($image.cropper("getDataURL"));
        });

        $("#zoomIn").click(function() {
            $image.cropper("zoom", 0.1);
        });

        $("#zoomOut").click(function() {
            $image.cropper("zoom", -0.1);
        });

        $("#rotateLeft").click(function() {
            $image.cropper("rotate", 45);
        });

        $("#rotateRight").click(function() {
            $image.cropper("rotate", -45);
        });

        $("#setDrag").click(function() {
            $image.cropper("setDragMode", "crop");
        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, {
            color: '#1AB394'
        });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, {
            color: '#ED5565'
        });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, {
            color: '#1AB394'
        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.demo1').colorpicker();

        var divStyle = $('.back-change')[0].style;
        $('#demo_apidemo').colorpicker({
            color: divStyle.backgroundColor
        }).on('changeColor', function(ev) {
            divStyle.backgroundColor = ev.color.toHex();
        });

        $('.clockpicker').clockpicker();

        $('input[name="daterange"]').daterangepicker();

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment()
            .format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                    'September', 'October', 'November', 'December'
                ],
                firstDay: 1
            }
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                'MMMM D, YYYY'));
        });

        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });


        $(".touchspin1").TouchSpin({
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin2").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin3").TouchSpin({
            verticalbuttons: true,
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });


    });
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {
            allow_single_deselect: true
        },
        '.chosen-select-no-single': {
            disable_search_threshold: 10
        },
        '.chosen-select-no-results': {
            no_results_text: 'Oops, nothing found!'
        },
        '.chosen-select-width': {
            width: "95%"
        }
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_2").ionRangeSlider({
        min: 0,
        max: 10,
        type: 'single',
        step: 0.1,
        postfix: " carats",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_3").ionRangeSlider({
        min: -50,
        max: 50,
        from: 0,
        postfix: "°",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_4").ionRangeSlider({
        values: [
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "November", "December"
        ],
        type: 'single',
        hasGrid: true
    });

    $("#ionrange_5").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " km",
        from: 55000,
        hideMinMax: true,
        hideFromTo: false
    });

    $(".dial").knob();

    $("#basic_slider").noUiSlider({
        start: 40,
        behaviour: 'tap',
        connect: 'upper',
        range: {
            'min': 20,
            'max': 80
        }
    });

    $("#range_slider").noUiSlider({
        start: [40, 60],
        behaviour: 'drag',
        connect: true,
        range: {
            'min': 20,
            'max': 80
        }
    });

    $("#drag-fixed").noUiSlider({
        start: [40, 60],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min': 20,
            'max': 80
        }
    });
    </script>
</body>

</html>