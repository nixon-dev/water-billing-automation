<html>

<?php include('../assets/includes/sessions.php') ?>

<?php

if ($_SESSION['role'] != "Staff") {
    session_destroy();
}
?>




<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img src="../assets/img/dwd-logo.png" class="rounded-circle" width="60px" height="60px"
                        style="margin-bottom: 10px;">
                    <span class="block text-l font-bold text-white">DIFFUN WATER DISTRICT</span>
                    <span class="text-xs block text-white">Staff</span>
                </div>
                <div class="logo-element">
                    <img src="../assets/img/dwd-logo.png" class="rounded-circle" width="50px" height="50px">
                </div>
            </li>

            <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                echo 'active';
            } ?>">
                <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <!-- <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'reports.php') {
                echo 'active';
            } ?>">
                <a href="reports.php"><i class="fa  fa-file-text"></i> <span class="nav-label">Reports</span></a>
            </li> -->

            <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'watermeter.php') {
                echo 'active';
            } ?>">
                <a href="watermeter.php"><i class="fa  fa-tachometer"></i> <span class="nav-label">Water
                        Meter</span></a>
            </li>

            <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'settings.php') {
                echo 'active';
            } ?>">
                <a href="settings.php"><i class="fa  fa-cog"></i> <span class="nav-label">Settings</span></a>
            </li>

            <li><a href="include/logout.php"><i class="fa fa-sign-out"></i><span class="nav-label">Logout</span></a>
            </li>




        </ul>

    </div>
</nav>


</html>