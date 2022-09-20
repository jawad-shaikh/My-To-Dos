<?php

include 'db_connection.php';
include 'userValidatorClass.php';

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
        $errors = $validation->validateSignup();

        if ($errors)
            return json_encode($errors);

        $username = $post_data['username'];
        $email = $post_data['email'];
        $password = $post_data['password'];

        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = $this->runQuery($query);

        if ($result->num_rows > 0)
            return json_encode(["email" => "email already exists"]);

        $query = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
        if ($this->runQuery($query))
            return json_encode(["success" => "user created"]);
    }

    public function login($post_data)
    {
        $validation = new UserValidator($post_data);
        $errors = $validation->validateLogin();

        if (empty($errors))
            return json_encode($errors);

        $email = $post_data['email'];
        $password = $post_data['password'];

        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = $this->runQuery($query);

        if ($result->num_rows == 0)
            return json_encode(["email" => "email does not exist"]);

        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->runQuery($query);

        if (!$result->num_rows > 0)
            return json_encode(["password" => "incorrect password"]);

        return json_encode(["success" => "user login"]);
    }

    private function runQuery($query)
    {
        $sql = $this->conn->query($query);
        if (!$sql)
            return "error occured";

        return $sql;
    }
}
