<?php 
$conn=mysqli_connect('localhost','root','','PROJECT');
$sql="SELECT * FROM programs";
$res = mysqli_query($conn, $sql);
$data = [];
if (mysqli_num_rows($res)> 0){
while ($row = mysqli_fetch_assoc($res)){
	array_unshift($data, $row);
}
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>user list</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th></th>
				<th>program_id</th>
				<th>program_name</th>
				<th>description</th>
				<th>total_credit</th>
				<th>minimun_req</th>
				<th>total_cost</th>
			</tr>
		</thead>
		<?php 
		foreach($data as $d) {
			?>
			<tbody>
				<tr>
					<td><?php echo $d['program_id']; ?></td>
					<td><?php echo $d['program_name']; ?></td>
					<td><?php echo $d['description']; ?></td>
					<td><?php echo $d['total_credit']; ?></td>
					<td><?php echo $d['minimun_req']; ?></td>
					<td><?php echo $d['total_cost']; ?></td>
				
				
					<td>
						<a href="3)editform.php?program_id= <?php echo $d['program_id'] ?>">edit</a>
						<a href="4)deleteform.php?program_id=<?php echo $d['program_id']?>"onclick="return confirm('are you sure to delete??')">delete</a></td>


				
				</tr>
			</tbody>
		


		 <?php } ?>
	</table>

</body>
</html>