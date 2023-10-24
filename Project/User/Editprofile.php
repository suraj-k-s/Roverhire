<?php include("Head.php") ?>
<?php
session_start();
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btn_change"]))
	{
		$uname=$_POST["txt_name"];
		$ucontact=$_POST["txt_contact"];
		$uaddress=$_POST["txt_address"];
		
		 $upQry = "update tbl_user set user_name = '".$uname."',user_contact='".$ucontact."',user_address='".$uaddress."' where user_id=".$_SESSION['uid'];
		$con->query($upQry);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

	$sel="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
	$data=$con->query($sel);
	$row=$data->fetch_assoc();
	?>
<form id="form1" name="form1" method="post" action="">
  <table width="235" border="1">
    <tr>
      <td width="87">Name</td>
      <td width="132"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $row["user_name"];
	  ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row["user_contact"];
	  ?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" value="<?php echo $row["user_address"];
	  ?>"/></td>
    </tr>
    <tr>
      <td colspan="2">
        
        <div align="center">
          <input type="submit" name="btn_change" id="btn_change" value="Change" />
        </div>
       
      </td>
    </tr>
  </table>
  <label for="txt_submit"></label>
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