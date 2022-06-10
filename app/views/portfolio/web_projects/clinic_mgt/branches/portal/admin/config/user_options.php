<?php
    if ($_SESSION['adminid']){
        echo'
            <div class="user-options">
                <ul>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/create"><i class="mdi mdi-account-group"></i>Add management</a></li>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/pass"><i class="mdi mdi-lock-open"></i>Change Password</a></li>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
                </ul>
            </div>
        ';
    }

?>