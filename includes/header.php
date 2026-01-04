<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <style>
    body {
            overflow-x: hidden; 
            overflow-y: auto; 
        }

        .navbar {
            background-color: #fff;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px 10px 0px 0px;
            padding: 0 20px;
            margin-top: 25px;
            z-index: 2000;
            position: sticky; 
        }


        .login-btn, .register-btn {
            background-color: #22549F;
            color: #fff;
            font-size: 16px;
            padding: 8px 20px;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.2s;
            margin-right: 10px;
        }
        .login-btn:hover, .register-btn:hover {
            background-color: #021B40;
            color: #fff;
        }

        .search-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0px;
            margin-left: 140px;
        }

        .search-bar input[type="text"] {
            width: 600px; 
            padding: 8px;
            border: 3px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
            margin-right: 5px;
        }

        .search-bar input[type="submit"] {
            background-color: #22549F;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-bar input[type="submit"]:hover {
            background-color: #021B40;
        }

        .order-link {
            display: flex;
            align-items: center;
            color: #22549F;
            font-size: 20px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-right: 5px;
            padding: 8px 20px;
            border-radius: 10px;
        }
        .order-link img {
            margin-right: 8px;
            height: 24px;
            transition: 0.3s;
        }
        .order-link:hover {
            background-color: #5482C2;
            color: #002960;
        }

        .nav-drop {
            background-color: #22549F;
            color: #fff;
            font-size: 16px;
            padding: 8px 20px;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.4s;
            margin-right: 15px;
            z-index: 1050;
            position: relative; 
        }
        .nav-drop:hover {
            background-color: #021B40;
            color: #B0C7EA;
        }

        .dropdown-menu {
            left: auto;
            right: 0;
            border-radius: 10px;
            overflow: hidden;
            z-index: 1060;
            position: absolute; 
        }
        .dropdown-item {
            font-size: 16px;
            padding: 8px 20px;
            background-color: #fff;
            transition: 0.4s;
        }
        .dropdown-item:hover {
            background-color: #AAAAAA;
        }

        .sub-nav-bar {
            background-color: #22549F;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top:-11px;;
            z-index: 1000;
            position: sticky; 
        }

        .sub-nav-bar .navbar-nav {
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .sub-nav-bar .nav-item {
            margin-right: 15px;
        }

        .sub-nav-bar .nav-link {
            font-size: 16px;
            color: #CFDDF3;
            font-weight: 500;
            transition: color 0.3s, border-bottom 0.3s;
            text-align: center;
            padding: 10px;
            border-right: 1px solid #fff;
            position: relative;
        }

        .sub-nav-bar .nav-link:last-child {
            border-right: none;
        }

        .sub-nav-bar .nav-link.active {
            color: #67A2FF;
        }

        .sub-nav-bar .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 2px;
            background-color: #67A2FF;
        }

        .sub-nav-bar .nav-link:hover {
            color: #67A2FF;
        }

        .sub-nav-bar .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: #67A2FF;
            transition: width 0.3s;
        }

        .sub-nav-bar .nav-link:hover::after {
            width: 80%;
        }

        .business-logo {
          height: 85px;
          margin-top: 24px;
          margin-left: 22px;
        }
    </style>


<header>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#"><img src="assets/images/designs/logo.png" class="business-logo"></a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="search-bar">
                    <form method="get" action="products.php">
                        <input type="text" name="search_query" placeholder="Search for products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <?php
                if(empty($_SESSION["user_id"])) 
                {   
                    echo '<a href="login.php" class="login-btn">Login</a>';
                    echo '<a href="registration.php" class="register-btn">Register</a>';
                }
                else
                {  
                    echo '<a href="your_orders.php" class="order-link"><img src="assets/images/designs/order-logo.png" class="order-logo">Orders</a>';
                    echo '<div class="nav-item dropdown">';
                    echo '<a class="nav-drop dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>';
                    echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                    echo '</ul>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </nav>
    <nav class="sub-nav-bar navbar-expand-lg">
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) === 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
            </li>
            <?php 
                $categories = mysqli_query($conn, "SELECT * FROM categories");  
                while ($row = mysqli_fetch_array($categories)) {
                    $currentUrl = $_SERVER['REQUEST_URI'];
                    $isActive = strpos($currentUrl, 'products.php?cat_id=' . $row['c_id']) !== false ? 'active' : '';
            ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $isActive; ?>" href="products.php?cat_id=<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></a>
                </li>
            <?php 
                } 
            ?>
        </ul>
    </div>
</nav>



    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            var lastScrollTop = 0;
            var navbarHeight = $('.navbar').outerHeight();
            var subNavbarHeight = $('.sub-nav-bar').outerHeight();

            $(window).scroll(function(event) {
                var st = $(this).scrollTop();
                if (st > lastScrollTop) {
                    if (st > 500) {
                        $('.navbar').css('top', '-' + navbarHeight + 'px');
                    }
                } else {
                    if (st < 500) {
                        $('.navbar').css('top', '0px');
                    }
                }
                lastScrollTop = st;
            });
        }); -->
    </script>