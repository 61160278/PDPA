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
                                    <center>ข้อมูลของพนักงานที่สามารถเปิดเผยได้</center>
                                </u></b><br>
                            <center>Public Data<center>
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

                    <br>
                    <div class="text-center">
                        <a href="public_data.php">
                            <button class="btn btn-secondary">Back</button>
                        </a>
                    </div>
            </div>
        </div>
        <br>
        <!-- <?php include "footer.php";?> -->
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

</body>

</html>