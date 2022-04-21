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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <!-- Toastr style -->
    <link href="../ADS/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <?php include "menu.php";?>

        <?php 
            $sql_home = "SELECT * From data_report WHERE data_report_id = ".$_GET["id"]."";
            $result_home = mysqli_query($condbmc, $sql_home);
			$row_home = mysqli_fetch_array($result_home);
        ?>
        <?php
            if($row_home["data_report_type"] == 1){
                $sql_homeTable = "SELECT * From data_employee_report AS demp
                                    INNER JOIN employee AS emp
                                    ON emp.Emp_ID = demp.data_employee_emp_report_id
                                    INNER JOIN data_report_customize AS customize
                                    ON customize.data_report_id = demp.data_employee_data_report_id	
                                    INNER JOIN data_report_general AS general
                                    ON general.data_report_id = demp.data_employee_data_report_id
                                    WHERE demp.data_employee_data_report_id = ".$_GET["id"]."";
                $result_homeTable = mysqli_query($condbmc, $sql_homeTable);
            }
            // }else if($row_home["data_report_type"] == 2){
            //     $sql_publicTable = "SELECT * From data_department_report AS depar
            //                         INNER JOIN master_mapping AS map
            //                         ON map.Department_id = depar.data_department
            //                         WHERE depar.data_department_data_id = ".$_GET["id"]."";
            //     $result_publicTable = mysqli_query($condbmc, $sql_publicTable);
            //     $row_publicTable = mysqli_fetch_array($result_publicTable);
            // }
        ?>
        <?php if(sizeof($result_homeTable) != 0){ ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <?php include "top-bar.php";?>
            </div>
            <div class="row border-bottom white-bg dashboard-header">
                <div class="col-sm-12">
                    <h2>
                        <b><u>
                                <center>อนุมัติ</center>
                            </u></b><br>
                        <center>APPROVE<center>
                    </h2>
                </div>
                <br>
                <div class="col-sm-12">
                    <br>
                    <div class="ibox-content">
                        <br>
                        <table class="table table-striped table-bordered table-hover dataTables-example">

                            <thead>
                                <tr>
                                    <th>
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
                                        <center>แผนก
                                    </th>
                                    <th>
                                        <center>ข้อมูล
                                    </th>
                                    <th>
                                        <center>ข้อมูล
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
                                    <td><?php echo $row_homeTable["data_employee_report_reason"]?></td>
                                    <td><?php echo $row_homeTable["Sectioncode_ID"]?></td>
                                    <td><?php echo $row_homeTable["customize_data_id"]?></td>
                                    <td><?php echo $row_homeTable["General_data_id"]?></td>

                                </tr>

                                <?php $index_emp++; 
                                                } ?>
                            </tbody>


                        </table>
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
                        <!-- Approve -->

                        <?php
					if($row_home["data_report_status"] == 1){
						$value = "1";
					}else if($row_home["data_report_status"] == 2){
						$value = "2";	
					}else if($row_home["data_report_status"] == 3){
						$value = "3";
					}
				?>

                <div id="modal_simple" class="modal fade" tabindex="-1" role="dialog">
                    <form id="ow" name="ow" method="POST" action="../ENG/update_report.php?id=<?php echo $_GET["id"]?>">
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
                                    <input type="text" name="boroow_ID" value="<?php echo $row_emp ["data_report_id"] ?>"
                                        hidden>
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
                    <form id="ow" name="ow" method="POST" action="../ENG/update_report.php?id=<?php echo $_GET["id"]?>">
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
                                    <textarea type="text" class="form-control" rows="8" name="comment1" id="com"
                                        cols="60" style="resize:none;" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <input type="text" name="boroow_ID" value="<?php echo $row_emp ["data_report_id"] ?>"
                                        hidden>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="button" value="5" class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- modal-bialog .// -->
                </div>
                <!-- modal.reject// -->

                        <br>
                    </div>
                    <? } ?>
                </div>
            </div>
            <?php include "footer.php";?>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="../ADS/assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../ADS/assets/js/inspinia.js"></script>
    <script src="j../ADS/assets/s/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->

    <script>
    function cancelform() {
        document.getElementById("button").value = 6;
        document.getElementById("ow").submit();
    }


    $(document).ready(function() {
        $("#cancel").change(function() {
            var ID = $(this).val();
            document.getElementById("cancel").value = ID;
        });
    });
    </script>

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