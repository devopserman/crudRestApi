<?php
if(isset($_POST["action"])){
    if($_POST["action"] == 'addNew'){
        $data = array(
            'to_do'     => $_POST["to_do"],
            'date'      => $_POST["date"]
        );
        $client = curl_init($_SERVER['HTTP_HOST'] . '/apiHandler.php?action=addNew');
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
 
    }else if(($_POST["action"] == 'delete') && (isset($_POST["id"]))){
        $data = array(
            'id'     => $_POST["id"]
        );
        $client = curl_init($_SERVER['HTTP_HOST'] . '/apiHandler.php?action=delete&id='.$_POST["id"]);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
 
    }
}

?>