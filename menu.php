<header class="header trans_300">
    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-right">
                    <ul class="top_nav_menu">
                        <li class="account">
                            <a href="#">
                                My Account
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="account_selection">
                                <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="#">MAKAN<span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="keranjang.php">Keranjang</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                            <li><a href="riwayat.php">Riwayat</a></li>
                            <?php if (isset($_SESSION["pelanggan"])) : ?>
                                <li><a href="logout.php">Logout</a></li>
                            <?php else : ?>
                                <li><a href="login.php">Login</a></li>
                            <?php endif ?>
                        </ul>
                        <form class="form-inline my-2 my-lg-0" action="pencarian.php" method="get">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>