<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: login.class.php
 * Description:
 */

class Login extends View {

    public function display() {
        $this->header();
?>

<div class="top-row"><h2>Login</h2></div>

<div class="middle-row">
    <form action="index.php?action=verify" method="post">

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

    </form>
</div>

<div class="bottom-row">
    <p><a href="index.php?action=reset">Forgot password?</a></p>
</div>

<?php
        $this->footer();
    }
}
?>
