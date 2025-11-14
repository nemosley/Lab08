<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: login.class.php
 * Description:
 */

class Login extends View {

    public function display() {
        // Load shared page header (title, wrapper, logo)
        $this->header();
?>
        <!-- Top section: page heading -->
        <div class="top-row">
            <h2>Login</h2>
        </div>

        <!-- Middle section: login form -->
        <div class="middle-row">

            <!-- Login form submits via POST to the verify action -->
            <form action="index.php?action=verify" method="post">

                <!-- Username field -->
                <label>Username:</label>
                <input type="text" name="username" required>

                <!-- Password field -->
                <label>Password:</label>
                <input type="password" name="password" required>

                <!-- Submit button -->
                <button type="submit">Login</button>

            </form>
        </div>

        <!-- Bottom section: link for users who forgot their password -->
        <div class="bottom-row">
            <p><a href="index.php?action=reset">Forgot password?</a></p>
        </div>

<?php
        // Close wrapper and complete the HTML page
        $this->footer();
    }
}
?>
