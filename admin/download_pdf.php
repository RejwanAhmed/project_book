<?php 
	 include('db_connection.php');
	
	
	$id = $_GET['id'];
	$qry = "select * from `project_information` where `id` = $id";
	$res = mysqli_query($conn,$qry);
	$file = mysqli_fetch_assoc($res);
	
	if (empty($file['pdf'])==false) {
		$filepath = '../user/pdf/'.$file['pdf'];
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../user/pdf/'.$file['pdf']));
		ob_clean();
		//flush();
        readfile('../user/pdf/'.$file['pdf']);        
        
    }
	else
	{
		?>
		<script type="text/javascript">
			window.alert("No file exist");
			window.location = "view_project_details.php?id=<?php echo $id; ?>";
		</script>
		<?php
	}
?>
