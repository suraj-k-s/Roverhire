<?php
include('../Assets/Connection/Connection.php');
session_start();
if(isset($_GET['id'])){
    $updQry="update tbl_pickup set pickup_status='".$_GET['st']."' where pickup_id=".$_GET['id'];   
    if($con->query($updQry)){
        ?>
        <script>
            alert('Enter the Kilometer Reading')
            window.location='Bookings.php'
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border='1'>
        <tr>
            <td>Sl.No</td>
            <td>Name</td>
            <td>Contact</td>
            <td>Vehicle</td>
            <td>Starting Kilometer Reading</td>
            <td>Ending Kilometer Reading</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        <?php
            $selQry="select * from tbl_pickup pk inner join tbl_userrequest ur on pk.userrequest_id=ur.userrequest_id inner join tbl_vehicle v on v.vehicle_id=ur.vehicle_id inner join tbl_user u on u.user_id=ur.user_id where pk.staff_id=".$_SESSION['sfid'];
            echo $selQry;   
            $res=$con->query($selQry);
            $i=0;
            while($data=$res->fetch_assoc()){
                $i++;
                ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data['user_name'] ?></td>
            <td><?php echo $data['user_contact'] ?></td>
            <td><?php echo $data['vehicle_name'] ?></td>
            <td><?php
            if($data['pickup_status']==0){
                echo "----";
            }
            else if($data['pickup_status']==1 || $data['pickup_status']==4){
                if($data['pickup_status']==4){
                    echo "Re Enter the KM Reading<br>";
                }
                ?>
                <input type="text" name="KMReading" id="KMReading"><button onClick="Deliver(<?php echo $data['pickup_id'] ?>,'start')" type="button">Submit</button>
                <?php
            }
            else{
                echo $data['starting_km'];
            }
                ?>
            </td>
            <td><?php
            if($data['pickup_status']<6){
                echo "----";
            }
            else if($data['pickup_status']==6 || $data['pickup_status']==9){
                if($data['pickup_status']==9){
                    echo "Re Enter the KM Reading<br>";
                }
                ?>
                <input type="text" name="KMReading" id="KMReading"><button onClick="Deliver(<?php echo $data['pickup_id'] ?>,'end')" type="button">Submit</button>
                <?php
            }
            else{
                echo $data['ending_km'];
            }
                ?>          
            </td>
            <td><?php
            if($data['pickup_status']==0){
                echo "Delivery Date: ".$data['userrequest_bookdate']."<br>Delivery Time: ".$data['userrequest_booktime'];
            }
            else if($data['pickup_status']==1){
                echo "Enter the Starting Kilometer";
            } 
            else if($data['pickup_status']==2 || $data['pickup_status']==7
            ){
                echo "Customer not Confirmed yet!";
            } 
            ?></td>
            <td>
            <?php
            if($data['userrequest_status']==3 && $data['pickup_status']==0){
                ?>
                    <a href="Bookings.php?id=<?php echo $data['pickup_id'] ?>&&st=1">Deliver</a>
                <?php
            }
            else if($data['pickup_status']==5){
                ?>
                    <a href="Bookings.php?id=<?php echo $data['pickup_id'] ?>&&st=6">Picked Up</a>
                <?php
            }
            ?>
        </td>
        </tr>
                <?php
            }
        ?>
    </table>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function Deliver(pid,action)
{
    console.log(action);
    var km=document.getElementById('KMReading').value
	$.ajax({
		url:"../Assets/AjaxPages/AjaxDeliver.php?pid="+pid+"&&action="+action+"&&km="+km,
		success: function(html){
			alert(html)
            window.location='Bookings.php'
		}
		});
}
</script>
</html>