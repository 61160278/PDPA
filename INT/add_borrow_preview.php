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


        <?php 
            $row=0;
            $sql_Table = "SELECT * From borrow
            where borrow.borrow_id = ".$_GET["id"]."";
            $result_Table = mysqli_query($condbmc, $sql_Table);
			while($row_Table = mysqli_fetch_array($result_Table)){
                $array7[$row]=$row_Table['date_borrow'];
                $array1[$row]=$row_Table['date_return'];
               
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
                            <b><u>
                                    <center>PDPA</center>
                                </u></b><br>
                            <center>ยืมแฟ้มประวัติพนักงาน<center>
                        </h2>
                        <text type="text" name="comment1">
                            <p style="color:red" align="center">
                                <? echo $row_home["emp_trv_comment"]?>
                            </p>
                    </div>

                    <!-- Table Flight -->


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="myTbl" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>ชื่อ-นามสกุล
                                            </th>
                                            <th>
                                                <center>ประเภทการร้องขอ
                                            </th>
                                            <th>
                                                <center>วันที่ยืม
                                            </th>
                                            <th>
                                                <center>วันที่คืน
                                            </th>
                                            <th>
                                                <center>เหตุผลการร้องขอ
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            $sql_emp = "SELECT * FROM borrow
                                            INNER JOIN employee ON borrow.emp_no = employee.Emp_ID
                                            where borrow.borrow_id = ".$_GET["id"]."";
                                            $result_emp = mysqli_query($condbmc, $sql_emp);
                                            $row_emp = mysqli_fetch_array($result_emp)
                                            ?>

                                        <?php
                                            $sql_reason = "SELECT reason FROM borrow
                                            where borrow.borrow_id = ".$_GET["id"]."";
                                            $result_reason = mysqli_query($condbmc, $sql_reason);
                                            $row_reason = mysqli_fetch_array($result_reason)
                                            ?>
                                        <?php
                                            $sql_date_borrow = "SELECT date_borrow ,date_return FROM borrow
                                            where borrow.borrow_id = ".$_GET["id"]."";
                                            $result_date_borrow = mysqli_query($condbmc, $sql_date_borrow);
                                            $row_date_borrow = mysqli_fetch_array($result_date_borrow)
                                            ?>

                                        <tr id="firstTr">
                                            <td align="left">
                                                <?php echo $row_emp["Empname_eng"]." ".$row_emp["Empsurname_eng"]?></td>
                                            
                                            <td><?php 
                                                if($row_emp["borrow_type"] == 1){
                                                    echo "ยืมแฟ้มประวัติพนักงาน";
                                                }
                                                // if
                                                else if($row_emp["borrow_type"] == 2){ 
                                                    echo "คัดสำเนาเอกสาร";
                                            }?></td>
                                            <td><?php echo date("d-M-y", strtotime($row_date_borrow["date_borrow"]));?>
                                            </td>
                                            <td><?php echo date("d-M-y", strtotime($row_date_borrow["date_return"]));?>
                                            </td>
                                            <td><?php echo $row_reason ["reason"]?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Table Schedule of International Travel  -->
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
            tr += '<td align="center" name="data1">' + row + '</td>'
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
            tr +=
                '<td><textarea type="text" placeholder="" class="form-control" name="data4[]" rows="2" required></textarea>'
            tr += '</td>'
            tr +=
                '<td><textarea type="text" placeholder="" class="form-control"name="data5[]" rows="4" required></textarea>'
            tr += '</td>'
            tr += '<td><select class="form-control" style="width:155px" name="data6[]" required>'
            tr += '<? echo Select_Define_Type($condbmc); ?>'
            tr += '</select></td>'
            tr +=
                '<td><textarea type="text" placeholder="" class="form-control" name="data8[]" rows="2" required></textarea>'
            tr += '</td>'
            tr += '</tr>'

            $('#myTbl > tbody:last').append(tr);
            row = row + 1;
        });
    });
    </script>
</body>

</html>