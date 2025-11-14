<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: register.class.php
 * Description:
 */

class Register extends View {

    public function display($result) {
        $this->header();
        ?>

        <div class="top-row">
            <h2>Registration Status</h2>
        </div>

        <div class="middle-row">
            <?php if ($result): ?>
                <p>Your account was successfully created!</p>
                <a href="index.php?action=login">Click here to login</a>
            <?php else: ?>
                <p>Registration failed. Username may already exist.</p>
                <a href="index.php?action=index">Try again</a>
            <?php endif; ?>
        </div>

        <div class="bottom-row"></div>

        <?php
        $this->footer();
    }
}
?>
