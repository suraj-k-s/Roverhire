<?php
session_start();
include("../Connection/connection.php");
    $ins="insert into tbl_userrequest(user_id,vehicle_id,userrequest_date,userrequest_bookdate,userrequest_booktime)values('".$_SESSION["uid"]."','".$_GET["vid"]."',curdate(),'".$_GET["date"]."','".$_GET["time"]."')";
    if($con->query($ins))
    {
        echo "Booked";
    }
	else
	{
		echo "Failed";
	}
?>