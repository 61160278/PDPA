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
        <?php include "menu.php";?>
        <?php 
            $sql_home = "SELECT * From employee_travel WHERE emp_trv_id = ".$_GET["id"]."";
            $result_home = mysqli_query($condbmc, $sql_home);
			$row_home = mysqli_fetch_array($result_home);
        ?>
        <?php 
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
                <form id="ow" name="ow" method="POST" action="../ENG/insert.php?id=<?php echo $_GET["id"]?>">
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
                            <b><u><center>INTERNATIONAL TRAVEL</center></u></b><br>
                            <center>Traveling Application & Expense<center>
                        </h2>
                        <text type="text" name="comment1"><p style="color:red" align="center"><? echo $row_home["emp_trv_comment"]?></p>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-3 b-r">
                                <div class="form-group"><label class="font-noraml">ประเทศ | Country</label>
                                    <textarea type="text" name="country" class="form-control" rows="3" readonly><? echo $row_home["emp_trv_country"]?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3 b-r">
                                <div class="form-group"><label class="font-noraml">เดินทางไป | Travel to</label>
                                    <textarea type="text" name="travel_to" class="form-control" rows="3" readonly><? echo $row_home["emp_trv_to"]?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 b-r">
                                <div class="form-group"><label class="font-noraml">วัตถุประสงค์*คำอธิบายรายละเอียด | Purpose*Describe detail</label>
                                    <textarea class="form-control" name="purpose" rows="3" readonly><? echo $row_home["emp_trv_purpose"]?></textarea>
                                </div>
                            </div>
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
                                                    <center><label class="col-sm-7 control-label">Schedule (depart/return)<br>ตารางเวลา (ไป/กลับ)</label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control" style="width:130px" name="data_item1" disabled>
                                                            <?php
										                        $sql_Travel_Type = "SELECT * From travel_type";
                                                                $result_Travel_Type = mysqli_query($condbmc, $sql_Travel_Type);
                                                                while($row_Travel_Type = mysqli_fetch_array($result_Travel_Type)){
									                        ?>
                                                            <option value ="<?echo $row_Travel_Type["trv_id"];?>"<?php if($row_Travel_Type["trv_id"]==$row_home["emp_trv_trv_id"]){echo "selected=selected";}?>><? echo $row_Travel_Type["trv_name"]; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr align="center">
                                                <td rowspan="2"><br><br><br> Planned <br> Schedule </td>
                                                <td><br>Depart</td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml"
                                                            class="input-group-addon">Date | วันเดินทางไป</label>
                                                        <input type="date" name="date_d" class="form-control" value="<?php echo $row_home["emp_trv_date_go_flight"]?>" readonly></td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางไป</label>
                                                        <div class="input-group time"><input type="time" name="time_d" class="form-control" value="<? echo $row_home["emp_trv_time_go_flight"]?>" readonly >
                                                        </div>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml"
                                                            class="input-group-addon">Date | วันเดินทางไป</label>
                                                        <input type="date" name="date_depart" class="form-control" value="<?php echo $row_home["emp_trv_date_go_schedule"]?>" readonly>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางไป</label>
                                                        <div class="input-group time"><input type="time" name="time_depart" class="form-control" value="<?php echo $row_home["emp_trv_time_go_schedule"]?>" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr align="center">
                                                <td><br>Return</td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml"
                                                            class="input-group-addon">Date | วันเดินทางกลับ</label>
                                                        <input type="date" name="date_r" class="form-control" value="<?php echo $row_home["emp_trv_date_return_flight"]?>" readonly>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางกลับ</label>
                                                        <div class="input-group time"><input type="time" name="time_r" class="form-control" value="<?php echo $row_home["emp_trv_time_return_flight"]?>" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group">
                                                        <label class="font-noraml"
                                                            class="input-group-addon">Date | วันเดินทางกลับ</label>
                                                        <input type="date" name="date_return" class="form-control" value="<?php echo $row_home["emp_trv_date_return_schedule"]?>" readonly>
                                                    </div>
                                                </td>
                                                <td align="left">
                                                    <div class="form-group"><label class="font-noraml">Time | เวลาเดินทางกลับ</label>
                                                        <div class="input-group time"><input type="time"
                                                                name="time_return" class="form-control" value="<?php echo $row_home["emp_trv_time_return_schedule"]?>" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="6" class="form-group">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Private schedule :<br>กิจส่วนตัว</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" style="width:500px" tabindex="2" name="data_item2" disabled>
                                                            <?php
										                        $sql_Business_Type = "SELECT * From business_type";
                                                                $result_Business_Type = mysqli_query($condbmc, $sql_Business_Type);
                                                                while($row_Business_Type = mysqli_fetch_array($result_Business_Type)){
									                        ?>
                                                            <option value ="<?php echo $row_Business_Type["bsn_id"];?>"<?php if($row_Business_Type["bsn_id"]==$row_home["emp_trv_bsn_id"]){echo "selected=selected";}?>><? echo $row_Business_Type["bsn_name"]; ?></option>
                                                            <?php } ?>
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
                        <!-- Table Flight -->

                        <h3><span class="badge"><font size="4px" color="black">
                            <b>Schedule of International Travel | ตารางการเดินทางระหว่างประเทศ</b>
                            </span></font>
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
                                                        <input type="date" class="form-control" style="width:150px" name="data2[]" value="<?php echo $array[$i]?>" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                <select class="form-control" style="width:80px" name="data3[]" disabled>
                                                    <?php
										                $sql_Calendar_Type = "SELECT * From calendar_type";
                                                        $result_Calendar_Type = mysqli_query($condbmc, $sql_Calendar_Type);
                                                        while($row_Calendar_Type = mysqli_fetch_array($result_Calendar_Type)){
								                    ?>
                                                        <option value ="<?echo $row_Calendar_Type["cld_id"];?>"<?php if($row_Calendar_Type["cld_id"]==$array2[$i]){echo "selected=selected";}?>><?php echo $row_Calendar_Type["cld_name"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                                </td>
                                                <td><textarea type="text" placeholder="" class="form-control"
                                                        name="data4[]" rows="2" readonly><?php echo $array3[$i]?></textarea></td>
                                                <td><textarea type="text" placeholder="" class="form-control"
                                                        name="data5[]" rows="4" readonly><?php echo $array4[$i]?></textarea></td>
                                                <td>
                                                    <select class="form-control" name="data6[]" style="width:155px" disabled>
                                                        <?php
										                    $sql_Define_Type = "SELECT * From define_type";
                                                            $result_Define_Type = mysqli_query($condbmc, $sql_Define_Type);
                                                            while($row_Define_Type = mysqli_fetch_array($result_Define_Type)){
									                    ?>
                                                        <option value ="<?php echo $row_Define_Type["def_id"];?>"<?php if($row_Define_Type["def_id"]==$array5[$i]){echo "selected=selected";}?>><?php echo $row_Define_Type["def_name"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td><textarea type="text" placeholder="" class="form-control" name="data8[]" rows="2" readonly><?php echo $array6[$i]?></textarea></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Table Schedule of International Travel  -->

                        <h3><span class="badge"><font size="4px" color="black">
                                <b>Expense Approve | การอนุมัติค่าใช้จ่าย</b>
                            </span></font>
                        </h3>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <tr>
                                    <td class="form-group">
                                        <div class="col-sm-2">Payment | ค่าตอบแทน</div>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="data_item3" disabled>
                                                <?php
                                                    $sql_Withdraw_Type = "SELECT * From withdraw_type";
                                                    $result_Withdraw_Type = mysqli_query($condbmc, $sql_Withdraw_Type);
                                                    while($row_Withdraw_Type = mysqli_fetch_array($result_Withdraw_Type)){
                                                ?>
                                                <option value ="<?echo $row_Withdraw_Type["wid_id"];?>"<?php if($row_Withdraw_Type["wid_id"]==$row_home["emp_trv_wid_id"]){echo "selected=selected";}?>><? echo $row_Withdraw_Type["wid_name"]; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                    </td>
                                </tr>
                            </div>
                        </div>
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
                                                <td><select class="select2_demo_1 form-control" name="mgr" id="mgr" style="width:100%;"
                                                    tabindex="2" disabled>
                                                    <?php
                                                        $sql_Approve = "SELECT * From employee";
                                                        $result_Approve = mysqli_query($condbmc, $sql_Approve);
                                                        while($row_Approve = mysqli_fetch_array($result_Approve)){
                                                    ?>
                                                    <option value ="<?php echo $row_Approve["Emp_ID"];?>"<?php if($row_Approve["Emp_ID"]==$row_home["emp_trv_check"]){echo "selected=selected";}?>>
                                                    <?php echo $row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"]; ?></option>
                                                    <?php } ?>
                                                </select></td>

                                                <td><select class="select2_demo_1 form-control" name="acknow" id="acknow" style="width:100%;"
                                                    tabindex="2" disabled>
                                                    <?php
                                                        $sql_Approve = "SELECT * From employee";
                                                        $result_Approve = mysqli_query($condbmc, $sql_Approve);
                                                        while($row_Approve = mysqli_fetch_array($result_Approve)){
                                                    ?>
                                                    <option value ="<?php echo $row_Approve["Emp_ID"];?>"<?php if($row_Approve["Emp_ID"]==$row_home["emp_trv_acknowledge"]){echo "selected=selected";}?>>
                                                    <?php echo $row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"]; ?></option>
                                                    <?php } ?>
                                                </select></td>

                                                <td><select class="select2_demo_1 form-control" name="approve" id="approve" style="width:100%;"
                                                    tabindex="2" disabled>
                                                    <?php
                                                        $sql_Approve = "SELECT * From employee";
                                                        $result_Approve = mysqli_query($condbmc, $sql_Approve);
                                                        while($row_Approve = mysqli_fetch_array($result_Approve)){
                                                    ?>
                                                    <option value ="<?php echo $row_Approve["Emp_ID"];?>"<?php if($row_Approve["Emp_ID"]==$row_home["emp_trv_approve"]){echo "selected=selected";}?>>
                                                    <?php echo $row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"]; ?></option>
                                                    <?php } ?>
                                                </select></td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
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
    $(document).ready(function() {
        $("#mgr").change(function() {
            var ID = $(this).val();
            document.getElementById("A_id").value = ID;
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
            row = row + 1;
        });
    });
    </script>
</body>
</html>