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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link href="../ADS/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
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
                <form id="ow" name="ow" method="POST">
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

                    <?php if(sizeof($row_publicTable) != 0){ 
                        echo '<table class="table table-striped table-bordered table-hover dataTables-example">';
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th><center>"."บริษัท"."</th>";
                        echo "<th><center>"."แผนก"."</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tr>";
                        echo "<td>".$row_publicTable["Company"]." (".$row_publicTable["Company_id"].")"."</td>";
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
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table id="myTbl" class="table table-striped table-bordered table-hover dataTables-example">
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
                                                    <td><?php echo $row_homeTable["Empname_engTitle"]." ". $row_homeTable["Empname_eng"]." ".$row_homeTable["Empsurname_eng"]?>
                                                    </td>
                                                    <td><?php echo $row_homeTable["data_employee_reason"]?></td>
                                                </tr>

                                                <?php $index_emp++; 
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
                                <textarea type="text" class="form-control" rows="8" name="comment" id="comm" cols="60 "
                                    style="resize:none;"></textarea>
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
                                <label class="font-noraml">Confirm Reject ?</label>
                                <br>
                                <label class="font-noraml">Please specify the Reject</label>
                                <textarea type="text" class="form-control" rows="8" name="comment1" id="com" cols="60"
                                    style="resize:none;" required></textarea>
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
            <!-- modal.reject// -->


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
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="../ADS/assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="../ADS/assets/js/inspinia.js"></script>
    <script src="j../ADS/assets/s/plugins/pace/pace.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'ExampleFile'
                },
                {
                    extend: 'pdf',
                    title: 'ExampleFile'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

        /* Init DataTables */
        var oTable = $('#editable').DataTable();

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable('../example_ajax.php', {
            "callback": function(sValue, y) {
                var aPos = oTable.fnGetPosition(this);
                oTable.fnUpdate(sValue, aPos[0], aPos[1]);
            },
            "submitdata": function(value, settings) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition(this)[2]
                };
            },

            "width": "90%",
            "height": "100%"
        });


    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData([
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row"
        ]);

    }
    </script>
</body>

</html>