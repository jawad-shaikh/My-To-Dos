<?php

class UserValidator
{

  public $data;
  public $errors = [];

  public static $signupFields = [
    'username' => [
      'regex' => '/^.{6,}$/',
      'error' =>  'username must be at least 6 characters long'
    ],
    'email' => [
      'regex' => '/^\S+@\S+\.\S+$/',
      'error' => 'email must be a valid email address'
    ],
    'password' => [
      'regex' => '/^.{6,}$/',
      'error' => 'password must be at least 6 characters long'
    ]
  ];

  public static $loginFields = [
    'email' => [
      'regex' => '/^\S+@\S+\.\S+$/',
      'error' => 'email must be a valid email address'
    ],
    'password' => [
      'regex' => '/^.{6,}$/',
      'error' => 'password must be at least 6 characters long'
    ]
  ];

  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validateSignup()
  {
    $data = [];
    foreach (self::$signupFields as $key => $value) {
      if (!array_key_exists($key, $this->data)) {
        $this->addError($key, $key . " is not present in the data");
        return ['errors' => $this->errors];
      }

      $this->validate($key, $this->data[$key], $value['regex'], $value['error']);
      $data += [$key => $this->data[$key]];
    }
    return ['errors' => $this->errors, 'data' => $data];
  }

  public function validateLogin()
  {
    $data = [];
    foreach (self::$loginFields as $key => $value) {
      if (!array_key_exists($key, $this->data)) {
        $this->addError($key, $key . " is not present in the data");
        return ['errors' => $this->errors];
      }

      $this->validate($key, $this->data[$key], $value['regex'], $value['error']);
      $data += [$key => $this->data[$key]];
    }
    return ['errors' => $this->errors, 'data' => $data];
  }

  private function validate($field, $value, $regex, $error)
  {
    $val = trim($value);

    if (empty($val)) {
      $this->addError($field, "$field cannot be empty");
    } else {
      if (!preg_match($regex, $val)) {
        $this->addError($field, $error);
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
