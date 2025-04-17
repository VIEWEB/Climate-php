<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="/include/global.js"></script>
   <style>
        body{
            padding:0;
            margin: 0;
        }
        /*.wrapper.responsive {*/
        /*    display: none;*/
        /*}*/
       .wrapper{
           display: flex;
           background-color: #ffffff;
           align-items: center;
       }
       .header-logo {
           width:50%;
       }
       .header-logo span {
            font-family: 'Quicksand', sans-serif;
            font-weight: 600;
            font-size: 22px;
            color: #245e7b;
            display: none;
       }
       .header-logo a{
           text-decoration: none;
           display: flex;
           gap: 10px;
           align-items: center;
       }
       .menu-bar{
           width:50%;
           display: flex;
           justify-content: end;
           gap: 25px;
       }
       .menu-bar a{
           display: flex;
           justify-content: center;
           padding: 5px;
           border: 1px solid #F1C232;
            border-radius: 28px;
            background-color: white;
       }
       .menu-bar a.active {
            background-color: #F1C232;
        }
       
        #tooltip-close-btn {
            position: fixed;
            top: 15px;
            right: 20px;
            background-color: #24577B;
            color: white !important;
            font-family: 'Quicksand', sans-serif;
            font-size: 18px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden !important;
            z-index: 10000; /* Ensure Highest Layer */
            pointer-events: none; /* Prevent Click When Hidden */
        }
        
        
        .show-tooltip#tooltip-close-btn {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto; /* Enable Click */
        }

     
        #tooltip-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: white;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 9998;
        }
        
        .show-tooltip#tooltip-overlay {
            opacity: 0.4 !important;
            visibility: visible !important;
        }
        @media (min-width: 1024px) and (max-width: 1299px) {
            .header-logo img {
                width: 30px;
                height: 30px;
            }
            .responsive {
                width: 1000px;
                padding: 0px 8px;
                margin: auto;
            }
            .menu-bar img{
                width: 15px;
                height: 15px;
            }
        }
        @media (min-width: 1300px) and (max-width: 1366px) {
            .responsive {
                width: 1200px;
                padding: 5px 8px;
                margin: auto;
            }
            .header-logo img {
                width: 36px;
                height: 36px;
            }
            .menu-bar img{
                width: 18px;
                height: 18px;
            }
        }
         @media (min-width: 1367px) and (max-width: 1600px) {
            .responsive {
                width: 1300px;
                padding: 5px 8px;
                margin: auto;
            }
            .header-logo img {
                width: 36px;
                height: 36px;
            }
            .menu-bar img{
                width: 26px;
                height: 26px;
            }
        }
        @media (min-width: 1601px) and (max-width: 1920px) {
            .responsive {
                width: 1500px;
                padding: 5px 8px;
                margin: auto;
            }
            .header-logo img {
                width: 45px;
                height: 45px;
            }
            .menu-bar img{
                width: 30px;
                height: 30px;
            }
            
        }
        @media (min-width: 1921px) and (max-width: 2049px) {
            .responsive {
                width: 1800px;
                padding: 5px 8px;
                margin: auto;
            }
            .header-logo img {
                width: 50px;
                height: 50px;
            }
            .menu-bar img{
                width: 30px;
                height: 30px;
            }
        }
        @media (min-width: 2550px){
            .responsive {
                width: 2200px;
                padding: 5px 8px;
                margin: auto;
            }
            .header-logo img {
                width: 50px;
                height: 50px;
            }
            .menu-bar img{
                width: 30px;
                height: 30px;
            }
        }
        @media (max-width:767px){
            .header-logo span{
                font-size: 16px;
            }
            .header-logo img{
                width: 30px;
                height: 30px;
            }
            .menu-bar img{
                width: 20px;
                height: 20px;
            }
            .menu-bar{
                padding-right: 0;
            }
            .responsive{
                padding-left:10px;
                padding-right: 10px;
            }
            .wrapper.responsive{
                padding:5px 10px;
            }
            .banner .responsive{
                padding:0;
            }
        }
       
   </style> 
</head>
<body>
    <!--<div id="tooltip-close-btn">✖ Close</div>-->
    <div id="tooltip-close-btn">✖ Close</div>
    <div class="wrapper responsive">
        <div class="header-logo">
            <a href="/">
            <img src="/images/logo.webp" alt="logo">
            <span>Climate Dot</span>
        </a>
        </div>
        <div class="menu-bar">
                <!--<a href="/" title="Home"><img src="/images/home-icon.svg" alt="home"></a>-->
                <!--<a href="#" id="toggle-btn" title="How to use this dashboard?"><img src="/images/que-icon.svg" alt="home"></a>-->
                <!--<a href="/ipcc-categories" title="Emission Category Navigation Tree"><img src="/images/tree-icon.svg" alt="home"></a>-->
                <a href="/" title="Home" id="home-link"><img src="/images/side-arrow-1.svg" alt="home"></a>
                <a href="#" id="toggle-btn" title="How to use this dashboard?"><img src="/images/side-arrow-2.svg" alt="home"></a>
                <a href="/ipcc-categories" title="Emission Category Navigation Tree" id="categories-link">
                    <img src="/images/side-arrow-3.svg" alt="home">
                </a>
        </div>
    </div>
    <script>
        //   document.getElementById('tooltip-close-btn').addEventListener('click', function() {
        //     window.history.back();
        //   });
        document.addEventListener("DOMContentLoaded", function () {
    // Get current page URL path
    let currentPath = window.location.pathname;

    // Select menu links
    let homeLink = document.getElementById("home-link");
    let categoriesLink = document.getElementById("categories-link");
    let toggleBtn = document.getElementById("toggle-btn");

    // Function to remove all active classes
    function removeActiveClass() {
        homeLink.classList.remove("active");
        categoriesLink.classList.remove("active");
        toggleBtn.classList.remove("active");
    }

    // Set Active Class Based on URL
    if (currentPath === "/") {
        removeActiveClass();
        homeLink.classList.add("active");
    } else if (currentPath === "/ipcc-categories") {
        removeActiveClass();
        categoriesLink.classList.add("active");
    }

    // Handle toggle button click (Toggle Active Class)
    toggleBtn.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent page reload
        event.stopPropagation(); // Stop event bubbling (so document click doesn't fire immediately)
        
        // Toggle class only on the button itself
        if (!toggleBtn.classList.contains("active")) {
            removeActiveClass();
            toggleBtn.classList.add("active");
        }
    });

    // Remove active class when clicking outside the menu
    document.addEventListener("click", function (event) {
        // Check if clicked outside the toggle button
        if (!toggleBtn.contains(event.target)) {
            toggleBtn.classList.remove("active");
        }
    });
});


    </script>
 
</body>
</html>