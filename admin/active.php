<?php

	include('db_connection.php');
	
	$id = $_GET["id"];
	$status = $_GET['status'];
	$page=$_GET["page"];
	if($status == "1")
	{
		$qry = "UPDATE `exam_committee` SET `status`='0' WHERE `id` = '$id'";
	}
	else
	{
		$qry = "UPDATE `exam_committee` SET `status`='1' WHERE `id` = '$id'";
	}
	
	$run = mysqli_query($conn,$qry);
?>

<script type="text/javascript">
	window.location = "chairman_list.php?page=<?php echo $page;?>";
</script>