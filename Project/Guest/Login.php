
<?php
session_start();
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btn_login"]))
	{
		$seluser="select * from tbl_user where user_email='".$_POST["txt_email"]."' and user_password='".$_POST["txt_password"]."'";
		$datauser=$con->query($seluser);
		
		$selshop="select * from tbl_shop where shop_email='".$_POST["txt_email"]."' and shop_password='".$_POST["txt_password"]."'";
		$datashop=$con->query($selshop);
		
		$seladmin="select * from tbl_admin where admin_email='".$_POST["txt_email"]."' and admin_password='".$_POST["txt_password"]."'";
		$dataadmin=$con->query($seladmin);

		$selstaff="select * from tbl_staff where staff_email='".$_POST["txt_email"]."' and staff_password='".$_POST["txt_password"]."'";
		$datastaff=$con->query($selstaff);

		if($rowadmin=$dataadmin->fetch_assoc())
		{
			$_SESSION["aid"]=$rowadmin["admin_id"];
			$_SESSION["aname"]=$rowadmin["admin_name"];
			header("location:../Admin/HomePage.php");
		}
		else if($rowshop=$datashop->fetch_assoc())
		{
			$_SESSION["sid"]=$rowshop["shop_id"];
			header("location:../Shop/homepage.php");
		}
		else if($rowuser=$datauser->fetch_assoc())
		{
			$_SESSION["uid"]=$rowuser["user_id"];
			header("location:../User/Homepage.php");
		}
		else if($rowstaff=$datastaff->fetch_assoc())
		{
			$_SESSION["sfid"]=$rowstaff["staff_id"];
			header("location:../Staff/Homepage.php");
		}
		else
		{
			?>

			<script>
				alert("Invalid Credentials");
			</script>
			<?php
		}
		
		
		
	}
	
	?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Template/Login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #02</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Sign In</h3>
		      	<form method="post" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name='txt_email' required>
		      		</div>
	            <div class="form-group">
	              <input type="password" class="form-control" placeholder="Password" name='txt_password' required>
	            </div>
	            <div class="form-group">
	            	<input type="submit" class="form-control btn btn-primary rounded submit px-3" name='btn_login' value="Sign In" />
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Temptae/Login/js/jquery.min.js"></script>
  <script src="../Assets/Temptae/Login/js/popper.js"></script>
  <script src="../Assets/Temptae/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Temptae/Login/js/main.js"></script>

	</body>
</html>

