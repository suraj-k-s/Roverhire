<?php
include('../Connection/Connection.php');
if($_GET['action']=="start"){
    $updQry="update tbl_pickup set pickup_status=2, starting_km='".$_GET['km']."', pickup_time=CURRENT_TIMESTAMP() where pickup_id=".$_GET['pid'];   
    if($con->query($updQry)){
        echo "Updated";
    }
    else{
        echo "Failed";
    }
}
else{
    $updQry="update tbl_pickup set pickup_status=7, ending_km='".$_GET['km']."', return_time=CURRENT_TIMESTAMP() where pickup_id=".$_GET['pid'];   
    if($con->query($updQry)){
        echo "Updated"; 
    }
    else{
        echo "Failed";
    }
}
?>