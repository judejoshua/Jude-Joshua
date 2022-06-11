<?php
    if ($_SESSION['patientid']){
        echo'
            <div class="navigation-options">
                <ul id="side-links">
                    <li><a href="/branches/portal/patient/"><i class="mdi mdi-speedometer"></i>Dashboard</a></li>
                    <li><a href="/branches/portal/patient/branches/relatives/appointments/"><i class="mdi mdi-calendar"></i>Book Appointment</a></li>
                    <li><a href="/branches/portal/patient/branches/relatives/medics/"><i class="mdi mdi-database"></i>My Medical History</a></li>
                    <li><a href="/branches/portal/patient/branches/relatives/transactions/"><i class="mdi mdi-currency-ngn"></i>My Transactions</a></li>
                    <li><a href="/branches/portal/patient/branches/relatives/profile/"><i class="mdi mdi-account-outline"></i>My profile</a></li>
                    <li id="last"><a href="/branches/portal/patient/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
                </ul>
            </div>
        ';
    }
?>