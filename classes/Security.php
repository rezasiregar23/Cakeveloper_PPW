<?php

namespace web;

class Security
{
  // to generate a secure random string
  public static function random($length = 64)
  {
    $bytes = random_bytes($length / 2);
    return (bin2hex($bytes));
  }

  // to securely hash password
  public static function hashPassword($password)
  {
    $hash = password_hash($password, PASSWORD_ARGON2I);
    return ($hash);
  }

  // to verify password
  public static function verifyPassword($password, $hash)
  {
    return (password_verify($password, $hash));
  }
}
