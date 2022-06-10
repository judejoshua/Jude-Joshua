<?php
    if ($_SESSION['patientid']){
        echo'
            <div class="user-options">
                <ul>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/patient/branches/relatives/pass"><i class="mdi mdi-lock-open"></i>Change Password</a></li>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/patient/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
                </ul>
            </div>
        ';
    }

?>