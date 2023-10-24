<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
session_start(); 
include("Head.php") ?>
<?php

include("../Assets/Connection/connection.php");
if(isset($_GET["aid"]))
{
  $accept = "update tbl_userrequest set userrequest_status='1' where userrequest_id='".$_GET["aid"]."'";
  if($con->query($accept))
  {
    header("Location:viewUserBooking.php");
  }
}
if(isset($_GET["rid"]))
{
  $accept = "update tbl_userrequest set userrequest_status='2' where userrequest_id='".$_GET["rid"]."'";
  if($con->query($accept))
  {
    header("Location:viewUserBooking.php");
  }
}


?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>SL.NO</td>
      <td>USERNAME</td>
      <td>CONTACT</td>
      <td>VEHICLE</td>
      <td>RATE</td>
      <td>ACTION</td>
    </tr>
    
    <?php
	$sel="select * from tbl_userrequest ur inner join tbl_user u on u.user_id=ur.user_id inner join tbl_vehicle v on v.vehicle_id=ur.vehicle_id where v.shop_id='".$_SESSION["sid"]."' and ur.userrequest_status=2 ";
	$data=$con->query($sel);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row["user_name"]?></td>
      <td><?php echo $row["user_contact"]?></td>
      <td><?php echo $row["vehicle_name"]?></td>
      <td><?php echo $row["vehicle_rate"]?></td>
      <td> <a href="viewUserBooking.php?aid=<?php echo $row["userrequest_id"] ?>">Accept</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
<?php 
include("Foot.php") ;
ob_flush();
?>
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
