<?php

include 'db_connection.php';

class ToDo
{

    protected $db;
    protected $conn;

    function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }

    public function createToDo($post_data)
    {
        $category = $post_data['category'];
        $thingy = $post_data['thingy'];

        $query = "INSERT INTO to_dos(user_id, category, thingy) VALUES(99, '$category', '$thingy')";

        if (!$this->runQuery($query))
            return json_encode(["failure" => "could not create to do"]);

        return json_encode(["success" => "created to do"]);
    }

    public function getAllToDos()
    {
        $query = "SELECT id, category, thingy FROM to_dos";

        $result = $this->runQuery($query);
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return json_encode($users);
    }

    public function deleteToDo($post_data)
    {
        $id = $post_data['id'];

        $query = "DELETE FROM to_dos WHERE id = $id";

        if (!$this->runQuery($query))
            return json_encode(["failure" => "could not delete to do"]);

        return json_encode(["success" => "deleted to do"]);
    }

    public function runQuery($query)
    {
        $sql = $this->conn->query($query);
        if (!$sql)
            return "error occured";

        return $sql;
    }
}
