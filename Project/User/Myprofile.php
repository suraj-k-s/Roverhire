<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include("Head.php") ?>
<?php
session_start();
	include("../Assets/Connection/Connection.php");
	$sel="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
	$data=$con->query($sel);
	$row=$data->fetch_assoc();
	
	?>
<form id="form1" name="form1" method="post" action="">
  <table width="276" border="1">
    <tr>
      <td width="166">Name</td>
      <td width="94"><?php echo $row["user_name"];
	  ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label><?php echo $row["user_contact"];
	  ?> </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label><?php echo $row["user_email"];
	  ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label><?php echo $row["user_address"];
	  ?>
      </td>
    </tr>
  </table>
  <label for="txt_name"></label>
</form>
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