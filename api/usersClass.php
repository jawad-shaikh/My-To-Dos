<?php

include 'db_connection.php';
include 'userValidatorClass.php';
include 'crudFunctionsClass.php';

class User
{

    protected $db;
    protected $conn;

    public function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }

    public function signUp($post_data)
    {
        $validation = new UserValidator($post_data);
        $errors_and_data = $validation->validateSignup();

        if ($errors_and_data['errors'])
            return json_encode($errors_and_data['errors']);

        $selectQuery = CrudFunctions::selectQuery('users', 'email');
        $selectQuery = $selectQuery . " WHERE email = '{$errors_and_data['data']['email']}'";

        $result = $this->runQuery($selectQuery);
        if ($result->num_rows > 0)
            return json_encode(["email" => "email already exists"]);

        $insertQuery = CrudFunctions::insertQuery('users', $errors_and_data['data']);
        if ($this->runQuery($insertQuery))
            return json_encode(["success" => "user created"]);

        return json_encode(["failure" => "could not create user"]);
    }

    public function login($post_data)
    {
        $validation = new UserValidator($post_data);
        $errors_and_data = $validation->validateLogin();

        if ($errors_and_data['errors'])
            return json_encode($errors_and_data['errors']);

        $selectQuery = CrudFunctions::selectQuery('users', 'email');
        $selectQuery = $selectQuery . " WHERE email = '{$errors_and_data['data']['email']}'";

        $result = $this->runQuery($selectQuery);
        if ($result->num_rows == 0)
            return json_encode(["email" => "email does not exist"]);

        $query = CrudFunctions::selectQuery('users', 'email');
        $query = $query . " WHERE email = '{$errors_and_data['data']['email']}' AND password = '{$errors_and_data['data']['password']}'";


        $result = $this->runQuery($query);
        if (!$result->num_rows > 0)
            return json_encode(["password" => "incorrect password"]);

        return json_encode(["success" => "user login"]);
    }

    private function runQuery($query)
    {
        if ($sql = $this->conn->query($query)) {
            return $sql;
        }
        return "error occured";
    }
}
