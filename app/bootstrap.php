<?php
// Load Config
require_once 'config/config.php';
/**
 * @param $page redirect to that page.
 */
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}

/**
 * @param $date
 * @return false|string date formate Y-M-d example 2022-Feb-25.
 * This is a helper function to show date in customize format in project.
 */
function showDate($date)
{
    return date('Y-M-d', strtotime($date));
}

session_start();
// Autoload Core Libraries
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
  
