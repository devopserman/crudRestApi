<?php
include("api.php");

$apiObject = new API();

if($_GET["action"] == 'outputData'){
    $data = $apiObject->outputData();
}

if($_GET["action"] == 'addNew'){
    $data = $apiObject->addNewToDo();
}

if($_GET["action"] == 'delete'){
	$id = $_GET["id"];
    $data = $apiObject->delete($id);
}

echo json_encode($data);
?>