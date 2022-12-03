<?php
	session_start();
	if($_SESSION["loggedin"]!=1)
	{
		?>
			<script>
				window.location = "login.php";
			</script>
		<?php 
		exit();
	}
	include('db_connection.php');
	
	$id = $_GET['id'];
	$qry = "delete from `exam_committee` where id = '$id'";
	$res = mysqli_query($conn, $qry);

?>
<script type="text/javascript">
	window.alert("Teacher Deleted Successfully");
	window.location = "chairman_list.php";
</script>