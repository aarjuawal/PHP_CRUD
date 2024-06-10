<?php 
if(isset($_POST['submit'])){
 $program_id =$_POST['program_id'];
 $program_name = $_POST['program_name'];
 $description= $_POST['description'];
  $total_credit= $_POST['total_credit'];
   $minimun_req= $_POST['minimun_req'];
    $total_cost= $_POST['total_cost'];
 if(empty($program_id)&&empty($program_name)&&empty($description)&&empty($total_credit)&&empty($minimun_req)&&empty($total_cost)){
 	echo "Don't leave any filled empty";
 }
 else{
 $conn=mysqli_connect('localhost','root','','PROJECT');
 if(!$conn){
 	die("connection failed: ".mysqli_connect_error());
 }

 $sql= "INSERT INTO programs(program_id,program_name,description,total_credit,minimun_req,total_cost)
 VALUES('$program_id','$program_name','$description','$total_credit','$minimun_req','$total_cost')";
 if(mysqli_query($conn, $sql)){
 	echo "New record created sucessfully";
 }
 else{
 	echo "Error:";
 }
}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Handling3</title>
</head>
<body>
	<form method="post" action="">
		program_id:<input type="number" name="program_id"><br><br><br>
		program_name:<input type="text" name="program_name"><br><br><br>
		description:<input type="text" name="description"><br><br><br>
		total_credit:<input type="number" name="total_credit"><br><br><br>
		minimum_req:<input type="text" name="minimun_req"><br><br><br>
		total_cost:<input type="number" name="total_cost"><br><br><br>
             
		<input type="submit" name="submit" value="send info">
	</form>
	
	
</body>
</html>