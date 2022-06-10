<?php
    if ($_SESSION['adminid']){
        echo'
            <div class="navigation-options">
                <ul id="side-links">
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/"><i class="mdi mdi-home"></i>Dashboard</a></li>
                    <li>
                        <p><i class="mdi mdi-account-group"></i>Patients</p>
                        <ul>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/patients/break.php/?id=inhouse"><i class="mdi mdi-home-account"></i>School Patients</a</li>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/patients/break.php/?id=visiting"><i class="mdi mdi-airplane-landing"></i>Visiting patients</a></li>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/patients/"><i class="mdi mdi-contacts"></i>All Patients</a></li>
                        </ul>
                    </li>
                    <li>
                        <p><i class="mdi mdi-hospital"></i>Management</p>
                        <ul>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/management/break.php/?role=doctor"><i class="mdi mdi-stethoscope"></i>Doctors</a></li>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/management/break.php/?role=pharmacist"><i class="mdi mdi-pill"></i>Pharmacists</a></li>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/management/break.php/?role=lab_assistant"><i class="mdi mdi-microscope"></i>Lab Assistants</a></li>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/management/break.php/?role=receptionist"><i class="mdi mdi-face-agent"></i>Receptionists</a></li>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/management/"><i class="mdi mdi-hospital-building"></i>All staff</a></li>
                        </ul>
                    </li>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/appointments/"><i class="mdi mdi-calendar-multiselect"></i>Appointments</a></li>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/financials/"><i class="mdi mdi-currency-ngn"></i>Financials</a></li>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/reviews/"><i class="mdi mdi-comment-text-multiple-outline"></i>Reviews</a></li>
                    <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/contacts/"><i class="mdi mdi-chat-alert"></i>Contact Messages</a></li>
                    <li>
                        <p><i class="mdi mdi-dictionary"></i>Thesaurus</p>
                        <ul>
                            <li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/branches/relatives/thesaurus/about/"><i class="mdi mdi-account"></i>About Info</a></li>
                        </ul>
                    </li>
                    <li id="last"><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/admin/config/logout.php"><i class="mdi mdi-logout"></i>Logout</a></li>
                </ul>
            </div>
        ';
    }
?>