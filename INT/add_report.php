<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../IMG/ico.ico" type="image/x-icon" />

    <title>PDPA | DENSO</title>

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

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php include "top-bar.php";?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <form id="ow" name="ow" method="POST" action="../ENG/insert_report.php">
                    <input type="hidden" id="button" name="button">
                    <div class="col-lg-12">
                        <br>
                        <ol class="breadcrumb">
                            <li>
                                <a href="home.php">Home</a>
                            </li>
                            <li class="active">
                                <strong>PDPA</strong>
                            </li>
                        </ol>
                        <h2>
                            <b><u>
                                    <center>Customize Data</center>
                                </u></b>
                        </h2>
                    </div>

                    <div class="col-lg-12">
                        <h2>&nbsp;&nbsp;&nbsp;</h2>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="myTbl" class="table table-bordered">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-sm-1">บริษัท</div>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="type_data"
                                                            onchange="select_all()" id="type_data">
                                                            <option value="0">Select company</option>
                                                            <option value="person">รายบุคคล </option>
                                                            <? echo Select_Type_Company($condbmc);?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="col_department">
                                                    <div class="col-sm-1">แผนก</div>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="department">
                                                            <? echo Select_Get_Department($condbmc, "SDM");?>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <br>

                                        <thead>
                                            <tr>
                                                <th style="width:40px">
                                                    <center>ลำดับ
                                                </th>
                                                <th>
                                                    <center>รหัสพนักงาน
                                                </th>
                                                <th>
                                                    <center>ชื่อ-นามสกุล
                                                </th>
                                                <th>
                                                    <center>เหตุผล
                                                </th>
                                                <th>
                                                    <center>ลบ
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <!-- <?php
                                            // $sql_borrow = "SELECT * From borrow_detail WHERE borrow_detail_emp_id = ".$_SESSION["tms_id"]."";
                                            // $result_borrow = mysqli_query($condbmc, $sql_borrow);
                                            // $row_borrow = mysqli_fetch_array($result_borrow);

                                            // $sql_name = "SELECT * From employee WHERE Emp_ID = ".$row_borrow["borrow_detail_emp_id"]."";
                                            // $result_name = mysqli_query($condbmc, $sql_name);
                                            // $row_name = mysqli_fetch_array($result_name);
                                        ?> -->
                                        </tbody>
                                        <input type="text" id="count_check" value="" hidden>
                                    </table>
                                </div>

                                <div align="right">
                                    <button class="btn btn-info" type="button" id="addRow" align="right"><i
                                            class="fa fa-plus"></i>&nbsp;ADD</button>
                                </div>
                                <!-- add -->
                            </div>
                        </div>
                        <!-- table left -->
                    </div>
                    <!-- Table  -->

                    <div class="col-sm-12">
                            <h3>  
                                <left>ประเภทข้อมูล Personal Data</left>
                            </h3>
                        </div>
                            
                        <div class="col-sm-12">
                        <div class="row">
                               
                                <?php
                                        $sql_customize = "SELECT * FROM customize_data_type";
                                        $result_customize = mysqli_query($condbmc, $sql_customize);
                                        while($row_customize = mysqli_fetch_array($result_customize)){
                                ?>
 
                                        <div class="col-md-3">
                                        <label class="form-check-label ">
                                            <input type = "checkbox" name = "checkbox_Personal[]" value = "Personal" >&nbsp;<?php echo $row_customize["customize_data_name"]?>
                                        </label>
                                        
                                        </div>            
                                    
                                <?php } ?>
                                        </div>
                        </div>
                     <!-- Table ประเภทข้อมูล Personal Data -->
                     <div class="col-sm-12">
                            <h3>  
                                <left>ประเภทข้อมูล Genaral Data</left>
                            </h3>
                        </div>
                            
                        <div class="col-sm-12">
                        <div class="row">
                               
                                <?php
                                       $sql_general = "SELECT * FROM general_data_type";
                                       $result_general = mysqli_query($condbmc, $sql_general);
                                       while($row_general = mysqli_fetch_array($result_general)){
                                ?>
 
                               
                                    
                                        <div class="col-md-3">
                                        <label class="form-check-label ">
                                        <input type = "checkbox" name = "checkbox_Genaral[]" value = "Genaral" >&nbsp;<?php echo $row_general["General_data_name"]?>
                                        </label>
                                        
                                        </div>            
                                    
                                <?php } ?>
                              
                                        </div>
                        </div>
                     <!-- Table ประเภทข้อมูล Genaral Data -->
                     

                    
                    
                    <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-primary btn-rounded" value="Submit">
                    </div>
            </div>
            </form>
        </div>
        <br>
       
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
    var company = 0;

    $('select').on('change', function() {
        let Company_ID = $('select[name=type_data] option').filter(':selected').val();
        let Sectioncode_ID = $('select[name=department] option').filter(':selected').val();
        console.log(Company_ID, Sectioncode_ID);
        // if(Company_ID == 1){
        //     company = "SDM";
        // } else if (Company_ID == 2){
        //     company = "SKD";
        // }
        let data = {
            Company_ID: Company_ID, //หน้าชื่อ หลังค่า
            Sectioncode_ID: Sectioncode_ID
        };
    });

    $("#myTbl_r").on('click', '.delete-row', function() { //delete row
        $(this).closest('.row-information').remove();
    });
    </script>

    <script>
    function select_all() {
        var check = $("#type_data").val();
        if (check == 'person') {
            $("#col_department").hide();
            $("#addRow").show();
            $('#myTbl').show();

            var tr = '';
            tr += '<tr align="center">'
            tr += '<td align="center" name="data1">' + (row + 1) + '</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr +=
                '<input type="text" class="form-control" style="width:160px" id="Emp_id_modol' + (row +1) + '" name="data_no[]" placeholder="JS000xxx" onkeyup="get_Emp(' + (row +1) + ')" required>'
            tr += '</div>'
            tr += '</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr +=
                '<input type="text" class="form-control" style="width:160px" id="Showname_modol' + (row +1) + '" name="emp_ID[]" disabled>'
            tr += '</div>'
            tr += '</td>'
            tr +=
                '<td><textarea type="text" placeholder="" class="form-control" name="reason[]" rows="4" required></textarea>'
            tr += '</td>'
            tr += '<td>'
            tr +=
                '<button class="delete-row" type="button" name="delect[]"><i class="fa fa-trash"></i></button>'
            tr += '</td>'
            tr += '</tr>'
            $('#myTbl > tbody:last').append(tr);

            row = ++row;
        } else {
            $("#col_department").show();
            $('#myTbl').hide();
            $("#addRow").hide();
        }
    }
    //function select_all() ตารางการโชว์ ซ่อน เมื่อเลือก รายบุคคล

    $(document).ready(function() {
        $("#col_department").hide();
        $('#myTbl').hide();
        $("#addRow").hide();
    });
    // $(document).ready(function()

    function checkform() {

        // return false;
    }

    function change_group() {


        let get_emp = [];
        let get_res = [];
        let get_name = [];
        var count_check = document.getElementById("count").value;

        for (i = 0; i < count_check; i++) {
            if (document.getElementById("checkbox_l" + i).checked) {
                get_emp.push(document.getElementById("emp_" + i).innerHTML)
                // console.log(get_emp)
                get_res.push(document.getElementById("res_" + i).value)
                // console.log(get_res)
                get_name.push(document.getElementById("name_" + i).innerHTML)
            }
            // if
        }
        // for


        let check_empid = [];
        $('#myTbl_r .row-information').each(function(index) {
            check_empid.push($(this).find('.emp-id').text());
        });
        console.log(check_empid); //ตารางขวา

        for (i = 0; i < get_emp.length; i++) {
            if (get_emp[i].includes(check_empid)) {
                //ถ้าเหมือนกันเก็บไว้ แจ้งเตือนให้หยุดตาราง
            }
        }

        console.log({
            get_emp
        });
        console.log({
            get_res
        });
        console.log({
            get_name
        });

        var tr = '';
        for (i = 0; i < get_emp.length; i++) {
            tr += '<tr class="row-information">';
            tr += '<td align="center">' + (i + 1) + '</td>';
            tr += '<td align="center" class="emp-id">' + get_emp[i] + '</td>';
            tr += '<td align="center">' + get_name[i] + '</td>';
            tr += '<td align="center">' + get_res[i] + '</td>';
            tr +=
                '<td align="center"><button class="delete-row" type="button"><i class="fa fa-trash"></i></button></td>';
            tr += '</tr>';
        }
        $('#tableBody').append(tr);

    }
    </script>

    <script>
    function get_Emp(index) {
        Emp_id = document.getElementById("Emp_id_modol"+index).value;
        var empname = "";
        //console.log (Emp_id)

        $.ajax({
            type: "POST",
            url: "../Ajex/Ajex_Select_emp_id.php",
            data: {
                "Emp_id": Emp_id
            },
            // dataType: "JSON",
            success: function(data, status) {
                // console.log(status)
                //console.log(data)

                if (data == "null") {

                    document.getElementById("Showname_modol"+index).value = "ไม่มีข้อมูล";

                } else {

                    empname = data.substring(1, data.length - 1);
                    document.getElementById("Showname_modol"+index).value = empname;

                    //console.log(999)
                    //console.log(empname)
                }

                // if-else
            }

        });
        // ajax
    }
    // function get_Emp 

    var row = 0;
    $(function() {
        $("#addRow").click(function() {
            var tr = '';
            tr += '<tr align="center">'
            tr += '<td align="center" name="data1">' + (row + 1) + '</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr +=
                '<input type="text" class="form-control" style="width:160px" id="Emp_id_modol' + (row +1) + '" name="data_no[]" placeholder="JS000xxx" onkeyup="get_Emp(' + (row +1) + ')" required>'
            tr += '</div>'
            tr += '</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr +=
                '<input type="text" class="form-control" style="width:160px" id="Showname_modol' + (row +1) + '" name="emp_ID[]" disabled>'
            tr += '</div>'
            tr += '</td>'
            tr +=
                '<td><textarea type="text" placeholder="" class="form-control" name="reason[]" rows="4" required></textarea>'
            tr += '</td>'
            tr += '<td>'
            tr +=
                '<button class="delete-row" type="button" name="delect[]"><i class="fa fa-trash"></i></button>'
            tr += '</td>'
            tr += '</tr>'
            $('#myTbl > tbody:last').append(tr);

            row = ++row;
        });

    });
    </script>

    <script>
    $('#tableBody').on('click', '.delete-row', function() {
        $(this).closest("tr").remove();
        // reset_number();
    })
    </script>
</body>

</html>