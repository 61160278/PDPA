<?php
session_start(); 
include "../ENG/dbconnect.php";	
date_default_timezone_set('asia/bangkok');	
include "../Function/function_select.php";
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="http://10.73.148.5/DBMC/IMG/emp120/<?echo $_SESSION["
                            empid_tms"]?>.jpg" />
                    </span>
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                <?echo $_SESSION["empname_tms"]."&nbsp;&nbsp;".substr($_SESSION["emplast_tms"], 0 ,1)."." ?>
                            </strong>
                        </span> <span class="text-muted text-xs block">
                            <?echo $_SESSION["tms_name"]?>
                        </span>
                        <!--." - ".$_SESSION["company_tms"] -->
                    </span> <span class="text-muted text-xs block">
                        <?echo $_SESSION["tms_id"]?>
                    </span>
                    <!--." - ".$_SESSION["company_tms"] -->
                    </span>
                </div>
                <div class="logo-element">
                    TMS
                </div>
            </li>
            <li>
                <a href="home_user.php"><i class="fa fa-home"></i>
                    <span class="nav-label">หน้าแรก
                        <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</h6>
                    </span>
                </a>
            </li>

            <li>
                <a href="borrow.php"><i class="fa fa-btc"></i>
                    <span class="nav-label">ยืมแฟ้มประวัติพนักงาน
                        <!-- <span class="fa arrow"></span> -->
                        <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Borrow Employee Profiles</h6>
                    </span>
                </a>
                <!-- <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="domestic.php">ในประเทศ
                            <h6>Domestic</h6>
                        </a>
                    </li>
                    <li>
                        <a href="home_user.php">ต่างประเทศ
                            <h6>International</h6>
                        </a>
                    </li>
                    <li>
                        <a href="add_payroll.php">สำหรับหน่วยงาน Payroll
                            <h6>Payroll</h6>
                        </a>
                    </li>
                </ul> -->
            </li>

            <li>
                <a href="report.php"><i class="fa fa-edit"></i> 
					<span class="nav-label">รายงานข้อมูลส่วนบุคคลของพนักงาน
					    <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Personal Information Report</h6>
					</span>
				</a>
            </li>

            <li>
                <a href="public_data.php"><i class="fa fa-edit"></i> 
					<span class="nav-label">ข้อมูลของพนักงานที่สามารถเปิดเผยได้ 
					    <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Public Data</h6>
					</span>
				</a>
            </li>

            <li>
                <a href="checker.php"><i class="fa fa-edit"></i> 
					<span class="nav-label">ตรวจสอบ
					    <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Checker</h6>
					</span>
				</a>
            </li>

            <li>
                <a href="approve.php"><i class="fa fa-edit"></i> 
					<span class="nav-label">อนุมัติคำร้อง
					    <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approve</h6>
					</span>
				</a>
            </li>
            <?php
				if($_SESSION['role_tms'] == 9){
					echo '<li>';
                        echo '<a href="home.php"><i class="fa fa-users"></i>';
							echo '<span class="nav-label">จัดการกลุ่มการอบรม';
								echo '<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Group Training</h6>';
							echo '</span>';
						echo '</a>';
                    echo '</li>';
				}
			?>
        </ul>
    </div>
</nav>