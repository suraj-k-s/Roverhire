<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	.head-title{
		position: absolute;
		top: 20%;
		padding: 2rem;
		z-index: 5;
	}
	h1 .h1, h1 .h2{
		font-size: 45px;
    line-height: 0px;
    font-weight: 700;
    font-family: 'Nunito', sans-serif;
	}
	.h1{
		color: #fbaf32;
	}
	.h2{
		color: #719a0a;
	}
	.rh-link{
		font-size: 30px;
		font-weight: 700;
		margin: 10px 0;
	}
</style>
</head>

<body>
<?php include("Head.php") ?>
<div class="head-title">
	<h1><span class="h1">Rover</span><span class="h2">hire</span> : Rent Cars and Bikes for Every Adventure</h1>	
	<br>
	<a class="rh-link" href="Searchshop.php">Click Here to get your Ride</a>
</div>
<div>
    <lottie-player src="https://lottie.host/7992fd88-61ff-498d-a97a-29243dad6e62/4DZwlEKzfk.json" background="transparent" speed="1" loop autoplay></lottie-player>
</div>
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