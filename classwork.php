<?php
	if (isset($_POST['submit'])) {
		$customer= $_POST['customer'];
		$amount = $_POST['amount'];
		$cheque=$_POST['cheque'];
	

		if (empty($customer) || empty($amount) || empty($cheque) ) {
			echo "Don't leave any field empty";
		}

		else{
		$conn= mysqli_connect('localhost','root','','classicmodels');
		//check connection

		if (!$conn) {
			die("connection failed:" . mysqli_connect_error());
		}
		$sql = "INSERT INTO payments(customerNumber,amount,checkNumber)
		VALUES('$customer','$amount','$cheque')";

		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
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
	<title>DBMS</title>
</head>
<body>
	<form method="post"  action="">
		
	
		customer: <select name="customer">
			<?php
				$conn = mysqli_connect('localhost','root','','classicmodels');
				$sql = "select customerNumber from customers";
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($res)) {
				  	echo "<option value= $row[customerNumber]>" . $row ['customerNumber'] . "</option>";
				  }  
			?>
		</select>
		<br><br><br>
			amount:<input type="text" name="amount">
		<br><br><br>
		cheque:<input type="text" name="cheque">
		<br><br><br>
		<input type="submit" name="submit">

	</form>
</body>
</html>