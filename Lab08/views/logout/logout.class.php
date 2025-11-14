<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: logout.class.php
 * Description:
 */

class Logout extends View {

    public function display() {
        $this->header();
?>

<div class="top-row"><h2>You Have Logged Out</h2></div>

<div class="middle-row">
    <p>You have successfully logged out.</p>
    <a href="index.php?action=login">Login again</a>
</div>

<div class="bottom-row"></div>

<?php
        $this->footer();
    }
}
?>
