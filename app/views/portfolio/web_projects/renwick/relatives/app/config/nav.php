<?php

    if ($_SESSION['user']){
        echo'
            <div class="navigation-options">
                <span class="exita"><i class="mdi mdi-close"></i></span>
                <ul id="side-links">
                    <li><a href="/po/renwick/relatives/app/" class="active"><i class="mdi mdi-speedometer"></i>Dashboard</a></li>
                    
                    <li><a id="links" class="ap" href="/po/renwick/relatives/app/relatives/sell/"><i class="mdi mdi-clipboard-text-outline"></i>Sell</a></li>
                    <li><a id="links" class="ap" href="/po/renwick/relatives/app/relatives/about/"><i class="mdi mdi-account-outline"></i>Profile</a></li>
                    <!--<li><a id="links" class="ap" href="/po/renwick/relatives/app/relatives/refer/"><i class="mdi mdi-graphql"></i>My Referrals</a></li>
                    <li><a id="links" href="/po/renwick/market/?pagelink=all"><i class="mdi mdi-bank-transfer"></i>Bid</a></li>
                    <li><a id="links" href="/po/renwick/relatives/app/relatives/notifications/"><i class="mdi mdi-format-quote-open"></i>Notifications</a></li>-->

                    <li id="last"><a href="/po/renwick/relatives/app/logout/"><i class="mdi mdi-power"></i>Logout</a></li>
                </ul>
            </div>
        ';
    }

?>
