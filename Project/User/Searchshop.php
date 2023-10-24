<?php include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  td{
    padding-left: 1rem;
  }
  #search{
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin: 2rem 5rem;
  }
  .s-card{
    padding: 1rem;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    gap: .5rem;
    box-shadow: 0px 0px 82px 20px rgba(0,0,0,0.1);
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">


    
  <table align="center">
    <tr>
   
      <td valign='middle'>District</td>
      <td width="179" cellpad>
        <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
          <option value=" ">----select----</option>
          <?php
          $sel ="select * from tbl_district";
          $row = $con->query($sel);
          while($data = $row->fetch_assoc())
          {
         ?>
             <option value="<?php echo $data['dist_id'];?> " 
              ><?php echo $data['dist_name']; ?></option >
             
             <?php
             }
             ?>
          ?>
        </select></td>
      <td>Place</td>
      <td valign='middle'>
        <select name="sel_place" id="ddl_place" onchange="getShop()">
        <option value=" ">----select----</option>
      </select></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div id="search">
  <?php
	$selqry="select * from tbl_shop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.dist_id=p.district_id inner join tbl_vehicle "; 
	$rows=$con->query($selqry);
	while($data=$rows->fetch_assoc())
	{
	?>
    <div class="s-card">
        <img src="../Assets/Files/Shop/logo/<?php echo $data["shop_logo"]?>"width="150" height="150" />
        <p><?php echo $data["shop_name"]?></p>
        <p><?php echo $data["shop_contact"]?></p>
        <p><?php echo $data["shop_email"]?></p>
        <p><?php echo $data["shop_address"]?></p>
        <p><?php echo $data["dist_name"]?></p>
        <p><?php echo $data["place_name"]?></p>
        <a href="Viewvehicle.php?sid=<?php echo $data["shop_id"] ?>">Book</a>
        <br /></p>
    </div>
    <?php
	}
  ?>
  </div>
 
 
</form>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#ddl_place").html(html);
      //getShop();
		}
		});
}

function getShop()
{
  var did=document.getElementById("sel_district").value;
  var pid=document.getElementById("ddl_place").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxShop.php?did="+did+"&pid="+pid,
		success: function(html){
			$("#search").html(html);
		}
		});
}
</script>
<?php include("Foot.php") ?>
</body>
</html>