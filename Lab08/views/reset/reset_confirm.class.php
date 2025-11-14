<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: reset_confirm.class.php
 * Description:
 */

class ResetConfirm extends View {

    public function display($result, $username) {
        $this->header();
?>

<div class="top-row"><h2>Password Reset</h2></div>

<div class="middle-row">
    <?php if ($result): ?>
        <p>Password successfully updated for <strong><?= $username ?></strong></p>
        <a href="index.php?action=login">Login</a>
    <?php else: ?>
        <p>Failed to update password.</p>
        <a href="index.php?action=reset">Try Again</a>
    <?php endif; ?>
</div>

<div class="bottom-row"></div>

<?php
        $this->footer();
    }
}
?>
