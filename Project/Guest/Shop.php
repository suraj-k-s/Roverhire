<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Registration</title>
</head>

<body>
<?php include("Head.php") ?>
<?php
	include("../Assets/Connection/connection.php");
	if(isset($_POST["btn_save"]))
	{
		$sname=$_POST["txt_name"];
		$scontact=$_POST["txt_contact"];
		$semail=$_POST["txt_email"];
		$saddress=$_POST["txt_address"];
		
		$place=$_POST["ddl_place"];
		
		
		$slogo=$_FILES["txt_logo"]["name"];
		$temp=$_FILES["txt_logo"]["tmp_name"];
		move_uploaded_file($temp,'../Assets/Files/Shop/logo/'.$slogo);

		
		$sproof=$_FILES["txt_proof"]["name"];
		$temp=$_FILES["txt_proof"]["tmp_name"];
		move_uploaded_file($temp,'../Assets/Files/Shop/Proof/'.$sproof);

		
		
		$spassword=$_POST["txt_password"];
		

		$insQry="insert into tbl_shop(shop_name,shop_contact,shop_email,shop_address,shop_logo,shop_proof,shop_password,place_id)values('".$sname."','".$scontact."','".$semail."','".$saddress."','".$slogo."','".$sproof."','".$spassword."','".$place."')";
	if($con->query($insQry))
		{
		?>
		<script>
		alert("Data inserted");
		window.location="shop.php";
		</script>
		<?php
	}
	else
	{
		echo $insQry;
	}
		
	}
	
	?>
	<div id="tab" align="center">
    <h2>Shop Registration</h2>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<table  border="1">
      <tr>
        <td >Name</td>
        <td><label for="txt_name"></label>
          <input type="text" name="txt_name" id="txt_name" /></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><label for="txt_contact"></label>
          <input type="text" name="txt_contact" id="txt_contact" /></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><label for="txt_email"></label>
          <input type="text" name="txt_email" id="txt_email" /></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><p><em>
          <input type="text" name="txt_address" id="txt_address" />
        </em></p></td>
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
         <label for="txt_district"></label>
         <label for="sel_district"></label>
         <select name="sel_district" id="sel_district">
         </select></td>
      </tr>
      <tr>
        <td>Place</td>
        <td>
        <label for="ddl_place"></label>
      <select name="ddl_place" id="ddl_place">
      <option value=" ">----select----</option>
         
          </select></td>
      </tr>
      <tr>
        <td>Logo</td>
        <td><label for="txt_logo"></label>
          <input type="file" name="txt_logo" id="txt_logo" /></td>
      </tr>
      <tr>
        <td>Proof</td>
        <td><label for="txt_proof"></label>
          <input type="file" name="txt_proof" id="txt_proof" /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><label for="txt_password"></label>
          <input type="text" name="txt_password" id="txt_password" /></td>
      </tr>
      <tr>
       
  <td colspan="2"><div align="center">
    <input type="submit" name="btn_save" id="btn_save" value="Save" />
    <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
  </div></td>
  </tr>
    </table>
</form>
  </div>
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