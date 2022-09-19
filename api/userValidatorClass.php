<?php

class UserValidator
{

  public $data;
  public $errors = [];
  public static $signupFields = ['username', 'email', 'password'];
  public static $loginFields = ['email', 'password'];

  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validateSignup()
  {
    foreach (self::$signupFields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("'$field' is not present in the data");
        return;
      }
    }

    $this->validateUsername($this->data['username']);
    $this->validateEmail($this->data['email']);
    $this->validatePassword($this->data['password']);
    return $this->errors;
  }

  public function validateLogin()
  {
    foreach (self::$loginFields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("'$field' is not present in the data");
        return;
      }
    }

    $this->validateEmail($this->data['email']);
    $this->validatePassword($this->data['password']);
    return $this->errors;
  }

  private function validateUsername($username)
  {
    $val = trim($username);

    if (empty($val)) {
      $this->addError('username', 'username cannot be empty');
    } else {
      if (!preg_match('/^.{6,}$/', $val)) {
        $this->addError('username', 'username must be at least 6 characters long');
      }
    }
  }

  private function validateEmail($email)
  {

    $val = trim($email);

    if (empty($val)) {
      $this->addError('email', 'email cannot be empty');
    } else {
      if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $this->addError('email', 'email must be a valid email address');
      }
    }
  }

  private function validatePassword($password)
  {
    $val = trim($password);

    if (empty($val)) {
      $this->addError('password', 'password cannot be empty');
    } else {
      if (!preg_match('/^.{6,}$/', $val)) {
        $this->addError('password', 'password must be at least 6 characters long');
      }
    }
  }

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
