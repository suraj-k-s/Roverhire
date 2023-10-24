<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
</head>

<body>
<?php
include("Head.php")
?>
<div>
    <lottie-player src="https://lottie.host/7992fd88-61ff-498d-a97a-29243dad6e62/4DZwlEKzfk.json" background="transparent" speed="1" loop autoplay></lottie-player>
</div>
<!-- <a href="Myprofile.php">MyProfile</a>
<a href="Editprofile.php">Editprofile</a>
<a href="Changepassword.php">Changepassword</a>
<a href="StaffRegistration.php">Add Staff</a>
<a href="Vehicle.php">Add Vehicles</a>
<a href="viewUserBooking.php">View UserBooking</a>
<a href="AcceptedList.php">Accepted List</a>
<a href="RejectedList.php">RejectedList</a>
<a href="Payment.php">Payment</a> -->
<?php include("Foot.php") ?>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#ddl_place").html(html);
		}
		});
}
</script>
