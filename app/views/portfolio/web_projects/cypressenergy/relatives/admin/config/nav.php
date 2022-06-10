<?php

    if ($_SESSION['adminid']){
        echo'
            <div class="navigation-options">
                <div class="logo">
                    <div class="logo-img">
                        <img src="/config/assets/images/loaad.png">
                    </div>
                    <div class="exita">
                        <i class="mdi mdi-chevron-left"></i>
                    </div>
                </div>
                <ul id="side-links">
                    <hr>

                    <li><a href="/relatives/admin/"><i class="mdi mdi-eye-outline"></i>Overview</a></li>

                    <hr>

                    <li><a href="/relatives/admin/relatives/requests/"><i class="mdi mdi-script-text-outline"></i>Client Requests <p>'.$c_requests.'</p></a></li>
                    <li><a href="/relatives/admin/relatives/messages/"><i class="mdi mdi-android-messages"></i>Client Messages <p>'.$c_messages.'</p></a></li>
                    <!--<li><a href="/relatives/admin/relatives/reviews/"><i class="mdi mdi-chat-processing"></i>Client Reviews <p>'.$c_reviews.'</p></a></li>-->
                    <li><a href="/relatives/admin/relatives/emails/"><i class="mdi mdi-email"></i>Email Subscribers <p>'.$s_sub.'</p></a></li>

                    <hr>

                    <!--<li><a href="/relatives/admin/relatives/services/"><i class="mdi mdi-settings-outline"></i>Services</a></li>-->
                    <li><a href="/relatives/admin/relatives/about/"><i class="mdi mdi-account-card-details-outline"></i>About Info</a></li>
                    <li><a href="/relatives/admin/relatives/gallery/"><i class="mdi mdi-view-carousel"></i>Our Gallery</a></li>

                    <hr>

                    <li id="last"><a href="/relatives/admin/logout/"><i class="mdi mdi-power"></i>Logout</a></li>
                </ul>
            </div>
        ';
    }
?>
