<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');


$did = "";
$dname = "";

	if(isset($_POST['btn_save']))
	{
		
		$vehicletype = $_POST['txt_vehicletype'];
		
		
			$ins = "insert into tbl_vehicletype(vehicletype_name) values('".$vehicletype."')";
		
			if($con->query($ins))
			{
				header("Location:vehicletype.php");
			}
		
		
		
		
	}
	
	if(isset($_GET['id']))
	{
		$del = "delete from tbl_vehicletype where vehicletype_id = '".$_GET['id']."'";
		if($con->query($del))
		{
			header("Location:vehicletype.php");
		}
	}
	
	

?>
<body>
        <section class="main_content dashboard_part">
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Table vehicletype</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_vehicletype">vehicletype Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_vehicletype" name="txt_vehicletype" autocomplete="off" required>
                                                </div>
                                                <div class="form-group" align="center">
<input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save" >
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">vehicletype</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_vehicletype";
                                                $rs = $con->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["vehicletype_name"];?></td>
                                                <td align="center"><a href="vehicletype.php?id=<?php echo $data["vehicletype_id"];?>" class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
</td>                                            </tr>
                                            <?php                    
                                              }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>