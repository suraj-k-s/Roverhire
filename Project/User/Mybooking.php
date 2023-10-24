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



?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>SL.NO</td>
      <td>Shop Name</td>
      <td>CONTACT</td>
      <td>VEHICLE</td>
      <td>MINIMUM RATE</td>
      <td>MINIMUM KM</td>
      <td>RATE/KM</td>
      <td>ACTION</td>
    </tr>
    
    <?php
	$sel="select * from tbl_userrequest ur inner join tbl_vehicle v on v.vehicle_id=ur.vehicle_id inner join tbl_shop s on s.shop_id=v.shop_id where ur.user_id='".$_SESSION["uid"]."'";
  //echo $sel;
	$data=$con->query($sel);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row["shop_name"]?></td>
      <td><?php echo $row["shop_contact"]?></td>
      <td><?php echo $row["vehicle_name"]?></td>
      <td><?php echo $row["vehicle_minkm"]?></td>
      <td><?php echo $row["vehicle_minrate"]?></td>
      <td><?php echo $row["vehicle_kmrate"]?></td>
      <td><?php
      if($row["userrequest_status"]==1 && $row["payment_status"]==0)
      {
        echo "Accepted";
        ?>
       <a href="Payment.php?bid=<?php echo $row["userrequest_id"] ?>">pay Now</a>
       <?php
      }
      else if($row["userrequest_status"]==1 && $row["payment_status"]==1)
      {
        echo "Payment Completed";
      }
      else if ($row["userrequest_status"]==2)
      {
        echo "Rejected";
      }
      else if ($row["userrequest_status"]>=3)
      {
        ?>
        <?php
        $selStaff="select * from tbl_pickup p inner join tbl_staff s on s.staff_id=p.staff_id where p.userrequest_id='".$row["userrequest_id"]."'";

        $dataStaff=$con->query($selStaff);
        $rowStaff=$dataStaff->fetch_assoc();
        echo "Delivering by ".$rowStaff['staff_name']."<br>";
        ?>
        <a href="BookingStatus.php?pid=<?php echo $rowStaff['pickup_id']?>">View Status</a>
        <?php
      }
      else if($rowStaff['pickup_status']==8){
        $km=($rowStaff['ending_km']-$rowStaff['starting_km']);
        if($km<=$row["vehicle_minkm"]){
          $amt=0;
        }
        else{
          $amt=$row["vehicle_kmrate"]*($row["vehicle_minkm"]-$km);
        }
        echo "Total Amount to be paid: <br>".$amt;
        ?>
          <a href="Payment?urid=<?php echo $row['userrequest_id'] ?>">Pay Now</a>
        <?php
      }
      else if($rowStaff['pickup_status']==10){
        echo "Completed";
      }
      else{
        echo "Pending";
      }
      ?></td>
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
