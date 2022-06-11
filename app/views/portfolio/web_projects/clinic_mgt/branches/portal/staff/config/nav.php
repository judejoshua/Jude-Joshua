<?php
    if ($_SESSION['staffid']){
        if($_SESSION['staffrole']=='Doctor'){
            echo'
                <div class="side-nav">
                    <div class="navigation-options">
                        <div class="img">
                            <div></div>
                            <img src="/branches/portal/staff/config/assets//'.$target_dir.$target_file.'" />
                        </div>
                        <ul id="side-links">
                            <li><a href="/branches/portal/staff/"><i class="mdi mdi-speedometer"></i>Dashboard</a></li>
                            <li><a href="/branches/portal/staff/branches/relatives/appointments/"><i class="mdi mdi-briefcase"></i>Appointments</a></li>
                            <li><a href="/branches/portal/staff/branches/relatives/profile/"><i class="mdi mdi-account"></i>My profile</a></li>
                            <li><a href="/branches/portal/staff/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            ';
        }else{
            echo'
                <div class="side-nav">
                    <div class="navigation-options">
                    </div>
                </div>
            ';
        }
    }
?>