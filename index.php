<?php include 'include/feb-header.php'; ?>
<?php include 'include/triangle.php'; ?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <style>
        #toggle-btn{
            display: none;
        }
        body{
            margin: 0;
            padding: 0;
        }
        .header-logo span{
            display: block;
        }
        h1{
            font-size: 42px;
            font-weight: 600;
            font-family: 'Quicksand', sans-serif;
            text-align: center;
            color: #ffffff;
            line-height: 35px;
            margin:0;
        }
        h2{
            font-size: 24px;
            font-weight: 600;
            font-family: 'Quicksand', sans-serif;
            color: #000000;
        }
        h3{
            font-size: 20px;
            font-weight: 600;
            font-family: 'Quicksand', sans-serif;
            color: #000000;
        }
        h4{
            font-size: 40px;
            font-weight: 600;
            font-family: 'Quicksand', sans-serif;
            color:#005F73;
            margin:0;
        }
        h5{
            font-size: 24px;
            font-weight: 600;
            font-family: 'Quicksand', sans-serif;
            color:#000000;
            margin: 0;
        }
        p{
            font-weight: 600;
            color: #434343;
            font-family: 'Quicksand', sans-serif;
            text-align: justify;
        }
        .banner p{
            font-size: 18px;
            font-weight: 600;
            color: #ffffff;
            font-family: 'Quicksand', sans-serif;
            text-align: center;
            margin-top: 0px;
            font-style: italic;
            margin: 0;
        }
        .banner{
            background-color: #24577B;
            align-items: center;
            display: flex;
            gap: 10px;
            flex-direction: column;
            padding:20px;
        }
    
        .first-slide-wrapper{
            display:flex;
            flex-direction: row;
            gap: 100px;
        }
        .intro{
            width:50%;
            background-image: url(/images/gujarat-map.webp);
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }
        .data-c{
            width: 50%;
        }
        .data-c a{
            text-decoration:none;
        }
        .ipcc-cat{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap:20px;
        }
        .ippc-wrap{
            display: flex;
            padding:20px;
            background-color: #F8F8F8;
            border-radius: 17px;
        }
        .ippc-wrap-l{
            width: 40%;
            justify-content: space-between;
            display: flex;
            flex-direction: column;
        }
        .ippc-wrap-r{
            width:60%;
            justify-content: end;
            display: flex;
        }
        .data-quality-cards{
            margin-top: -10px;
            gap: 6px;
            display: flex;
            flex-direction: column;
            padding-right: 20px;
        }
        .data-card img{
            padding-right:10px;
            display: flex;
        }
        .bottom-dots{
            display:flex;
            gap:20px;
            justify-content: center;
            padding-top:10px;
        }
        .bottom-dots .dot{
            width: 16px;
            height: 16px;
            border-radius: 12px;
            background-color:#e6eff1;
        }
        .dot.active {
            background-color: #005F73;
        }
        .description{
    
            margin: 0;
        }
        .data-card{
            display: flex;
            align-items: center;
        }
        @media (min-width: 1025px) and (max-width: 1299px) {
            .responsive {
                width: 1000px;
                padding: 5px 8px;
                margin: auto;
            }
            .first-slide-wrapper {
                width: 1000px;
                padding: 0px 8px;
                margin: auto;
                gap:50px;
            }
                
            h1{
                font-size: 18px;
                line-height: 20px;
            }
            h2{
                font-size: 12px;
                line-height: 30px;
                margin-bottom: 0;
            }
            .description{
                font-size: 10px;
                text-align: left;
                line-height: 16px;
            }
            .data-card-mod, .data-card-poor{
                margin:0 !important;
                align-items: center;
            }
            p{
                font-size: 8px;
                line-height: 14px;
                margin: 0;
            }
            .header-logo img {
                width: 30px;
                height: 30px;
            }
            .menu-bar a {
                font-size: 10px;
            }
        }
        @media (max-width: 1366px) {
      
            .banner{
                padding:10px;
            }
            .first-slide-wrapper{
                width:1200px;
                padding: 5px 8px;
                margin: auto;
                gap:50px;
            }
            .data-quality-cards{
                margin:0;
            }
            .data-card{
                    align-items: center;
            }
            .banner p{
                font-size: 18px;
            }
            .header-logo span{
                font-size: 18px;
            }
            h1{
                font-size:24px;
                line-height: 24px;
            }
            h2{
                font-size: 20px;
            }
            h3{
                font-size: 16px;
            }
            h4{
                font-size: 30px;
            }
            h5{
                font-size:18px;
            }
            p{
                font-size:10px;
                line-height: 20px;
            }
            .menu-bar a{
                font-size:14px;
            }
            .ippc-wrap-r img{
                width:100px;
                height: 100px;
            }
            .description{
                margin:0;
            }
        }
        @media (min-width: 1367px) and (max-width: 1600px) {
            .banner{
                padding:10px;
            }
            .banner p{
                font-size: 16px;
            }
            .first-slide-wrapper{
                width: 1300px;
                padding: 5px 8px;
                margin: auto;
            }
            .header-logo span{
                font-size: 18px;
            }
            h1{
                font-size:26px;
                line-height: 26px;
            }
            h2{
                font-size: 22px;
            }
            h3{
                font-size: 18px;
            }
            h4{
                font-size: 30px;
            }
            h5{
                font-size:20px;
            }
            .description{
                text-align: left;
            }
            p{
                font-size:14px;
                line-height: 20px;
            }
            .menu-bar a{
                font-size:14px;
            }
            .ippc-wrap-r img{
                width:100px;
                height: 100px;
            }
        }

         @media (min-width: 1601px) and (max-width: 1920px){
             
            .first-slide-wrapper{
                width: 1500px;
                padding: 20px 8px 0px;
                margin: auto;
            }
            .banner p{
                font-size: 18px;
                margin: 0;
            }
            .banner{
                background-color: #24577B;
                gap: 10px;
                padding:20px;
            }
          
            h2{
                margin:0;
            }
            h4{
                font-size:35px;
            }
            p{
                line-height: 26px;
            }
            
        }
        /*Standard Desktops & Large Monitors (21" to 24") */
        @media (min-width: 1921px) and (max-width: 2049px) {
            .first-slide-wrapper{
                width: 1800px;
                padding: 5px 8px;
                margin: auto;
            }
            p{
                font-size:18px;
                line-height: 36px;
            }
            h2{
                font-size:26px;
            }
        }
        @media (min-width: 2550px) {
            .responsive {
                width: 2200px;
                padding: 5px 8px;
                margin: auto;
            }
            .first-slide-wrapper{
                width: 2200px;
                padding: 5px 8px;
                margin: auto;
            }
            p{
                font-size:20px;
                line-height: 40px;
            }
            h2{
                font-size:28px;
            }
        }
        
        @media(max-width:767px){
            .responsive{
                width: auto;
            }
            .first-slide-wrapper{
                width: auto;
                display: block;
            }  
            .intro{
                width: 100%;
            }
            .ippc-wrap{
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            .data-c{
                width:100%;
            }
            .ippc-wrap-l{
                width:100%;
            }
            .ippc-wrap-r {
                width: 100%;
                justify-content: center;
                display: flex;
            }
           
        }
        @media (min-width: 768px) and (max-width: 1024px) {
            .responsive{
                width:auto;
            }   
            .banner .responsive{
                width:100%;
            }
            .first-slide-wrapper{
                width:auto;
                display: block;
            }
            .intro {
                width: 100%;
            }
            .data-c{
                width:100%;
            }
        }
  </style>
</head>
<body>
    <div class="banner">
        <h1>Gujarat Climate Dashboard</h1>
        <p>Identifying and Addressing Data Gaps in Gujarat’s Emissions Reporting</p>
    </div>
    <div class="first-slide-wrapper">
        <div class="intro">
            <h2>Introduction</h2>
            <p>The Gujarat Climate Dashboard is a visual, data-driven platform to identify and address gaps in Gujarat’s sectoral emissions data. Although not an emission inventory in the strict sense, it follows the Intergovernmental Panel on Climate Change (IPCC) guidelines for developing a sub-national emissions inventory specific to Gujarat. While the dashboard provides emission data for key sectors where data is available, it does not encompass all sectoral emissions in Gujarat</p>
            <p>The primary objective is to highlight data deficiencies and assess data quality and establish systematic processes to aid government agencies in collecting and reporting data in standardised, machine-readable formats. By highlighting these gaps, the dashboard aims to facilitate the development of a robust and precise emissions inventory, empowering researchers and policymakers to make informed decisions for climate action.</p>
            <div class="data-quality">
                <div class="data-quality-heading">
                    <h3>Data Quality Legend</h3>
                </div>
                <div class="data-quality-cards">
                    <div class="data-card data-card-good">
                        <p><img src="/images/good-ic.svg"><p class="description"><span style="font-weight:900;color:#93C57C">Good</span> : Indicates official activity data is available across time and in granularity</p></p>
                    </div>
                    <div style="margin-top:-20px;" class="data-card data-card-mod">
                        <p><img src="/images/mod-ic.svg"><p class="description"><span style="font-weight:900;color:#E99036">Moderate</span> : Indicates official activity data is un-available & proxies are used</p></p>
                    </div>
                    <div style="margin-top:-20px;" class="data-card data-card-poor">
                        <p><img src="/images/poor-ic.svg"><p class="description"><span style="font-weight:900;color:#E16565">Poor</span> : Indicates official activity data is fully unavailable</p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="data-c">
            <div class="data-c-con">
                <h2>Data Coverage</h2>
                <p>Indicates the extent to good or moderate data availability in each of the four main emission sectors.</p>
            </div>
            <div class="ipcc-cat">
                <div class="ippc-wrap">
                    <div class="ippc-wrap-l">
                        <a href="/energy"><h5>Energy</h5></a>
                        <h4>60%</h4>
                    </div>
                    <div class="ippc-wrap-r">
                        <img src="/images/eng-box.webp">
                    </div>
                </div>
                <div class="ippc-wrap">
                    <div class="ippc-wrap-l">
                        <a href="/industrial-processes-product-use"><h5>IPPU</h5></a>
                        <h4>30%</h4>
                    </div>
                    <div class="ippc-wrap-r">
                        <img src="/images/ip-box.webp">
                    </div>
                </div>
                <div class="ippc-wrap">
                    <div class="ippc-wrap-l">
                        <a href="/agriculture-forestry-other-land-use"><h5>AFOLU</h5></a>
                        <h4>60%</h4>
                    </div>
                    <div class="ippc-wrap-r">
                        <img src="/images/aflou-box.webp">
                    </div>
                </div>
                <div class="ippc-wrap">
                    <div class="ippc-wrap-l">
                        <a href="/waste"><h5>Waste</h5></a>
                        <h4>0%</h4>
                    </div>
                    <div class="ippc-wrap-r">
                        <img src="/images/waste-box.webp">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-dots">
        <a href="/"><div class="dot active"></div></a>
        <a href="/ipcc-categories"><div class="dot"></div></a>
    </div>  
</body>
</html>