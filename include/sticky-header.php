<?php
$currentUrl = $_SERVER['REQUEST_URI'];
?>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @keyframes fadeInDown {
            0% {
                opacity: 0.5;
                transform: translateY(-50px); /* Start slightly above the final position */
            }
            100% {
                opacity: 1;
                transform: translateY(0); /* End at the final position */
            }
        }
        /* Sticky Header Styling */
        .sticky-header {
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border-bottom: 1px solid #24577B;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px 100px;
            transition: top 0.3s ease-in-out; /* Smooth transition for hiding and showing */
            border-top: 1px solid #24577B;
            z-index: 1000;
            position: absolute; /* Change from fixed to absolute */
            top: 0;
            margin-bottom: 50px;
            animation: fadeInDown 0.5s ease-in-out; 
            animation-delay: 500ms; 
            animation-fill-mode: forwards; 
        }

        /* Hamburger Icon Styling */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            margin-left: auto;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: #020817;
            transition: all 0.3s ease-in-out;
        }

        .hamburger.active div:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger.active div:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active div:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        /* Menu Items Styling */
        .sticky-header .menu {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sticky-header .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sticky-header .menu .menu-item {
            position: relative;
        }

        .sticky-header .menu .menu-item a {
            text-decoration: none;
            color: #020817;
            font-size: 16px;
            font-weight: 400;
            font-family: 'Quicksand', sans-serif;
            text-transform: capitalize;
            padding: 10px 30px;
            display: block;
        }

        /* Active and hover state styling for menu items */
        .sticky-header .menu .menu-item a:hover,
        .sticky-header .menu .menu-item a.active {
            font-weight: 700;
            color: #24577B;
            background-color: #f0f0f0;
            border-radius: 4px;
        }

        /* Submenu Styling */
        .sticky-header .menu .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            border: 1px solid #eaeaea;
            border-radius: 4px;
            padding: 10px 0;
            width: 350px;
        }

        .sticky-header .menu .submenu li {
            padding: 5px 20px;
        }

        .sticky-header .menu .submenu li a {
            font-size: 14px;
            color: #666;
            padding: 10px 10px;
        }

        .sticky-header .menu .submenu li a:hover {
            color: #24577B;
        }

        .sticky-header .menu .menu-item:hover .submenu {
            display: block;
        }
        .header-spacer {
            /padding-bottom:50px;/
    }

        /* Responsive Styling for Mobile View */
        @media (max-width: 768px) {
            .sticky-header {
                display: none !important;
            }

            .hamburger {
                display: flex;
            }

            .menu ul {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 0;
                background-color: white;
                width: 100%;
                text-align: left;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .menu ul.active {
                display: flex;
            }

            .menu .menu-item {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sticky Header -->
    <div class="sticky-header" id="stickyHeader">
        <nav class="menu">
            <ul id="menuList">
                <!-- Existing Menu Items -->
                <li class="menu-item">
                    <a href="https://climatedot.testlatentdomain.com/energy/" 
                       class="<?php echo (
                            strpos($currentUrl, '/energy/') !== false || 
                            strpos($currentUrl, '/energy/fuel-combustion-activities/') !== false || 
                            strpos($currentUrl, '/energy/fugitive-missions-from-fuel.php') !== false
                        ) ? 'active' : ''; ?>">
                        Energy 
                        <span class="dropdown-icon">
                            <img src="https://climatedot.testlatentdomain.com/images/black-dropdown.svg" alt="icon" style="margin-left: 10px; width: 12px; height: 12px;">
                        </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="https://climatedot.testlatentdomain.com/energy/fuel-combustion-activities/">Fuel Combustion Activities</a></li>
                        <li><a href="https://climatedot.testlatentdomain.com/energy/fugitive-missions-from-fuel.php">Fugitive Emissions from Fuel</a></li>
                    </ul>
                </li>
                <!-- New Menu Items -->
                <li class="menu-item">
                    <a href="https://climatedot.testlatentdomain.com/ippu.php" 
                       class="<?php echo (strpos($currentUrl, '/ippu.php') !== false) ? 'active' : ''; ?>">
                       IPPU</a>
                </li>
                <li class="menu-item">
                    <a href="https://climatedot.testlatentdomain.com/afolu/" 
                       class="<?php echo (
                            strpos($currentUrl, '/afolu/') !== false || 
                            strpos($currentUrl, '/afolu/livestock.php') !== false || 
                            strpos($currentUrl, '/afolu/land.php') !== false || 
                            strpos($currentUrl, '/afolu/aggregate-sources-non-co2-emissions-sources-on-land.php') !== false
                        ) ? 'active' : ''; ?>">
                        AFOLU 
                        <span class="dropdown-icon">
                            <img src="https://climatedot.testlatentdomain.com/images/black-dropdown.svg" 
                                 alt="icon" style="margin-left: 10px; width: 12px; height: 12px;">
                        </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="https://climatedot.testlatentdomain.com/afolu/livestock.php">Livestock</a></li>
                        <li><a href="https://climatedot.testlatentdomain.com/afolu/land.php">Land</a></li>
                        <li><a href="https://climatedot.testlatentdomain.com/afolu/aggregate-sources-non-co2-emissions-sources-on-land.php">Aggregate Sources & Non-CO2 Emissions Sources on Land</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="https://climatedot.testlatentdomain.com/waste.php" 
                       class="<?php echo (strpos($currentUrl, '/waste.php') !== false) ? 'active' : ''; ?>">
                       Waste</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header-spacer" id="headerSpacer"></div>
    <!-- JavaScript for Hamburger Menu and Header Scroll Behavior -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Sticky Header Hide and Show on Scroll
        let lastScrollTop = 0;
        const header = document.getElementById('stickyHeader');
        const headerSpacer = document.getElementById('headerSpacer');

        window.addEventListener('scroll', function () {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                header.style.display = "none"; // Hide the header after the delay
                headerSpacer.style.display = "none"; // Hide the spacer
            } else {
                // User is scrolling up
                header.style.display = "flex"; // Show the header
                
                setTimeout(function() {
                headerSpacer.style.display = "block"; 
            }, 500);
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Prevent negative scroll values
        });
    });
</script>
</body>
</html>