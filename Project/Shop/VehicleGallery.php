<?php
include('../Assets/Connection/Connection.php');
$flag=0;
if(isset($_POST['btn_Save']))
{
    $photos=$_FILES['txt_gallery'];
    for ($i = 0; $i < count($photos['name']); $i++) {
        $photoName = $photos['name'][$i];
        $photoTmpName = $photos['tmp_name'][$i];
        move_uploaded_file($photoTmpName, '../Assets/Files/Shop/VehicleGallery/'.$photoName);
        $query = "INSERT INTO tbl_vehiclegallery (vehiclegallery_image,vehicle_id) VALUES ('$photoName','".$_GET['vid']."')";
        if($con->query($query))
        {
            $flag++;
        }
    }
    if($flag==$i)
    {
        echo '<script>alert("Upload Successfull");</script>';
    }
    else{
        ?>
        <script>alert("Only <?php echo $flag ?> Uploaded. Remaining Failed!");</script>'
        <?php
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include("Head.php") ?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1">
    <tr>
      <td>Gallery</td>
      <td><label for="txt_gallery"></label>
      <input type="file" name="txt_gallery[]" multiple id="txt_gallery" /></td>
    </tr>
    <tr>
     
      <td colspan="2" align="center"><input type="submit" name="btn_Save" id="btn_Save" value="Save" />
        <input type="submit" name="btn_Cancel" id="btn_Cancel" value="Cancel" />
   

    </tr>
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