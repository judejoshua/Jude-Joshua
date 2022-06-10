<?php
    if ($_SESSION['adminid']){
        echo'
            <div class="user-options">
                <ul>
                    <li><a href="/relatives/admin/relatives/pass"><i class="mdi mdi-lock-open"></i>Change Password</a></li>
                    <li><a href="/relatives/admin/logout/"><i class="mdi mdi-power"></i>Logout</a></li>
                </ul>
            </div>
        ';
    }

?>
