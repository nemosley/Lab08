<?php
/**
 * Author: Charley Corneil
 * Date: 11/13/25
 * File: logout.class.php
 * Description:
 */

class Logout extends View {

    public function display() {

        // Load shared page header (title, wrapper, logo)
        $this->header();
?>
        <!-- Top section: page heading -->
        <div class="top-row">
            <h2>You Have Logged Out</h2>
        </div>

        <!-- Middle section: logout confirmation message -->
        <div class="middle-row">
            <p>You have successfully logged out.</p>

            <!-- Link to return to the login page -->
            <a href="index.php?action=login">Login again</a>
        </div>

        <!-- Bottom section: empty for spacing / styling -->
        <div class="bottom-row"></div>

<?php
        // Close wrapper + complete HTML page
        $this->footer();

    }
}
?>
