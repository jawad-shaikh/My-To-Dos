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

        if (empty($errors)) {
            $username = $post_data['username'];
            $email = $post_data['email'];
            $password = $post_data['password'];

            $query = "SELECT email FROM users WHERE email = '$email'";
            $result = $this->runQuery($query);

            if ($result->num_rows > 0) {
                return json_encode(["email" => "email already exists"]);
            } else {
                $query = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
                if ($this->runQuery($query)) {
                    // $last_id = mysqli_insert_id($this->conn);
                    // session_start();
                    // $_SESSION['user_id'] = $last_id;
                    return json_encode(["success" => "user created"]);
                }
            }
        } else {
            return json_encode($errors);
        }
    }

    public function login($post_data)
    {
        $validation = new UserValidator($post_data);
        $errors = $validation->validateLogin();

        if (empty($errors)) {
            $email = $post_data['email'];
            $password = $post_data['password'];

            $query = "SELECT email FROM users WHERE email = '$email'";
            $result = $this->runQuery($query);

            if ($result->num_rows == 0)
                return json_encode(["email" => "email does not exist"]);

            if ($result->num_rows > 0) {
                $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                $result = $this->runQuery($query);

                if ($result->num_rows > 0) {
                    // session_start();
                    // $_SESSION['user_id'] = $result['id'];
                    return json_encode(["success" => "user login"]);
                } else {
                    return json_encode(["password" => "incorrect password"]);
                }
            }
        } else {
            return json_encode($errors);
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    private function runQuery($query)
    {
        $sql = $this->conn->query($query);
        if ($sql) {
            return $sql;
        } else {
            return "error occured";
        }
    }
}
