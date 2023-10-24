<?php
session_start();
include("../Connection/Connection.php");
?>
      <?php
	$selqry="select * from tbl_vehicle v inner join tbl_vehicletype vt on vt.vehicletype_id=v.vehicletype_id where v.shop_id='".$_SESSION["shop"]."' and vt.vehicletype_id='".$_GET["did"]."'"; 
	//echo $selqry;
	$rows=$con->query($selqry);
	while($data=$rows->fetch_assoc())
	{
	?>
   <div class="s-card">
   <p> <?php echo $data["vehicle_name"]?></p>
   <p><?php echo $data["vehicle_minkm"]?></p>
   <p><?php echo $data["vehicle_minrate"]?></p>
   <p><?php echo $data["vehicle_kmrate"]?></p>
   <p><?php echo $data["vehicletype_name"]?></p>

  <p><a href="Viewvehicle.php?vid=<?php echo $data ["vehicle_id"]?>">Send Request</a></p>
	</div>
	<?php
	}
  ?>