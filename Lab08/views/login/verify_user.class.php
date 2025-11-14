<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: verify_user.class.php
 * Description:
 */


class VerifyUser extends View {

    public function display($result, $username) {
           // Output shared HTML header (branding, wrapper, title)
        $this->header();
?>
        <!-- Top section: page heading -->
        <div class="top-row">
            <h2>Login Status</h2>
        </div>

        <!-- Middle section: dynamic login success or failure message -->
        <div class="middle-row">

            <?php if ($result): ?>
                <!-- Login successful -->
                <p>Welcome back, <?= $username ?>!</p>

                <!-- Helpful action links for logged-in users -->
                <p><a href="index.php?action=reset">Reset Password</a></p>
                <p><a href="index.php?action=logout">Logout</a></p>

            <?php else: ?>
                <!-- Login failed -->
                <p>Invalid username or password.</p>

                <!-- Link to return to the login form -->
                <a href="index.php?action=login">Try Again</a>

            <?php endif; ?>

        </div>

        <!-- Bottom row used for layout spacing -->
        <div class="bottom-row"></div>

<?php
        // Output closing wrapper + HTML footer
        $this->footer();
    }
}
?>
