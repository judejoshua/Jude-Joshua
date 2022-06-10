<div class="navigation">
    <div id="navy">
        <div class="bottom-nav">
            <div class="navlinks-holder">
                <div id="mobile-opener">
                    <i id="menu" class="mdi mdi-menu"></i>
                </div>
                <a href="/">
                    <div id="logo_class">
                        <div class="block"></div>
                        <div class="logo_nav_options">
                            <img src="/config/assets/images/teal.png" alt="Logo"/>
                        </div>
                    </div>
                </a>
                <div id="links_class">
                    <span id="exitpa"><i class="mdi mdi-close"></i></span>
                    <ul class="left-links">
                        <li>
                            <a href="/">
                                <h3>Home</h3>
                            </a>
                        </li>
                        <li id="categories">
                            <a href="#">
                                <h3>Categories<i class="mdi mdi-chevron-down"></i></h3>
                            </a>
                            <ul class="sb">
                            <?php
                                // $cate_query = mysqli_query($db, "SELECT * FROM `category` ");
                                // if(mysqli_num_rows($cate_query) > 0){
                                //     //output data of each row
                                //     while($cat = mysqli_fetch_array($cate_query)){
                                //         $cate = $cat['category'];
                                //         echo'
                                //             <li><a href="/market?pagelink='.$cate.'">'.$cate.'</a></li>
                                //         ';
                                //     }
                                // }
                            ?>
                                <li><a href="/market?pagelink=all">All Categories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/home?pagelink=sell">
                                <h3>Auctions</h3>
                            </a>
                        </li>
                        <li>
                            <a href="/home?pagelink=bid">
                                <h3>Bid</h3>
                            </a>
                        </li>
                        <li>
                            <a href="/home?pagelink=refer">
                                <h3>Refer</h3>
                            </a>
                        </li>
                        <li>
                            <a href="/home?pagelink=support">
                                <h3>Support</h3>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="canver">
                    <ul>
                        <li>
                            <a href="#" id="searchtip"><i class="mdi mdi-magnify"></i></a>
                            <div class="tooltip">
                                <p>Search</p>
                            </div>
                        </li>
                        <li>
                            <a href="#"><i class="mdi mdi-cart-outline"></i></a>
                            <div class="tooltip">
                                <p>Cart: Empty<br>Cart: 6 Items</p>
                            </div>
                        </li>
                        <li>
                            <a href="#"><i class="mdi mdi-heart-outline"></i></a>
                            <div class="tooltip">
                                <p>Favourites</p>
                            </div>
                        </li>
                        <li>
                            <a href="/relatives/app"><i class="mdi mdi-account-outline"></i></a>
                            <div class="tooltip">
                                <p>Account</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
