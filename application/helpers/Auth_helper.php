<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   if (!function_exists('isAdminLoggedIn')) {
      function isAdminLoggedIn()
      {
         if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['level'])) {
            session_destroy();
            header("Location:/admin/login");
         }
      }
   }
