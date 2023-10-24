<?php

include("../Connection/Connection.php");
?>
<div id="search">
    <?php
	$selqry="select * from tbl_shop s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.dist_id=p.district_id where true";
    if($_GET["pid"]!="")
    {
        $selqry.=" and s.place_id='".$_GET["pid"]."'";
    }
    if($_GET["did"]!="")
    {
        $selqry.=" and p.district_id='".$_GET["did"]."'";
    }
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
        <a href="Viewvehicle.php?sid=<?php echo $data ["shop_id"]?>">View vehicle</a>
        <br /></p>
    </div>
    <?php
	}
  ?>
  </div>