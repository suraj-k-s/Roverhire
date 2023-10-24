<?php include("Head.php") ?>
<?php
session_start();
	include("../Assets/Connection/connection.php");
	if(isset($_GET["sid"]))
	{
		$_SESSION["shop"]=$_GET["sid"];
	}
	if(isset($_GET["vid"]))
	{
		$ins="insert into tbl_userrequest(user_id,vehicle_id)values('".$_SESSION["uid"]."','".$_GET["vid"]."')";
		$con->query($ins);
		header("location:Homepage.php");
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  td{
    padding-left: 1rem;
  }
  #result{
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin: 2rem 5rem;
  }
  .s-card{
    padding: 1rem;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    gap: .5rem;
    box-shadow: 0px 0px 82px 20px rgba(0,0,0,0.1);
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="315"align='center'>
    <tr>
      <td>Vehicletype</td>
      <td valign for="sel_vehicletype">
        <select name="sel_vehicletype" id="sel_vehicletype" onchange="getVehicle(this.value)">
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
      </select></td>
    </tr>
  </table>
  <table align='center'>
    <tr>
      <td>
      <label for='txtbooking_date'>Pickup Date
    <input type="date" name="txtbooking_date" id="txtbooking_date"></label></td>
    <td><label for="txtbooking_time">Pickup Time
      <input type="time" name="txtbooking_time" id="txtbooking_time"></label></td>
    </tr>
  </table> 
    
  <p>&nbsp;</p>
   <div id="result">
   <?php
	$selqry="select * from tbl_vehicle v inner join tbl_vehicletype vt on vt.vehicletype_id=v.vehicletype_id where v.shop_id='".$_GET["sid"]."'";
  // echo $selqry; 
	$rows=$con->query($selqry);
	while($data=$rows->fetch_assoc())
	{
	?>
   <div class="s-card">
    <img src="../Assets/Files/Vehicle/<?php echo $data["vehicle_image"]?>" height='200px' />
   <p><b>Name</b> <?php echo $data["vehicle_name"]?></p>
   <p><b>Minimum Km</b> <?php echo $data["vehicle_minkm"]?></p>
   <p><b>Minmum Rate</b> <?php echo $data["vehicle_minrate"]?></p>
   <p><b>Km Rate</b> <?php echo $data["vehicle_kmrate"]?></p>
   <p><b>Type</b> <?php echo $data["vehicletype_name"]?></p>
   

  <p>
    <button type="button" onclick="bookVehicle(<?php echo $data ["vehicle_id"]?>)">Book</button>
    <!-- <a href="Viewvehicle.php?vid=<?php echo $data ["vehicle_id"]?>">Send Request</a> -->
  </p>
	</div>
	<?php
	}
  ?>
     
  <p>&nbsp;</p>
</form>
</body>
</html>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getVehicle(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxVehicle.php?did="+did,
		success: function(html){
			$("#result").html(html);
		}
		});
}
function bookVehicle(vid){
  var date = document.getElementById('txtbooking_date').value;
  var time = document.getElementById('txtbooking_time').value;
  $.ajax({
		url:"../Assets/AjaxPages/AjaxVehicleReq.php?vid="+vid+"&&date="+date+"&&time="+time,
		success: function(html){
      alert(html)
	// 		// $("#result").html(html);
		}
		});
}
</script>