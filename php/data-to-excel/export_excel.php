<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=file.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'conn.php';
	
	$output = "";
	
	$output .="
		<table>
			<thead>
				<tr>
					<th>stud_id</th>
					<th>firstname</th>
					<th>lastname</th>
					<th>year</th>
					<th>section</th>
				</tr>
			<tbody>
	";
	
	$query = $conn->query("SELECT * FROM `student`") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
		
	$output .= "
				<tr>
					<td>".$fetch['stud_id']."</td>
					<td>".$fetch['firstname']."</td>
					<td>".$fetch['lastname']."</td>
					<td>".$fetch['year']."</td>
					<td>".$fetch['section']."</td>
				</tr>
	";
	}
	
	$output .="
			</tbody>
			
		</table>
	";
	
	echo $output;
	
	
?>