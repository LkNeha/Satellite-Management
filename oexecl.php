<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=organisation_list.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once 'connect.php';
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
                
                <th>Organisation ID</th>
                <th>Organisation Name</th>
                <th>Location</th>
                <th>Number of satellite launched</th>
                
				</tr>
			<tbody>
	";
 
	$query = $connection->query("select * ,count(*) as COUNT from organisation O, satellite S where O.ORGID=S.ORGID group by O.ORGID") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
 
	$output .= "
				<tr>
                
                <td>".$fetch['ORGID']."</td>
                <td>".$fetch['ORGNAME']."</td>
                <td>".$fetch['LOCATION']."</td>
                <td>".$fetch['COUNT']."</td>
                
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 ?>