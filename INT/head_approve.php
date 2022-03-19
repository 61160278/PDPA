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
        <?php 
		
			include "menu.php";
			
            $sql_home = "SELECT * From data_public_pdpa WHERE data_public_id = ".$_GET["id"]."";
            $result_home = mysqli_query($condbmc, $sql_home);
			$row_home = mysqli_fetch_array($result_home);
            ?>

            <?php
            if($row_home["data_public_type"] == 1){
                $sql_homeTable = "SELECT * From data_employee_pdpa AS demp
                                    INNER JOIN employee AS emp
                                    ON emp.Emp_ID = demp.data_employee_emp_id
                                    WHERE demp.data_employee_data_id = ".$_GET["id"]."";
                $result_homeTable = mysqli_query($condbmc, $sql_homeTable);
                
            }else if($row_home["data_public_type"] == 2){
                $sql_publicTable = "SELECT * From data_department_pdpa AS depar
                                    INNER JOIN master_mapping AS map
                                    ON map.Department_id = depar.data_department
                                    WHERE depar.data_department_data_id = ".$_GET["id"]."";
                $result_publicTable = mysqli_query($condbmc, $sql_publicTable);
                $row_publicTable = mysqli_fetch_array($result_publicTable);
            }
        ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php include "top-bar.php";?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <form id="ow" name="ow" method="POST" >
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
                                    <center>อนุมัติ</center>
                                </u></b><br>
                            <center>APPROVE<center>
                        </h2>
                    </div>

                    <div class="col-lg-12">
                        <h2>&nbsp;&nbsp;&nbsp;</h2>
                    </div>

                    <div class="ibox-content"></div>
                    <?php if(sizeof($row_publicTable) != 0){ 
                        echo '<table class="table table-bordered">';
                        echo "<tr>";
                        echo "<td>"."บริษัท"."</td>";
                        echo "<td>".$row_publicTable["Company"]." (".$row_publicTable["Company_id"].")"."</td>";
                        echo "<td>"."แผนก"."</td>";
                        echo "<td>".$row_publicTable["Department"]." (".$row_publicTable["Department_id"].")"."</td>";
                        echo "</tr>";
                        echo "</table>";
                    ?>

                    <? } ?>
                    <!-- company -->

                    <?php if(sizeof($result_homeTable) != 0){ ?>

                    
                    <!-- Department -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="myTbl" class="table table-bordered">
                                        <div class="panel-heading">
                                            <div class="row">

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
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <?php $index_emp = 1; 
                                                while($row_homeTable = mysqli_fetch_array($result_homeTable)){?>
                                                <tr>
                                                    <td align="center"><?php echo $index_emp ?></td>
                                                    <td align="center"><?php echo $row_homeTable["Emp_ID"] ?></td>
                                                    <td><?php echo $row_homeTable["Empname_engTitle"].". ". $row_homeTable["Empname_eng"]." ".$row_homeTable["Empsurname_eng"]?></td>
                                                    <td><?php echo $row_homeTable["data_employee_reason"]?></td>
                                                </tr>
                                                
                                                <?php $index_emp++; 
                                                } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- table left -->
                    </div>
                    <!-- table right -->
                    <? } ?>

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
					if($row_home["data_public_status"] == 1){
						$value = "1";
					}else if($row_home["data_public_status"] == 2){
						$value = "2";	
					}else if($row_home["data_public_status"] == 3){
						$value = "3";
					}
				?>

                <!--input type="hidden" id="comment" name="comment">
				<input type="hidden" id="comment1" name="comment1">
				<input type="hidden" id="button" name="button"-->
                <div id="modal_simple" class="modal fade" tabindex="-1" role="dialog">
                    <form id="ow" name="ow" method="POST" action="../ENG/update.php?id=<?php echo $_GET["id"]?>">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:green;">
                                    <h2 class="modal-title">
                                        <font color="white"><b>APPROVE</b></font>
                                    </h2>
                                </div>
                                <div class="modal-body">
                                    <label class="font-noraml">Confirm Approve ?</label>
                                    <br>
                                    <label class="font-noraml">Please specify the approval</label>
                                    <textarea type="text" class="form-control" rows="8" name="comment" id="comm"
                                        cols="60 " style="resize:none;"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="button" value="<? echo $value;?>"
                                        class="btn btn-primary">Approve</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- modal-bialog .// -->
                </div>
                <!-- modal.approve// -->

                <div id="modal" class="modal fade" tabindex="-1" role="dialog">
                    <form id="ow" name="ow" method="POST" action="../ENG/update.php?id=<?php echo $_GET["id"]?>">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:red;">
                                    <h2 class="modal-title">
                                        <font color="white"><b>REJECT</b></font>
                                    </h2>
                                </div>
                                <div class="modal-body">
                                    <label class="font-noraml">Confirm Approve ?</label>
                                    <br>
                                    <label class="font-noraml">Please specify the approval</label>
                                    <textarea type="text" class="form-control" rows="8" name="comment1" id="com"
                                        cols="60" style="resize:none;" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="button" value="5" class="btn btn-danger">Reject</button>
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
    function rejectform() {
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