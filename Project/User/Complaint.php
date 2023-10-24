<?php
ob_start();
session_start(); 
include("Head.php");
include("../Assets/Connection/connection.php");
if(isset($_POST["btnsave"]))
{
    $ins="insert into tbl_complaint(complaint_title,complaint_content,user_id)values('".$_POST["txtname"]."','".$_POST["txta"]."','".$_SESSION["uid"]."')";
    $con->query($ins);
    header("location:Complaint.php");
}

if(isset($_GET["did"]))
{
    $delqry="delete from tbl_complaint where complaint_id='".$_GET["did"]."'";
    $con->query($delqry);
    header("location:Complaint.php");
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
    <form action="" method="post">
        <table border="1" align="center" cellpadding="10">
            <tr>
                <td>Title</td>
                <td><input type="text" name="txtname" id=""></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><textarea name="txta" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Send" name="btnsave"> <input type="reset" value="Cancel" name="btnc"></td>
            </tr>

        </table>
        <table border="1" align="center" cellpadding="10">
            <tr>
                <th>Sl.No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Reply</th>
                <th>Action</th>
            </tr>
            <?php
            $sel="select * from tbl_complaint where user_id='".$_SESSION["uid"]."'";
            //echo $sel;
            $data=$con->query($sel);
            $i=0; 
            while($row=$data->fetch_assoc())
            {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row["complaint_title"] ?></td>
                    <td><?php echo $row["complaint_content"] ?></td>
                    <td><?php echo $row["complaint_reply"] ?></td>
                    <td><a href="Complaint.php?did=<?php echo $row["complaint_id"] ?>">Delete</a></td>
                </tr>
                <?php
            }
            ?>
            
        </table>
    </form>
</body>
</html>

<?php 
include("Foot.php") ;
ob_flush();
?>