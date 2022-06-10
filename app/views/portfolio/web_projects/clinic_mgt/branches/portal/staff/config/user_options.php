<?php
    if ($_SESSION['staffid']){
        if($_SESSION['staffrole']=='Doctor'){
            echo'
                <div class="user-options">
                    <ul>
                        <li><a href="http://localhost/cms/branches/portal/staff/branches/relatives/pass"><i class="mdi mdi-lock-open"></i>Change Password</a></li>
                        <li><a href="http://localhost/cms/branches/portal/staff/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
                    </ul>
                </div>
            ';
        }else{
            echo'
                <div class="user-options">
                    <ul>
                        <li><a href="http://localhost/cms/branches/portal/staff/"><i class="mdi mdi-speedometer"></i>Dashboard</a></li>
                        <li><a href="http://localhost/cms/branches/portal/staff/branches/relatives/profile/"><i class="mdi mdi-account"></i>My profile</a></li>
                        <li><a href="http://localhost/cms/branches/portal/staff/branches/relatives/pass"><i class="mdi mdi-lock-open"></i>Change Password</a></li>
                        <li><a href="http://localhost/cms/branches/portal/staff/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
                    </ul>
                </div>
            ';
        }
    }

?>