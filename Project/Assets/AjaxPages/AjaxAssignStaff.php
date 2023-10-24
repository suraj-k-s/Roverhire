<?php
session_start();
include("../Connection/connection.php");
    $ins="insert into tbl_pickup(userrequest_id,staff_id)values('".$_GET["rid"]."','".$_GET["sid"]."')";
    $upQry="update tbl_userrequest set userrequest_status=3  where userrequest_id=".$_GET['rid'];
    $con->query($upQry);	
    if($con->query($ins))
    {
        echo "Assigned";
    }
	else
	{
		echo "Failed";
	}
?>