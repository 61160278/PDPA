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
        <?php include "menu.php";

        $emp_temp = [];
        $emp_check = [];
        
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
                
            }
            // if 
            else if($row_home["data_public_type"] == 2){
                $sql_publicTable = "SELECT * From data_department_pdpa AS depar
                                    INNER JOIN master_mapping AS map
                                    ON map.Department_id = depar.data_department
                                    WHERE depar.data_department_data_id = ".$_GET["id"]."";
                $result_publicTable = mysqli_query($condbmc, $sql_publicTable);
                $row_publicTable = mysqli_fetch_array($result_publicTable);

                $sql_department = "SELECT * FROM master_mapping
                                    WHERE Department_id = '".$row_publicTable["Department_id"]."'
                                    ORDER BY Department_id";
                $result_department = mysqli_query($condbmc, $sql_department);
                // get department
                $index = 0;
                while($row_department = mysqli_fetch_array($result_department)){
                    

                    $dp = $row_department["Department_id"];
                    $sc = $row_department["Section_id"];
                    $sb = $row_department["SubSection_id"];
                    $gr = $row_department["Group_id"];
                    $ln = $row_department["Line_id"];

                    $sql_emp = "SELECT * 
                                FROM employee AS emp
                                WHERE emp.Sectioncode_ID = '".$dp."' OR emp.Sectioncode_ID = '".$sc."' OR emp.Sectioncode_ID = '".$sb."' OR emp.Sectioncode_ID = '".$gr."' OR emp.Sectioncode_ID = '".$ln."'
                                ORDER BY emp.Emp_ID";

                    $result_emp = mysqli_query($condbmc, $sql_emp);
                    $count = $index;

                        while($row_emp = mysqli_fetch_assoc($result_emp)){
                            if($count == 0){
                                array_push($emp_temp,$row_emp); //??????????????????????????????
                                array_push($emp_check,$row_emp["Emp_ID"]); //?????????????????????????????????????????????
                            }
                            // if
                            else if(!in_array($row_emp["Emp_ID"],$emp_check)){ //in_array ???????????????????????????????????? true
                                array_push($emp_temp,$row_emp);
                                array_push($emp_check,$row_emp["Emp_ID"]);
                            }
                            // else if 
                        }
                        // while emp ???????????????????????????????????????????????????????????????????????????????????????
                        $index++;
                }
                // while department 
            }
            // else if 
            else if($row_home["data_public_type"] == 3){
                $sql_publicTable = "SELECT * From master_mapping AS map
                                    WHERE Company_id = 'SDM' OR Company_id = 'SKD'
                                    GROUP BY Company_id";
                $result_publicTable = mysqli_query($condbmc, $sql_publicTable);
                $company = '';
                $row_publicTable = [];
                $count = 0;
                while($rowpublicTable = mysqli_fetch_array($result_publicTable)){
                    $company .= $rowpublicTable["Company"] . " (" .$rowpublicTable["Company_id"] .") ". "<br>";
                    array_push($row_publicTable,$rowpublicTable["Company"]);
                }
                // while

                $sql_department = "SELECT * FROM master_mapping
                                   ORDER BY Department_id";
                $result_department = mysqli_query($condbmc, $sql_department);
                // get department
                $index = 0;
                while($row_department = mysqli_fetch_array($result_department)){

                    $dp = $row_department["Department_id"];
                    $sc = $row_department["Section_id"];
                    $sb = $row_department["SubSection_id"];
                    $gr = $row_department["Group_id"];
                    $ln = $row_department["Line_id"];

                    $sql_emp = "SELECT * 
                                FROM employee AS emp
                                WHERE emp.Sectioncode_ID = '".$dp."' OR emp.Sectioncode_ID = '".$sc."' OR emp.Sectioncode_ID = '".$sb."' OR emp.Sectioncode_ID = '".$gr."' OR emp.Sectioncode_ID = '".$ln."'
                                ORDER BY emp.Emp_ID";

                    $result_emp = mysqli_query($condbmc, $sql_emp);
                    $count = $index;

                        while($row_emp = mysqli_fetch_assoc($result_emp)){
                            if($count == 0){
                                array_push($emp_temp,$row_emp); //??????????????????????????????
                                array_push($emp_check,$row_emp["Emp_ID"]); //?????????????????????????????????????????????
                            }
                            // if
                            else if(!in_array($row_emp["Emp_ID"],$emp_check)){ //in_array ???????????????????????????????????? true
                                array_push($emp_temp,$row_emp);
                                array_push($emp_check,$row_emp["Emp_ID"]);
                            }
                            // else if 
                        }
                        // while emp ???????????????????????????????????????????????????????????????????????????????????????
                        $index++;
                }
                // while department 
            }
            // else if 
        ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php include "top-bar.php";?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">

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
                                <center>?????????????????????????????????????????????????????????????????????????????????????????????????????????</center>
                            </u></b><br>
                        <center>Public Data<center>
                    </h2>


                    <div class="col-lg-12">
                        <h2>&nbsp;&nbsp;&nbsp;</h2>
                    </div>
                    

                    <div class="ibox-content"></div>
                    <?php
                    if(sizeof($row_publicTable) != 0){ 
                       echo '<table class="table table-bordered">';
                       echo "<thead>";
                       echo "<tr>";
                       echo "<th><center>"."??????????????????"."</th>";
                       if($row_home["data_public_type"] != 3){
                        echo "<th><center>"."????????????"."</th>";
                       }
                       // if
                       echo "</tr>";
                       echo "</thead>";
                       echo "<tr>";
                       if($row_home["data_public_type"] != 3){
                         echo "<td>".$row_publicTable["Company"]." (".$row_publicTable["Company_id"].")"."</td>";
                         echo "<td>".$row_publicTable["Department"]." (".$row_publicTable["Department_id"].")"."</td>";
                         
                       }
                       // if 
                       if($row_home["data_public_type"] == 3){
                        echo "<td>".$company."</td>";
                       }
                       // else if
                       echo "</tr>";
                       echo "</table>";
                   ?>
                    <!-- company -->

                    <!-- <?php //if(sizeof($result_homeTable) != 0){ ?> -->


                    <!-- Department -->

                    <br>
                    <h2 align="center"><u>??????????????????????????????????????????</u></h2>
                    <br>
                    <div class="table-responsive">
                    <div class="table-responsive">
                    <table id="myTbl" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th style="width:40px">
                                    <center>???????????????
                                </th>
                                <th>
                                    <center>??????????????????
                                </th>
                                <th>
                                    <center>????????????
                                </th>
                                <th>
                                    <center>?????????????????????????????????
                                </th>
                                <th>
                                    <center>????????????-????????????????????? (?????????????????????)
                                </th>
                                <th>
                                    <center>????????????-????????????????????? (??????????????????????????????)
                                </th>
                                <th>
                                    <center>?????????????????????
                                </th>
                                <th>
                                    <center>????????????????????????????????????
                                </th>
                                <th>
                                    <center>Department
                                </th>
                                <th>
                                    <center>Section
                                </th>
                                <th>
                                    <center>Sub Section
                                </th>
                                <th>
                                    <center>Group
                                </th>
                                <th>
                                    <center>Line
                                </th>
                                <th>
                                    <center>???????????????????????????????????????????????????
                                </th>
                                <th>
                                    <center>????????????????????????????????????
                                </th>
                                <th>
                                    <center>?????????????????????????????????????????????
                                </th>
                                <th>
                                    <center>Shift
                                </th>
                                <th>
                                    <center>???????????????????????????
                                </th>
                                <th>
                                    <center>?????????????????????????????????????????????
                                </th>
                                <th>
                                    <center>???????????????????????????????????????
                                </th>
                                <th>
                                    <center>?????????????????????????????????
                                </th>
                                <th>
                                    <center>?????????
                                </th>
                                <th>
                                    <center>???????????????????????????????????????
                                </th>
                                <th>
                                    <center>????????????????????? (??????)
                                </th>
                                <th>
                                    <center>????????????????????? (???????????????)
                                </th>
                                <th>
                                    <center>????????????????????? (?????????)
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php 
                            foreach($emp_temp as $index => $row){ 
                                $sql_map = "SELECT * FROM master_mapping
                                WHERE Department_id = '".$row["Sectioncode_ID"]."' OR Section_id = '".$row["Sectioncode_ID"]."' OR SubSection_id = '".$row["Sectioncode_ID"]."' OR Group_id = '".$row["Sectioncode_ID"]."' OR Line_id = '".$row["Sectioncode_ID"]."' ";
                                    $result_map = mysqli_query($condbmc, $sql_map);
                                    $row_map = mysqli_fetch_array($result_map);?>
                            <tr>
                                <td align="center"><?php echo ($index+1) ?></td>
                                <td><?php echo $row_publicTable["Company_id"]; ?></td>
                                <td><?php echo $row_publicTable["Department"]; ?></td>
                                <td><?php echo $row["Emp_ID"]; ?></td>
                                <td><?php echo $row["Emp_nametitle"] . $row["Empname_th"] . " " . $row["Empsurname_th"]; ?>
                                </td>
                                <td><?php echo $row["Empname_engTitle"] ." ". $row["Empname_eng"] . " " . $row["Empsurname_eng"]; ?>
                                </td>
                                <td><?php echo $row["Position_ID"]?></td>
                                <td><?php echo $row["Section_type"]?></td>
                                <td><?php echo $row_map["Department_id"]?></td>
                                <td><?php echo $row_map["Section_id"]?></td>
                                <td><?php 
                                if($row_map["SubSection"] == null){
                                    echo " - ";
                                }
                                // if
                                else { 
                                    echo $row_map["SubSection"];
                                }?></td>
                                <td><?php 
                                if($row_map["Group"] == null){
                                    echo " - ";
                                }
                                // if
                                else { 
                                    echo $row_map["Group"];
                                }?></td>
                                <td><?php 
                                if($row_map["Line"] == null){
                                    echo " - ";
                                }
                                // if
                                else { 
                                    echo $row_map["Line"];
                                }?></td>
                                <td><?php echo $row_map["Company"]?></td>
                                <td><?php echo $row["Sectioncode_ID"]?></td>
                                <td><?php echo $row["CostCenter_ID"]?></td>
                                <td><?php echo $row["Shift_ID"]?></td>
                                <td><?php echo $row["Section_type"]?></td>
                                <td><?php echo $row_map["Short_name"]?></td>
                                <td><?php echo $row["Emp_startingdate"]?></td>
                                <td><?php echo $row["Emp_probationduedate"]?></td>
                                <td><?php 
                                if($row["Emp_nametitle"] == ??????????????????){
                                    echo "????????????";
                                }
                                // if
                                else if($row["Emp_nametitle"] == ?????????){ 
                                    echo "?????????";
                                }
                                else if($row["Emp_nametitle"] == ?????????){ 
                                    echo "????????????";
                                }?></td>
                                <td><?php 
                                if($row["Statuswork_ID"] == 1){
                                    echo "??????????????????????????????";
                                }
                                // if
                                else if($row["Statuswork_ID"] == 2){ 
                                    echo "???????????????";
                                }?></td>
                                <td><?php echo $row["End_date"]?></td>
                                <td><?php echo $row["End_date"]?></td>
                                <td><?php echo $row["End_date"]?></td>
                            </tr>
                            <?php } ?>
                            <!-- foreach -->
                        </tbody>
                    </table>
                    </div>
                    </div>
                    <? } ?>
                    <!-- company -->
                    <br>
                    <div class="text-center">
                        <a href="public_data.php">
                            <button class="btn btn-secondary">Back</button>
                        </a>
                    </div>
                </div>
            </div>
    <br>
    <?php include "footer.php";?>
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