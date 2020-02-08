<?php
class API{
    private $connect = '';

    function __construct(){
        $this->dbConnection();
    }

    function dbConnection(){
        $this->connect = new PDO("mysql:host=localhost;dbname=crudrestapi", "root", "");
    }

    function outputData(){
        $select = $this->connect->prepare("SELECT * FROM todo ORDER BY id");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }

    function addNewToDo(){
        if(isset($_POST["to_do"])){
            $data = array(
                ':to_do' => $_POST["to_do"],
                ':date' => $_POST["date"]
            );
            $insert = $this->connect->prepare("INSERT INTO todo (to_do, date) VALUES (:to_do, :date)");
            $insert->execute($data);
        }
    }

    function delete($id){
        if(isset($id)){

            $insert = $this->connect->prepare("DELETE FROM todo WHERE id=".$id);
            $insert->execute();
            header('Location: /');
        }
    }

}

?>