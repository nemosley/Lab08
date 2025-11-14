<?php

/*
 * Author: your name
 * Date: today's date
 * Name: index.php
 * Description: short description about this file
 */

//include code in vendor/autoload.php file
require_once ("vendor/autoload.php");

//create an object of UserController
$user_controller = new UserController();

//add your code below this line to complete this file

$action = $_GET['action'] ?? 'index';

// Check if the method exists in the controller
if (method_exists($user_controller, $action)) {
    // Call the controller method
    $user_controller->$action();
} else {
    // If action doesn't exist, call the custom error page
    $user_controller->error("Method " . $action . " does not exist");
}