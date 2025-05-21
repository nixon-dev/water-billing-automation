<html>

<?php include('../assets/includes/sessions.php') ?>

<?php

if ($_SESSION['role'] != "Administrator") {
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
                    <span class="text-xs block text-white">Administrator</span>
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

            <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'users.php' || basename($_SERVER['PHP_SELF']) == 'add-users.php' || basename($_SERVER['PHP_SELF']) == 'pending-users.php') {
                echo 'active';
            } ?>">
                <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">Users</span> <span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'users.php') {
                        echo 'active';
                    } ?>"><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i>Users List</a></li>
                    <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'add-users.php') {
                        echo 'active';
                    } ?>"><a href="add-users.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            Add Users</a></li>
                    <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'pending-users.php') {
                        echo 'active';
                    } ?>"><a href="pending-users.php"><i class="fa fa-user-times" aria-hidden="true"></i>
                            Pending Users</a></li>
                </ul>
            </li>


            <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'settings.php' || basename($_SERVER['PHP_SELF']) == 'staff.php') {
                echo 'active';
            } ?>">
                <a href="index.html"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span> <span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'settings.php') {
                        echo 'active';
                    } ?>">
                        <a href="settings.php"><i class="fa  fa-cog"></i> <span class="nav-label">Personal
                                Settings</span></a>
                    </li>

                    <li class="<?php if (basename($_SERVER['PHP_SELF']) == 'staff.php') {
                        echo 'active';
                    } ?>">
                        <a href="staff.php"><i class="fa  fa-users"></i> <span class="nav-label">Staff
                                Management</span></a>
                    </li>
                </ul>
            </li>

            <li><a href="include/logout.php"><i class="fa fa-sign-out"></i><span class="nav-label">Logout</span></a>
            </li>






        </ul>

    </div>
</nav>


</html>