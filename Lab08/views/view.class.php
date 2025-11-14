<?php
/*
 * Author: Louie Zhu
 * Date: 03/09/2024
 * Name: view.class.php
 * Description: define the parent class for all view classes. The two methods create page header and footer.
 */

class View {

    //create the page header
    public static function header(): void {
        ?>
        <!DOCTYPE html lang="en">
        <html>
            <head>
                <meta charset="UTF-8">
                 <!-- Page title shown in browser tab -->
                <title>PeaPOD User Management System</title>

                <!-- Link to external stylesheet -->
                <link href="www/css/styles.css" rel="stylesheet" type="text/css"/>
            </head>

            <body>

                <!-- Application Title Banner -->
                <h1>
                    <span style="color: forestgreen; font-family: serif; font-size: 36pt">PeaPOD</span>
                    User Management System
                </h1>

                <!-- Open wrapper for page content -->
                <div id="wrapper">

                    <!-- PeaPOD logo displayed on right side -->
                    <img src="www/img/peapod_logo.png" style="float: right; width: 130px">

        <?php
    }

    /**
     * footer()
     * Close wrapper div and finish HTML page.
     */
    public static function footer(): void {
        ?>
                </div>  <!-- End wrapper -->

            </body>
        </html>
        <?php
    }

}
