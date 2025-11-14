<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: verify_user.class.php
 * Description:
 */


class VerifyUser extends View {

    public function display($result, $username) {
        $this->header();
?>

<div class="top-row"><h2>Login Status</h2></div>

<div class="middle-row">
    <?php if ($result): ?>
        <p>Welcome back, <?= $username ?>!</p>
        <p><a href="index.php?action=reset">Reset Password</a></p>
        <p><a href="index.php?action=logout">Logout</a></p>
    <?php else: ?>
        <p>Invalid username or password.</p>
        <a href="index.php?action=login">Try Again</a>
    <?php endif; ?>
</div>

<div class="bottom-row"></div>

<?php
        $this->footer();
    }
}
?>
