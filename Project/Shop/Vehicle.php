<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php 
 session_start();
include("Head.php");

 ?>
<?php

	include("../Assets/Connection/connection.php");

	if(isset($_POST["btn_save"]))
	{
		$pic=$_FILES["txt_image"]["name"];
		$path=$_FILES["txt_image"]["tmp_name"];
		move_uploaded_file($path,"../Assets/Files/Vehicle/".$pic);
		$ins="insert into tbl_vehicle(vehicle_name,shop_id,vehicle_image,vehicle_minrate,vehicle_minkm,vehicle_kmrate,vehicletype_id)values('".$_POST["txt_name"]."','".$_SESSION["sid"]."','".$pic."','".$_POST["txt_minrate"]."','".$_POST["txt_minkm"]."','".$_POST["txt_kmrate"]."','".$_POST["sel_vehicletype"]."')";
		$con->query($ins);
		header("location:Vehicle.php");
	}
	if(isset($_GET['did']))
	{
		$delQry="delete from tbl_vehicle where vehicle_id=".$_GET['did'];
		if($con->query($delQry))
		{
		?>
		<script>
		alert("Data deleted");	
		window.location="Vehicle.php";
		</script>
		<?php
	}
	else
	{
	?>
    <script>
	alert("failed");
	window.location="Vehicle.php";
	</script>
    <?php
	}
	}
	?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="312" border="1">
    <tr>
      <td width="110">Vehicle type</td>
      <td width="186"><label for="txt_vehicletype"></label>
        <label for="sel_vehicletype">
          <select name="sel_vehicletype" id="sel_vehicletype">
     
          <option value=" ">-------select-------</option>
                <?php
	  $selvehicletype="select * from tbl_vehicletype";
	  $result=$con->query($selvehicletype);
	  while($row=$result->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $row["vehicletype_id"]?>"><?php echo $row["vehicletype_name"]?></option>
          <?php
	  }
	  ?>  

          </select>
        </label></td>
    </tr>
    <tr>
      <td height="27">Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Minrate</td>
      <td><label for="txt_minrate"></label>
      <input type="text" name="txt_minrate" id="txt_minrate" /></td>
    </tr>
    <tr>
      <td>Minkm</td>
      <td><label for="txt_minkm"></label>
      <input type="text" name="txt_minkm" id="txt_minkm" /></td>
    </tr>
    <tr>
      <td>Kmrate</td>
      <td><label for="txt_kmrate"></label>
      <input type="text" name="txt_kmrate" id="txt_kmrate" /></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label for="txt_image"></label>
      <input type="file" name="txt_image" id="txt_image" /></td>
    </tr>
    <tr>
    <td colspan="2" align="center">
   
      <input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <table width="359" border="1">
    <tr>
      <td width="56">SLNO:</td>
      <td width="130">VEHICLETYPE</td>
      <td width="57">NAME</td>
      <td width="51">MINRATE</td>
      <td width="51">MINKM</td>
      <td width="51">KMRATE</td>
      <td width="31">ACTION</td>
    </tr>
     <?php
	$sel="select * from tbl_vehicle v inner join tbl_vehicletype vt on vt.vehicletype_id=v.vehicletype_id where v.shop_id='".$_SESSION["sid"]."'";
	$data=$con->query($sel);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row["vehicletype_name"]?></td>
      <td><?php echo $row["vehicle_name"]?></td>
      <td><?php echo $row["vehicle_minrate"]?></td>
      <td><?php echo $row["vehicle_minkm"]?></td>
      <td><?php echo $row["vehicle_kmrate"]?></td>
      <td><a href="VehicleGallery.php?vid=<?php echo $row["vehicle_id"]?>">Add Photos</a><br><a href="Vehicle.php?did=<?php echo $row["vehicle_id"]?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
    
  </table>
  <p>&nbsp;</p>
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
