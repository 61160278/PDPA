

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
        <?php 
            include "menu.php";
            $sql_emp = "SELECT * From authorize_international_module WHERE aut_int_emp_id = ".$_SESSION["tms_id"]." ";
            $result_emp = mysqli_query($condbmc, $sql_emp);
            $row_emp = mysqli_fetch_array($result_emp);

            if($row_emp['aut_int_role_id'] == 1){
                $sql_command = "SELECT * From employee_travel WHERE emp_trv_status = 1 AND emp_trv_check = ".$_SESSION["tms_id"]." ";			
            }else if($row_emp['aut_int_role_id'] == 2){
                $sql_command = "SELECT * From employee_travel WHERE emp_trv_status = 2 AND emp_trv_acknowledge = ".$_SESSION["tms_id"]." ";
            }else if($row_emp['aut_int_role_id'] == 3){
                $sql_command = "SELECT * From employee_travel WHERE emp_trv_status = 3 AND emp_trv_approve = ".$_SESSION["tms_id"]." ";
            }else if($row_emp['aut_int_role_id'] == 4){
                $sql_command = "SELECT * From employee_travel WHERE emp_trv_status = 4 AND emp_trv_approve = ".$_SESSION["tms_id"]." ";
            }
        ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom"><?php include "top-bar.php";?></div>
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-sm-12">
                        <h2><center><b>รายงานการอนุมัติ | Approval List Item</b></center></h2>
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <br>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>รหัสพนักงาน | Emploype ID</th>
                                    <th>ชื่อ-สกุล | Name-Surname</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                                </thead>
        
                                <tbody>
                                    <?php
                                        $sql_approve = $sql_command;
                                        $result_approve = mysqli_query($condbmc, $sql_approve);
                                        while($row_approve = mysqli_fetch_array($result_approve)){

                                        $sql_name = "SELECT * From employee WHERE Emp_ID = ".$row_approve["emp_trv_emp_id"]."";
                                        $result_name = mysqli_query($condbmc, $sql_name);
                                        $row_name = mysqli_fetch_array($result_name);
                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $row_approve["emp_trv_emp_id"]?></td>
                                        <td><?php echo $row_name["Empname_eng"]." ".$row_name["Empsurname_eng"]?></td>
                                        <td class="center"><a href ="head_approve.php?id=<?php echo $row_approve["emp_trv_id"] ?>"><button class="btn btn-outline btn-info " type="button"><i class="fa fa-search"></i></button></a></td>
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
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
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
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>
