<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: index.class.php
 * Description:
 */

class Index extends View {

    public function display() {
        $this->header();
        ?>

        <div class="top-row">
            <h2>Create Your Account</h2>
        </div>

        <div class="middle-row">
            <form action="index.php?action=register" method="post">

                <label>Username:</label>
                <input type="text" name="username" required>

                <label>Password:</label>
                <input type="password" name="password" minlength="5" required>

                <label>Email:</label>
                <input type="email" name="email" required>

                <label>First Name:</label>
                <input type="text" name="firstname" required>

                <label>Last Name:</label>
                <input type="text" name="lastname" required>

                <button type="submit">Register</button>

            </form>
        </div>

        <div class="bottom-row">
            <p>Already have an account? <a href="index.php?action=login">Login here</a></p>
        </div>

        <?php
        $this->footer();
    }
}
?>
