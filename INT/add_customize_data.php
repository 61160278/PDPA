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
    <?php
        $arr_language = array(
            "ไทย","อังกฤษ","จีน","ญี่ปุ่น","เกาหลี"
        );

        $default_value = '';
        $initial_value = NULL;
    ?>
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
                                        <center>Customize Data</center>
                                    </u></b>
                            </h2>
                        </div>
                       
                        <div class="col-lg-12">
                            <h2>&nbsp;&nbsp;&nbsp;</h2>
                        </div>
                        
                        <div class="ibox-content"></div>
                        <div class="form-group row">
                        <h3>  
                                        <left>&nbsp; เลือกภาษา</left>
                            </h3>
                            
                            <div class="col">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <?php 
                                        if(isset($arr_language)){ // BEGIN CHECK
                                            foreach($arr_language as $key_language=>$value_language){ // BEGIN LOOP
                                                    $active_state = (isset($default_value) && $default_value==$value_language)?" btn-info active":"btn-light";
                                                    $check_state = (isset($default_value) && $default_value==$value_language)?" checked":"";
                                                    if(isset($default_value) && $default_value==$value_language && is_null($initial_value)){
                                                        $initial_value = true;  
                                                    }
                                    ?>
                                    <div class="col-sm-3">
                                    <label
                                        class="btn-language <?=$active_state?>">
                                        <input type="checkbox" name="language[]" id="language_<?=$key_language?>"
                                            autocomplete="off" value="<?=$value_language?>" <?=$check_state?>>
                                        <?=$value_language?>
                                    </label>
                                    </div>
                                                                <?php
                                            } // END LOOP
                                        } // END CHECK
                                        ?>
                                </div>
                            </div>
                            <!-- Table  -->

                            <br>
                            <div class="col-lg-1">
                                <input type="hidden" id="A_id" name="A_id">
                                <input type="hidden" id="Acknow_id" name="Acknow_id">
                                <input type="hidden" id="Approve_id" name="Approve_id">
                            </div>
                            <!-- Table Apover -->
                            <br> <br> <br>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary btn-rounded" value="Submit">
                            </div>
                        
                        
                        </div>
                        
                    </form>
                </div>
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
    </script>

    <script>
    $(function() {
        var row = 6;
        $("#addRow").click(function() {
            var tr = '';
            tr += '<tr id="firstTr">'
            tr += '<td align="center" name="data1">' + row + '</td>'
            tr += '<td>'
            tr += '<div class="input-group">'
            tr += '<input type="date" class="form-control" style="width:160px" name="data2[]" required>'
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
        $("#removeRow").click(function() {
            if ($("#myTbl tr").size() > 6) {
                $("#myTbl tr:last").remove();
                row -= 1;
            } else {
                alert("ต้องใส่ข้อมูลอย่างน้อย 5 รายการ");
            }
        });
    });
    </script>
</body>

</html>