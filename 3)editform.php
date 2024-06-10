<?php	
$program_id = $_GET['program_id'];
// echo $id;
$conn = mysqli_connect('localhost','root','','PROJECT');
if(isset($_POST['submit'])){
	$program_name = $_POST['program_name'];
	$description = $_POST['description'];
	$total_credit = $_POST['total_credit'];
	$minimun_req = $_POST['minimun_req'];
	$total_cost = $_POST['total_cost'];
	$program_id = $_POST['program_id'];
	$sql ="UPDATE programs set program_name= '$program_name', description ='$description' ,total_credit='$total_credit' minimun_req='$minimun_req' total_cost='$total_cost' where program_id= '$program_id'";
	mysqli_query($conn,$sql);
	if(mysqli_affected_rows($conn)==1){
		header('location:2)view.php');
	}
	else{
		echo "Data update failed".mysqli_error($conn);
	}

}
$sqli ="select *from programs where program_id = $program_id";
$res = mysqli_query($conn, $sqli);
$data = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Handling1</title>
</head>
<body>
	<form method="post" action="">
		<input type="hidden" names name="program_id" value="<?php echo $data['program_id']?>">
		program_name:<input type="text" name="program_name" value="<?php echo $data['program_name']; ?>"><br><br>
		description:<input type="text" name="description" value="<?php echo $data['description']; ?>"><br><br>
		total_credit:<input type="number" name="total_credit" value="<?php echo $data['total_credit']; ?>"><br><br>
		minimun_req:<input type="text" name="minimun_req" value="<?php echo $data['minimun_req']; ?>"><br><br>
		total_cost:<input type="number" name="total_cost" value="<?php echo $data['total_cost']; ?>"><br><br>
		<input type="submit" name="submit" value="submit">
	</form>
	

</body>
</html>