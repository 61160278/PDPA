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
                <form id="ow" name="ow" method="POST" action="../ENG/insert.php">
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
                                    <center>ยืมแฟ้มประวัติพนักงาน</center>
                                </u></b><br>
                            <center>Borrow Employee Profiles<center>
                        </h2>
                    </div>

                    <div class="col-lg-12">
                        <h2>&nbsp;&nbsp;&nbsp;</h2>
                    </div>

                    <div class="ibox-content"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <tr>
                                <td class="form-group">
                                    <div class="col-sm-2">ประเภทการยืมเอกสาร</div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="data_item3">
                                            <? echo Select_Type_Borrow($condbmc);?>
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
                                <table id="myTbl" class="table table-bordered">
                                    <thead>

                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>รหัสพนักงาน
                                                </th>
                                                <th>
                                                    <center>ชื่อ-นามสกุล
                                                </th>
                                                <th>
                                                    <center>เหตุผลการร้องขอ
                                                </th>
                                                <th style="width:80px">
                                                    <center>วันที่ยืม
                                                </th>
                                                <th style="width:80px">
                                                    <center>วันที่คืน
                                                </th>
                                            </tr>
                                        </thead>

                                    <tbody>
                                    
                                    
                               



                                        <tr id="firstTr">
                                        <?php
                                        $sql_public = "SELECT * From employee WHERE Emp_ID = ".$_SESSION["tms_id"]."";
                                        $result_public = mysqli_query($condbmc, $sql_public);
                                        $row_public = mysqli_fetch_array($result_public);
                                        ?>
    
                                            <tr align="center">
                                            <td><?php echo $row_public["Emp_ID"]?></td>
                                            <!-- <td><input type="text" class="form-control" id="Emp_id_modol"  name="data_no[]" -->
                                                    <!-- placeholder="JS000xxx" onkeyup="get_Emp()"> -->

                                            <!-- </td> -->
                                            <td><?php echo $row_public["Empname_eng"]." ".$row_public["Empsurname_eng"]?></td>
                                            <!-- <td> <input  type="text" class="form-control" id="Showname_modol"   -->
                                                    <!-- placeholder="Name Surname"> -->
                                            <!-- </td> -->
                                            <td><textarea type="text" placeholder="" class="form-control"
                                                    name="data_re[]" rows="2" required></textarea>
                                            </td>
                                            <td><input type="date" min="<?php echo date("m-d-Y")?>" class="form-control" style="width:160px"
                                                    name="data1[]" required></td>
                                            <td><input type="date" class="form-control" style="width:160px"
                                                    name="data[]" required></td>
                                            
                                                <?
                                                        $sql_Approve = "SELECT * From employee WHERE Emp_ID = ?";
                                                        $result_Approve = mysqli_query($condbmc, $sql_Approve);
                                                        
                                                    ?>

		
                                                <?
                                                        $sql_Approve = "SELECT * From employee";
                                                        $result_Approve = mysqli_query($condbmc, $sql_Approve);
                                                        while($row_Approve = mysqli_fetch_array($result_Approve)){
                                                         //   echo '<option value="'.$row_Approve["Emp_ID"].'">'.$row_Approve["Empname_eng"]." ".$row_Approve["Empsurname_eng"].'</option>';
                                                        }
                                                ?>
                                        </tr>    
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Table Expense Approve -->

                    <br>
                    <div class="col-lg-1">
                        <input type="hidden" id="A_id" name="A_id">
                        <input type="hidden" id="Acknow_id" name="Acknow_id">
                        <input type="hidden" id="Approve_id" name="Approve_id">
                    </div>
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
    $(document).ready(function() {
        $("#approve").change(function() {
            var ID = $(this).val();
            document.getElementById("Approve_id").value = ID;
        });
    });

    $(document).ready(function() {
        $("#acknow").change(function() {
            var ID = $(this).val();
            document.getElementById("Acknow_id").value = ID;
        });
    });

    $(document).ready(function() {
        $("#mgr").change(function() {
            var ID = $(this).val();
            document.getElementById("A_id").value = ID;
        });
    });

    function get_Emp() {
    Emp_id = document.getElementById("Emp_id_modol").value;
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

                document.getElementById("Showname_modol").value = "ไม่มีข้อมูล";

            } else {
                
                empname = data.substring(1,data.length - 1);
                document.getElementById("Showname_modol").value = empname;

                //console.log(999)
                //console.log(empname)
            }

            // if-else
        }

    });
    // ajax
}
// function get_Emp  


    </script>

    <script>
    $(function() {
        var row = 2;
        $("#addRow").click(function() {
            var tr = '';
            tr += '<tr id="firstTr">'

            tr +=
                '<td><textarea type="text" placeholder="" class="form-control" name="data4[]" rows="2" required></textarea>'
            tr += '</td>'
            tr +=
                '<td><textarea type="text" placeholder="" class="form-control"name="data5[]" rows="4" required></textarea>'
            tr += '</td>'
            tr +=
                '<td><textarea type="text" placeholder="" class="form-control" name="data4[]" rows="2" required></textarea>'
            tr += '</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr += '<input type="date" class="form-control" style="width:160px" name="data2[]" required>'
            tr += '</div>'
            tr += '</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr += '<input type="date" class="form-control" style="width:160px" name="data2[]" required>'
            tr += '</div>'
            tr += '</td>'

            tr += '</tr>'

            $('#myTbl > tbody:last').append(tr);

            row = row + 1;
        });
        $("#removeRow").click(function() {
            if ($("#myTbl tr").size() > 2) {
                $("#myTbl tr:last").remove();
                row -= 1;
            } else {
                alert("ต้องใส่ข้อมูลอย่างน้อย 1 รายการ");
            }
        });
    });
    </script>



</body>

</html>