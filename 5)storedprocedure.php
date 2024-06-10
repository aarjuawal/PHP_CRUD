<?php
	if (isset($_POST['submit'])) {
		$customerNumber= $_POST['customerNumber'];
	

		if (empty($customerNumber)) {
			echo "Don't leave any field empty";
		}

		else{
		$conn= mysqli_connect('localhost','root','','classicmodels');
		//check connection

		if (!$conn) {
			die("connection failed:" . mysqli_connect_error());
		}
		$sql = "CALL productBoughtByCustomer($customerNumber)";
		$res = mysqli_query($conn,$sql);
		$data = array();
		while($row = mysqli_fetch_assoc($res)){
			$data[]= $row;

		}

		mysqli_close($conn);

		
		
	  }
	  echo "<pre>";

	  print_r($data);

	  echo "</pre>";

	}
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="">
		CustomerNumber: <select name="customerNumber">
			<?php
				$conn = mysqli_connect('localhost','root','','classicmodels');
				$sql = "select customerNumber from customers";
				
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($res)) {
				  	echo "<option value= $row[customerNumber]>" . $row ['customerNumber'] . "</option>";
				  }

			?>
			<br>


			<br><br>
			<input type="submit" name="submit" value="submit">
		
	</form>

</body>
</html>