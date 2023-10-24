<?php include("Head.php") ?>
<?php
session_start();
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btn_change"]))
	{
		$currentpassword=$_POST["txt_currentpassword"];
		$newpassword=$_POST["txt_newpassword"];
		$confirmpassword=$_POST["txt_confirmpassword"];
		$sel="select * from tbl_shop where shop_id='".$_SESSION["sid"]."' and shop_password='".$currentpassword."'";
		$data=$con->query($sel);
		if($row=$data->fetch_Assoc())
		{
			if($newpassword==$confirmpassword)
			{
				 $upQry = "update tbl_shop set shop_password='".$newpassword."' where shop_id=".$_SESSION['sid'];
		$con->query($upQry);
		header("location:homepage.php");
			}
		}
		
		
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="371" border="1">
    <tr>
      <td width="158">Current password</td>
      <td width="197"><label for="txt_current"></label>
      <input type="text" name="txt_currentpassword" id="txt_current" /></td>
    </tr>
    <tr>
      <td>New password</td>
      <td><label for="txt_new"></label>
      <input type="text" name="txt_newpassword" id="txt_new" /></td>
    </tr>
    <tr>
      <td>Confirm password</td>
      <td><label for="txt_confirm"></label>
      <input type="text" name="txt_confirmpassword" id="txt_confirm" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_change" id="btn_change" value="Change" />        
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<?php include("Foot.php") ?>
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
</body>
</html>