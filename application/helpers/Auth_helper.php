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

   if (!function_exists('isWaliLoggedIn')) {
      function isWaliLoggedIn()
      {
         if (!isset($_SESSION['username']) || !isset($_SESSION['name'])) {
            session_destroy();
            header("Location:/wali/login");
         }
      }
   }

   if (!function_exists('isSantriLoggedIn')) {
      function isSantriLoggedIn()
      {
         if (!isset($_SESSION['username']) || !isset($_SESSION['name'])) {
            session_destroy();
            header("Location:/santri/login");
         }
      }
   }

   if (!function_exists('isStaffLoggedIn')) {
      function isStaffLoggedIn()
      {
         if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['staff']) || $_SESSION['staff'] != true ) {
            session_destroy();
            header("Location:/staff/login");
         }
      }
   }

   if (!function_exists('isSecurityLoggedIn')) {
      function isSecurityLoggedIn()
      {
         if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['security']) || $_SESSION['security'] != true ) {
            session_destroy();
            header("Location:/keamanan/login");
         }
      }
   }

   if (!function_exists('isPengasuhLoggedIn')) {
      function isPengasuhLoggedIn()
      {
         if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['pengasuh']) || $_SESSION['pengasuh'] != true ) {
            session_destroy();
            header("Location:/pengasuh/login");
         }
      }
   }
