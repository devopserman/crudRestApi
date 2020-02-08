<?php
$client = curl_init($_SERVER['HTTP_HOST'] . '/apiHandler.php?action=outputData');
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);

$output = '';

if($result){
	if (count($result) > 0){
	    foreach($result as $row){
	        $output .= '
	            <tr>
	                <td>'.$row->id.'</td>
	                <td>'.$row->to_do.'</td>
	                <td>'.$row->date.'</td>
	                <td><a href="/apiHandler.php?action=delete&id='.$row->id.'">delete</a></td>
	            </tr>
	        ';
	    }
	}
}else{
	    $output .= '<tr><td colspan="3" align="center">Not found!</td></tr>';
	}


echo $output;
?>