<?php
    $search_value = "";
    
    if (isset($_GET['search_data_query'])) {
        $search_value = $_GET['search_data_query'];
    }
    echo '<!-- Header -->
    <header id="header">
        <!-- Header Top -->
        <div id="header-top">
            <div id="logo">
                <a href="./index.php">
                    <img src="./assets/images/logo/logo.png" alt="Website Logo">
                </a>
            </div>
            <div class="search-container notMobile" id="search-product-input-box">
                <form action="./searched_products.php" method="get">
                    <input type="search" placeholder="Search Your Product..." id="search-product-input" name="search_data_query" value="'. $search_value .'"  autocomplete="off">
                </form>
            </div>';
            if (!isset($_SESSION['loggedin'])) {
                echo '<div class="user-actions notMobile" id="openModal">
                <button class="btn btn-primary openModal">Login / Signup</button>
            </div>';
            } else {
                echo '<div class="user-actions" id="profile-dropdown-box">
                <div id="show-dropdown">
                    <div id="dropdown-title">
                        <a href="./profile.php">
                            <i class="fa-regular fa-user"></i>
                            <span>Profile</span>
                        </a>
                        <div id="profile-dropdown">
                            <div id="profile-dropdown-title">
                                <em>Hey</em>
                                <span>'. $_SESSION['user']['name'] .'</span>
                            </div>
                            <div id="dropdown-content">
                                <a href="./profile.php">
                                    <i class="fa-solid fa-user"></i>
                                    <span>My Profile</span>
                                </a>
                                <a href="./my_orders.php">
                                    <i class="fa-solid fa-cube"></i>
                                    <span>My Orders</span>
                                </a>
                                <a href="./Auth/_logout.php">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="./cart.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Cart</span>
                </a>
            </div>';
            }
            echo '<div class="user-actions onMobile">
                <i class="fa-solid fa-magnifying-glass" id="mobile-search"></i>
                <i class="fa-solid fa-bars" id="hamburger"></i>
            </div>
        </div>
        <!-- Header Navigation -->
        <nav id="navbar">
            <ul class="nav-items" id="mobile-navigation">';
            
                if (!isset($_SESSION['loggedin'])) {
                    echo '<li class="onMobile">
                        <div class="nav-profile-pic onMobile">
                            <h3 class="onMobile">Hey Guest</h3>
                        </div>
                    </li>
                    <li class="mobile-user-actions onMobile"><button id="mobile-login-signup-btn">Login / Register</button></li>';
                } else {
                    echo '<li class="onMobile">
                    <div class="nav-profile-pic onMobile">
                        <a href="./profile.php">
                            <h3>Hey '. $_SESSION['user']['name'] .'</h3>
                        </a>
                    </div>
                    </li>';
                }

                echo '<li><a href="./index.php" class="'.(($_SERVER['PHP_SELF']=='/FashionHub/index.php') ? "nav-active" : "").'" >Home</a></li>
                <li><a href="./shop.php" class="'. (($_SERVER['PHP_SELF']=='/FashionHub/shop.php') ? "nav-active" : "").'">Shop</a></li>
                <li><a href="./top_rated.php" class="'.(($_SERVER['PHP_SELF']=='/FashionHub/top_rated.php') ? "nav-active" : "").'">Top Rated</a></li>
                <li><a href="./about.php" class="'.(($_SERVER['PHP_SELF']=='/FashionHub/about.php') ? "nav-active" : "").'">About</a></li>
                <li><a href="./contact.php" class="'.(($_SERVER['PHP_SELF']=='/FashionHub/contact.php') ? "nav-active" : "").'">Contact us</a></li>';
                
                if (isset($_SESSION['loggedin'])) {
                    echo '<li class="phone-navigations"><a href="./cart.php">Cart</a></li>';
                    echo '<li class="phone-navigations"><a href="./my_orders.php">My Orders</a></li>';
                    echo '<li class="phone-navigations"><a href="./Auth/_logout.php">Logout</a></li>';
                }
            echo '</ul>
        </nav>
        <div id="mobile-search-box">
            <!-- Search Container -->
            <div id="search-container-2">
                <form action="./searched_products.php" method="get">
                    <input type="search" placeholder="Search Your Product..." id="search-product-input-2" name="search_data_query" autocomplete="off">
                </form>
            </div>
        </div>
    </header>';
?>