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

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <?php include "top-bar.php";?>
            </div>
            <div class="row border-bottom white-bg dashboard-header">
                <div class="col-sm-12">
                    <h2>
                        <center><b>ข้อมูลของพนักงานที่สามารถเปิดเผยได้</b></center>
                    </h2>
                </div>
                <br>
                <div class="col-sm-12">
                    <br>
                    <div class="ibox-content">
                        <br>
                        <br>
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <label class="DTTT btn-group pull-right mt-sm"><a href="add_public_data.php">
                                    <button class="btn btn-success btn-rounded" type="button"><i class="fa fa-plus"></i>  ขอข้อมูลพนักงาน</button></a>
                            </label>
                            <thead>
                                <tr>
                                    <th>
                                        <center>ชื่อ-นามสกุล
                                    </th>
                                    <th>
                                        <center>วันที่ยืม
                                    </th>
                                    <th>
                                        <center>สถานะ
                                    </th>
                                    <th>
                                        <center>เครื่องมือ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql_name = "SELECT * From data_public_pdpa WHERE data_public_requester_emp_id = ".$_SESSION["tms_id"]."";
                                    $result_name = mysqli_query($condbmc, $sql_name);
                                    while($row_name = mysqli_fetch_array($result_name)){
                                        if($row_name["data_public_status"] == 1){
                                            $status = "Waiting Approver 1";
                                        }else if($row_name["data_public_status"] == 2){
                                            $status = "Waiting Approver 2";
                                        }else if($row_name["data_public_status"] == 3){
                                            $status = "Waiting Final Approver";
                                        }else if($row_name["data_public_status"] == 4){
                                            $status = "Approved";
                                        }else if($row_name["data_public_status"] == 5){
                                            $status = "Reject";
                                        }else if($row_name["data_public_status"] == 6){
                                            $status = "Cancel";
                                        }
                                ?>
                                <?php
                                        $sql_public = "SELECT * From employee WHERE Emp_ID = ".$row_name["data_public_requester_emp_id"]."";
                                        $result_public = mysqli_query($condbmc, $sql_public);
                                        $row_public = mysqli_fetch_array($result_public);
                                ?>

                                <tr align="center">
                                    <td align="left"><?php echo $row_public["Empname_eng"]." ".$row_public["Empsurname_eng"]?></td>
                                    <td><?php echo date("d-M-y", strtotime($row_name["data_public_date"]));?></td>
                                    </td>
                                    <td><?php echo $status?></td>
                                    <td>
                                        <a href="add_public_data_preview.php?id=<?php echo $row_name["data_public_id"] ?>">
                                            <button class="btn btn-primary btn-rounded" type="button">
                                                <i class="fa fa-search"></i></button></a>
                                        <?php if($row_name["emp_trv_status"] == 2){ ?>
                                        <a href="edit_inter_preview.php?id=<?php echo $row_name["emp_trv_id"] ?>">
                                            <button class="btn btn-warning btn-rounded"><i
                                                    class="fa fa-pencil-square-o"></i></button></a>
                                        <button class="btn btn-danger btn-rounded" type="button" data-toggle="modal"
                                            data-target="#modal_simple<?php echo $row_name["emp_trv_id"]?>"><i
                                                class="fa fa-times"></i></button>
                                        <button class="btn btn-success"><i class="fa fa-upload"> PDF</i></button>
                                        <?php } else if($row_name["emp_trv_status"] == 3){ ?>
                                        <a href="edit_inter_preview.php?id=<?php echo $row_name["emp_trv_id"] ?>">
                                            <button class="btn btn-warning btn-rounded"><i
                                                    class="fa fa-pencil-square-o"></i></button></a>
                                        <button class="btn btn-danger btn-rounded" type="button" data-toggle="modal"
                                            data-target="#modal_simple<?php echo $row_name["emp_trv_id"]?>"><i
                                                class="fa fa-times"></i></button>
                                        <button class="btn btn-success"><i class="fa fa-upload"> PDF</i></button>
                                        <?php } else if($row_name["emp_trv_status"] == 5){ ?>
                                        <a href="edit_inter_preview.php?id=<?php echo $row_name["emp_trv_id"] ?>">
                                            <button class="btn btn-warning btn-rounded"><i
                                                    class="fa fa-pencil-square-o"></i></button></a>
                                        <button class="btn btn-danger btn-rounded" type="button" data-toggle="modal"
                                            data-target="#modal_simple<?php echo $row_name["emp_trv_id"]?>"><i
                                                class="fa fa-times"></i></button>
                                        <button class="btn btn-success"><i class="fa fa-upload"> PDF</i></button>
                                        <?php } ?>

                                        <?php if($row_name["emp_trv_status"] == 1){ ?>
                                        <a href="edit_inter_preview.php?id=<?php echo $row_name["emp_trv_id"] ?>">
                                            <button class="btn btn-warning btn-rounded"><i
                                                    class="fa fa-pencil-square-o"></i></button></a>
                                        <button class="btn btn-danger btn-rounded" type="button" data-toggle="modal"
                                            data-target="#modal_simple<?php echo $row_name["emp_trv_id"]?>"><i
                                                class="fa fa-times"></i></button>
                                        <button class="btn btn-success"><i class="fa fa-upload"> PDF</i></button>

                                        <form id="ow" name="ow" method="POST"
                                            action="../ENG/update.php?id=<?php echo $row_name["emp_trv_id"]?>">
                                            <input type="hidden" id="button" name="button">
                                            <div id="modal_simple<?php echo $row_name["emp_trv_id"]?>"
                                                class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color:red;">
                                                            <h2 class="modal-title">
                                                                <font color="white"><b>Cancel</b></font>
                                                            </h2>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center><label class="font-noraml"><b>Confirm Cancel ?
                                                                    </b></label>
                                                            </center><input type="hidden" name="cancel" id="cancel">
                                                            <br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" onclick="cancelform()" name="submit"
                                                                class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <? } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
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