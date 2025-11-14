<?php
/*
 * Author: Nevaeh Mosley
 * Date: 11/13/2025
 * File: index.php
 * Description: Front controller (bootstrap) for the PeaPOD User Management System.
 *              Reads the "action" query string and dispatches the request to
 *              the appropriate method in UserController.
 */

require_once "application/database.class.php";
require_once "controllers/user_controller.class.php";

// Read and sanitize the "action" parameter from the query string
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

// Default action is "index" (registration form)
if (!$action) {
    $action = "index";
}

// List of valid actions for this application
$valid_actions = [
    "index",
    "register",
    "login",
    "verify",
    "logout",
    "reset",
    "do_reset",
    "error"
];

// Fallback to "error" if an invalid action is passed
if (!in_array($action, $valid_actions, true)) {
    $action = "error";
}

// Create the controller
$controller = new UserController();

// Dispatch based on action
switch ($action) {
    case "index":
        $controller->index();
        break;

    case "register":
        $controller->register();
        break;

    case "login":
        $controller->login();
        break;

    case "verify":
        $controller->verify();
        break;

    case "logout":
        $controller->logout();
        break;

    case "reset":
        $controller->reset();
        break;

    case "do_reset":
        $controller->do_reset();
        break;

    case "error":
    default:
        $controller->error();
        break;
}
