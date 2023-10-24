<?php
include('../Assets/Connection/Connection.php');
session_start();
if(isset($_GET['id'])){
    $updQry="update tbl_pickup set pickup_status='".$_GET['st']."' where pickup_id=".$_GET['id'];
    if($con->query($updQry)){
        ?>
        <script>
            alert('Response Recorded')
            window.location='BookingStatus.php?pid=<?php echo $_GET['id'] ?>'
            </script>
            <?php
    }
    else{
        ?>
        <script>
            alert('Failed')
            window.location='BookingStatus.php?pid=<?php echo $_GET['id'] ?>'
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
            <td>Vehicle Name</td>
            <td>Delivering By</td>
            <td>Starting KM</td>
            <td>Ending KM</td>
            <td>Action</td>
        </tr>
        <?php
         $selQry="select * from tbl_pickup pk inner join tbl_userrequest ur on pk.userrequest_id=ur.userrequest_id inner join tbl_vehicle v on v.vehicle_id=ur.vehicle_id inner join tbl_staff s on s.staff_id=pk.staff_id where ur.user_id=".$_SESSION['uid'];
         $res=$con->query($selQry);
         $data=$res->fetch_assoc();
         ?>
        <tr>
            <td><?php echo $data['vehicle_name'] ?></td>
            <td><?php echo $data['staff_name'] ?></td>
            <td>
                <?php
            if($data['pickup_status']==0){
                echo "----";
            }
            else{
                echo $data['starting_km'];
            }
            ?>
            </td>
            <td>
                <?php
            if($data['pickup_status']<7){
                echo "----";
            }
            else{
                echo $data['ending_km'];
            }
            ?>
            </td>
            <td>
                <?php
                    if($data['pickup_status']==2){
                        echo "Do you Confirm the Starting Kilometer Reading";
                        ?>
                        <br>
                        <a href="BookingStatus.php?id=<?php echo $data['pickup_id'] ?>&&st=3">Confirm</a>&nbsp;
                        <a href="BookingStatus.php?id=<?php echo $data['pickup_id'] ?>&&st=4">Reject</a>
                        <?php
                    }
                    else if($data['pickup_status']==3){
                        ?>
                        <a href="BookingStatus.php?id=<?php echo $data['pickup_id'] ?>&&st=5">Return Vehicle</a>
                        <?php
                    }
                    else if($data['pickup_status']==5){
                        echo "Vehicle will be picked up shortly";
                    }
                    else if($data['pickup_status']==7){
                        echo "Do you Confirm the Starting Kilometer Reading";
                        ?>
                        <br>
                        <a href="BookingStatus.php?id=<?php echo $data['pickup_id'] ?>&&st=8">Confirm</a>&nbsp;
                        <a href="BookingStatus.php?id=<?php echo $data['pickup_id'] ?>&&st=9">Reject</a>
                        <?php
                    }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>