<?php
/**
 *Author:Nevaeh Mosley
 *Date:11/13/2025
 *File:user_model.class.php
 *Description
 */

class UserModel
{
    private mysqli $db;

    // Constructor – connect to database using Database class
    public function __construct()
    {
        $this->db = Database::getDatabase();
    }

    /**
     * add_user
     * Retrieve data from registration form and insert a new user.
     * Password must be hashed before storing.
     * return true if inserted, false otherwise.
     */
    public function add_user(): bool
    {
        // Sanitize POST data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $fname    = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $lname    = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);

        if (!$username || !$password || !$email || !$fname || !$lname) {
            return false;
        }

        // Hash password
        $hashed_pw = password_hash($password, PASSWORD_DEFAULT);

        // Insert query
        $query = "INSERT INTO users (username, password, email, fname, lname)\n                  VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("sssss", $username, $hashed_pw, $email, $fname, $lname);

        return $stmt->execute();
    }

    /**
     * verify_user
     * Check submitted username/password against database record.
     * If correct → create temporary cookie and return true.
     * If incorrect → return false.
     */
    public function verify_user(): bool
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if (!$username || !$password) {
            return false;
        }

        // Query the user
        $query = "SELECT password FROM users WHERE username = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashed_pw);

        if ($stmt->fetch() && password_verify($password, $hashed_pw)) {
            // Successful login → create temporary cookie (lasts 20 minutes)
            setcookie("username", $username, time() + 1200, "/");
            return true;
        }

        return false;
    }

    /**
     * logout
     * Destroy username cookie.
     */
    public function logout(): bool
    {
        if (isset($_COOKIE['username'])) {
            setcookie("username", "", time() - 3600, "/");
        }
        return true;
    }

    /**
     * reset_password
     * Update a user's password with hashing.
     * return true if updated, false otherwise.
     */
    public function reset_password(): bool
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $new_pw   = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if (!$username || !$new_pw) {
            return false;
        }

        $hashed_pw = password_hash($new_pw, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("ss", $hashed_pw, $username);

        return $stmt->execute();
    }
}