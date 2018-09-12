<?php

require './dbconnect.php';

$conn = mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
$query=mysqli_query($conn,"SELECT * from feedback");
?>
<html>
<head>
    <link href="css/table-style.css" rel="stylesheet">
</head>
<body>
    
<div class="table-responsive">
	<table class="table color-bordered-table primary-bordered-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Message</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row=mysqli_fetch_assoc($query)){
				echo '<tr>
				<td>'.$row["sl_no"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["contact"].'</td>
				<td>'.$row["description"].'</td>
				<td>'.$row["timestamp"].'</td>
			</tr>';
			}
			?>
		</tbody>
	</table>
</div>
</body>
</html>