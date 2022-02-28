<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>TRAVELLING | DENSO</title>

    <link rel="icon" href="../IMG/ico.ico" type="image/x-icon">
    <link href="../ADS/assets01/css/bootstrap.css" rel="stylesheet">
    <link href="../ADS/assets01/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../ADS/assets01/css/style.css" rel="stylesheet">
	<link href="../ADS/assets01/css/simple-sidebar.css" rel="stylesheet">

  </head>

  <body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
			
	  	
		      <form class="form-login" method="post" action="../ENG/forgotJP.php">
		        <h2 class="form-login-heading"><b>Sign In</b><font color="#BE4F0C "><b> to your</b></font><br>
					<small>
						<font color="#ffffff">Travelling</font><font color="#BE4F0C "><b> Account</b></font>
					</small>
				</h2>

				<p></p>				
				<center><b>Forgot password via E-mail</b></center>
		        <div class="login-wrap">
				<b>Employee ID</b>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>&nbsp;
						</span>
						<input type="text" class="form-control" name="empid" id="empid"  placeholder="Employee ID" required/>
					</div>
				<p></p>
				
				<b>E-mail Address</b>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-lock"></i>&nbsp;
						</span>
						<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required/>
					</div>
				<p></p>
				
		            <p>&nbsp;</p>
		            <button class="btn btn-theme02 btn-block" type="submit"><i class="fa fa-key"></i> Submit</button>
					
				<br>
		            <div class="centered">
		                <a class="bg-chet" href="forgot.php">
							<i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back to main menu
		                </a>
		            </div>
		        </div>
		      </form>
			  
	  		</ul>
		</div>
		
        <div id="page-content-wrapper">
            <div class="container-fluid">
			<a class="" href="../index.php">
                <h1><font color="#393939"><b>TRAVELLING | DENSO</b></font></h1>
                <p><font color="#393939">ระบบรายงานการเดินทางออนไลน์ที่ใช้งานผ่านเว็บไซด์ในระบบเครือข่ายอินทราเน็ต </font></p>
			</a>
                <a href="#menu-toggle" class="" id="menu-toggle"></a>
            </div>
        </div>
		
	</div>


    <script src="../ADS/assets01/js/jquery.js"></script>
    <script src="../ADS/assets01/js/bootstrap.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	<script>
		document.getElementById("menu-toggle").click();
	</script>
	
	<script src="../ADS/assets01/js/jquery.inputmask.bundle.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(":input").inputmask();
	});
	</script>
	
	<script type="text/javascript" src="../ADS/assets01/js/jquery.alphanum.js"></script>
	<!--script type="text/javascript">
		$('#empid').numeric({
			maxPreDecimalPlaces : 5
		});
	</script-->
	
	<script language="javascript">
	function fncSubmit()
	{

		if(document.form1.password.value != document.form1.confirm.value)
		{
			alert('รหัสผ่านไม่ตรงกัน');
			document.form1.confirm.focus();		
			return false;
		}	

		document.form1.submit();
	}
	</script>

  </body>
</html>
