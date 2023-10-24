<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>	
<?php include("Head.php") ?>
<?php
	include("../Assets/Connection/connection.php");
	if(isset($_POST["btn_register"]))
	{
		$uname=$_POST["txt_name"];
		$uemail=$_POST["txt_email"];
		$ucontact=$_POST["txt_contact"];
		$ugender=$_POST["radio"];
		$udob=$_POST["txt_dob"];
		$uaddress=$_POST["txt_address"];
		$udistrict=$_POST["ddl_district"];
		$uplace=$_POST["ddl_place"];
		
		$uphoto=$_FILES["txt_photo"]["name"];
		$temp=$_FILES["txt_photo"]["tmp_name"];
		move_uploaded_file($temp,'../Assets/Files/User/'.$uphoto);
		
		$ulicense=$_FILES["txt_license"]["name"];
		$temp=$_FILES["txt_license"]["tmp_name"];
		move_uploaded_file($temp,'../Assets/Files/User/'.$ulicense);
		
		$upassword=$_POST["txt_password"];
		$ucnpassword=$_POST["txt_cnpassword"];
	

		$insQry="insert into tbl_user(user_name,user_email,user_contact,user_gender,user_dob,user_address,user_district,user_place,user_photo,user_license,user_password)values('".$uname."','".$uemail."','".$ucontact."','".$ugender."','".$udob."','".$uaddress."','".$udistrict."','".$uplace."','".$uphoto."','".$ulicense."','".$upassword."')";
	if($con->query($insQry))
		{
		?>
		<script>
		alert("Data inserted");
		//window.location="userRegistration.php";
		</script>
		<?php
	}
	else
	{
		echo $insQry;
	}
		
	}
		?>
			
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<table width="200" border="1">
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" />      <label for="txt_num1"></label></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" />      <label for="txt_num2"></label></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><label for="txt_num3"></label>
    <input type="text" name="txt_contact" id="txt_contact" /></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><input type="radio" name="radio" id="rdo_gender" value="rdo_gender" />
    M
      <label for="rdo_gender"></label>
    <label for="rdo_gender"></label>
    <input type="radio" name="radio" id="rdo_gender2" value="rdo_gender" />
    F
    <label for="rdo_gender2"></label></td>
  </tr>
  <tr>
    <td>DOB</td>
    <td><label for="txt_num4"></label>
    <input type="date" name="txt_dob" id="txt_dob" /></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label for="txt_num5"></label>
    <input type="text" name="txt_address" id="txt_address" /></td>
  </tr>
  <tr>
    <td>District</td>
    <td>
      <select name="ddl_district" id="ddl_district" onchange="getPlace(this.value)">
      <option value=" ">-------select-------</option>
      <?php
	  $seldistrict="select * from tbl_district";
	  $result=$con->query($seldistrict);
	  while($row=$result->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $row["dist_id"]?>"><?php echo $row["dist_name"]?></option>
          <?php
	  }
	  ?>  
    </select>
    </td>
  </tr>
  <tr>
    <td>Place</td>
    <td><label for="ddl_place"></label>
      <select name="ddl_place" id="ddl_place">
      <option value=" ">----select----</option>
      
      </select></td>
  </tr>
  <tr>
    <td>Photo</td>
    <td><label for="txt_photo"></label>
      <input type="file" name="txt_photo" id="txt_photo" /></td>
  </tr>
  <tr>
    <td>License</td>
    <td><label for="txt_license"></label>
      <input type="file" name="txt_license" id="txt_license" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label for="txt_num8"></label>
    <input type="text" name="txt_password" id="txt_password" /></td>
  </tr>
  <tr>
    <td>Confirm password</td>
    <td><label for="txt_num9"></label>
    <input type="text" name="txt_cnpassword" id="txt_cnpassword" /></td>
  </tr>
  <tr>
    <td colspan=2 align="center"><input type="Submit" name="btn_register" id="btn_register" value="Register" /></td>
   
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