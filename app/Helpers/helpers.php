<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active')) {
  function active(string $param)
  {
    return Route::is($param) ? 'active' : '';
  }
}
