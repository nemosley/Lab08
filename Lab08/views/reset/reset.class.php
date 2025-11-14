<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: reset.class.php
 * Description:
 */

class Reset extends View {

    public function display($username) {
        $this->header();
?>

<div class="top-row"><h2>Reset Password</h2></div>

<div class="middle-row">
    <form action="index.php?action=do_reset" method="post">

        <label>Username:</label>
        <input type="text" name="username" value="<?= $username ?>" readonly>

        <label>New Password:</label>
        <input type="password" name="password" minlength="5" required>

        <button type="submit">Reset Password</button>

    </form>
</div>

<div class="bottom-row"></div>

<?php
        $this->footer();
    }
}
?>
