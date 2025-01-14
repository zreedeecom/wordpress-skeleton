<?php

/**
 * The Dotenv does convert any boolean variable to a string and thats
 * not convenient in our specific case so we borrowed this
 * helper funcion from Laravel framework.
 *
 * @link https://github.com/laravel/framework/blob/8c614010648bffb8bc24c3b532db08619e9a5983/src/Illuminate/Foundation/helpers.php#L618
 */
if (!function_exists('env')) {
  /**
   * Gets the value of an environment variable. Supports boolean, empty and null.
   *
   * @param string $key
   * @param mixed $default
   * @return mixed
   */
  function env($key, $default = null)
  {
    $value = getenv($key);
    if ($value === false) {
      return value($default);
    }
    switch (strtolower($value)) {
      case 'true':
      case '(true)':
        return true;
      case 'false':
      case '(false)':
        return false;
      case 'empty':
      case '(empty)':
        return '';
      case 'null':
      case '(null)':
        return;
    }
    // if (Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
    //   return substr($value, 1, -1);
    // }
    return $value;
  }
}

/**
 * This helper function gives the ability to convert a string into
 * an array. Environment variables are not meant to be used like
 * this, that's why we use a helper function.
 *
 * If no items an empty array is returned
 *
 * @param string $key
 * @return array $value
 */
if (!function_exists('envToArray')) {
  function envToArray($key)
  {
    $value = getenv($key);
    $value = str_replace([' ', '[', ']', '\'', '\"'], '', $value); # Clean up value
    if (empty($value)) return array();
    $value = explode(',', $value);

    return $value;
  }
}
