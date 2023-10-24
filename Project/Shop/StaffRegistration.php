<?php 
session_start();
  include("Head.php") ;
	include("../Assets/Connection/connection.php");
	if(isset($_POST["btn_register"]))
	{
		$name=$_POST["txt_name"];
		$contact=$_POST["txt_contact"];
		$email=$_POST["txt_email"];
		$address=$_POST["txt_address"];
		
		$photo=$_FILES["txt_photo"]["name"];
		$temp=$_FILES["txt_photo"]["tmp_name"];
		move_uploaded_file($temp,'../Assets/Files/Staff/'.$photo);
		
	    $password=$_POST["txt_password"];
		$cnpassword=$_POST["txt_cnpassword"];
		
			$insQry="insert into tbl_staff(staff_name,staff_contact,staff_email,staff_address,staff_photo,staff_password,shop_id)values('".$name."','".$contact."','".$email."','".$address."','".$photo."','".$password."','".$_SESSION["sid"]."')";
	if($con->query($insQry))
		{
		?>
		<script>
		alert("Data inserted");
		//window.location="StaffRegistration.php";
		</script>
		<?php
	}
	else
	{
		echo $insQry;
	}
		
	}
	
	if(isset($_GET['did']))
	{
		$delQry="delete from tbl_staff where staff_id=".$_GET['did'];
		if($con->query($delQry))
		{
		?>
		<script>
		alert("Data deleted");	
		window.location="StaffRegistration.php";
		</script>
		<?php
	}
	else
	{
	?>
    <script>
	alert("failed");
	window.location="StaffRegistration.php";
	</script>
    <?php
	}
	}
		?>  
	
<form id="form1" name="form1" method="post" action=""  enctype="multipart/form-data">
  <table width="298" border="1">
    <tr>
      <td width="114">Name</td>
      <td width="168"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_add"></label>
      <input type="text" name="txt_address" id="txt_address" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="txt_photo"></label>
      <input type="file" name="txt_photo" id="txt_photo" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td>Confirm password</td>
      <td><label for="txt_confirm"></label>
      <input type="text" name="txt_cnpassword" id="txt_cnpassword" /></td>
    </tr>
    <tr>
       <td colspan="2">
     <div align="center">
       <input type="submit" name="btn_register" id="btn_register" value="Register" />
       <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
    </div></td>
   
      
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_staff where shop_id='".$_SESSION["sid"]."'";
	$data=$con->query($sel);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row["staff_name"]?></td>
      <td><?php echo $row["staff_contact"]?></td>
      <td><?php echo $row["staff_email"]?></td>
      <td><a href="StaffRegistration.php?did=<?php echo $row["staff_id"]?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  
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
