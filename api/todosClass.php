<?php
class ToDo {
    
    public $conn;
    public $category;
    public $thingy;

    function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "my-to-dos");
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }
    }

    public function createToDo($category, $thingy) {
        $query = "INSERT INTO to_dos(category, thingy) VALUES('$category', '$thingy')";
        $this->runQuery($query);
    }
    
    public function getAllToDos() {
        $query = "SELECT * FROM to_dos";
        $result = $this->runQuery($query);
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }
    
    public function deleteToDo($id) {
        $query = "DELETE FROM to_dos WHERE id = $id";
        $this->runQuery($query);
    }

    public function runQuery($query) {
        $sql = $this->conn->query($query);
        if ($sql) {
            return $sql;
        }else{
            echo "error occured";
        }
    }
}
?>