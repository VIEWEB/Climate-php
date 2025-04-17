<?php include 'include/feb-header.php'; ?>


<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Waste</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="/include/climatedot.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <style>
        .page-content-2r-left {
            width: 100%;
            display: flex;
            align-items: center;
            background: #f8f18f8;
            justify-content: center;
            padding-left: 0;
            text-align: center;
        }
        .key-highlight-content::after, .key-highlight-content::before{
            display: none;
        }
       
  </style>
</head>
<body>
    <div class="banner">
        <div class="responsive">
            <div>
                <h1>Waste</h1>
                <p>GHG emissions from all  types of waste generation, composition and management.</p>
            </div>
            <div class="level">
                <div class="lev-home">
                    <a class="gret-symbol" href="/ipcc-categories">
                        <img src="/images/level-tree.svg">
                        <span>Home</span>
                    </a>
                </div>
                <div class="lev-home">
                    <h6 class="level-text" style="background-color:#F1C232">L1</h6>
                    <span>Waste</span>
                </div>
                <div class="lev-home">
                    <h6 class="level-text" style="background-color:#F8F8F8">L2</h6>
                </div>
                <div class="lev-home">
                    <h6 class="level-text" style="background-color:#F8F8F8">L3</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-bar-wrapper responsive">
        
        <div class="menu-item-container">
            <a href="#" class="menu-item arrow">
                Sub Sectors
            </a>
            <a href="#" class="menu-item unclickable">
                Solid Waste Disposal
            </a>
            <a href="#" class="menu-item unclickable">
                Biological Treatment of Solid Waste
            </a>
            <a href="#" class="menu-item unclickable">
                Incineration & Open Burning
            </a>
            <a href="#" class="menu-item unclickable">
                Wastewater Treatment & Discharge
            </a>
            <a href="#" class="menu-item unclickable">
                Other
            </a>
        </div>
    </div>
    
    <div class="page-content responsive">
        <div class="page-content-1r">
            <div class="page-content-1r-left">
                <div class="page-content-1fr-left-1">
                    <div class="data-cov">
                        <h2>Sectoral Data Coverage</h2>
                        <div class="quality-perc">
                            <img src="/images/poor-ic.svg" width="44" height="44"><h3>0%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Solid Waste Disposal">4A</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Biological Treatment of Solid Waste">4B</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Incineration & Open Burning">4C</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Wastewater Treatment & Discharge">4D</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Other">4E</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <!--<h2>Data Sources</h2>-->
                    <!--<div class="data-sources-img">-->
                        
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="page-content-2r">
            <div class="page-content-2r-left">
                <div class="graph-drowpdown">
                    <h2>Sectoral data unavailable. <a href="https://climatedot.org/blog/waste-climate-dashboard">Click here</a> to read more on key sectoral contributors.</h2>
                    <div class="toggle-buttons">
                        <!--<label>-->
                        <!--    <input type="radio" name="gwp" value="GWP20" checked>-->
                        <!--    <span>GWP 20</span>-->
                        <!--</label>-->
                        <!--<label>-->
                        <!--    <input type="radio" name="gwp" value="GWP100">-->
                        <!--    <span>GWP 100</span>-->
                        <!--</label>-->
                    </div>
                </div>
                
                <div style="height:227px;" class="image-container">
                    <!--<img src="/images/graph-1.png" id="imgGWP20" class="active" height="227">-->
                    <!--<img src="/images/graph-2.png" id="imgGWP100" height="227">-->
                </div>
                
            </div>
        </div>
    </div>
    <div style="padding-top:0;padding-bottom:10px;" class="page-content-bottom responsive">
        <div class="page-content-1r-bottom">
            <h2>Overview</h2>
                <p>The waste sector in Gujarat, while not a major contributor to overall emissions, remains an important sector in terms of greenhouse gas mitigation. Rapid urbanization and rising per capita waste generation pose effective waste management challenges. While efforts in recycling, composting, and waste segregation are underway, a large portion of waste still ends up in landfills, exacerbating methane emissions.</p>
                <p>Despite its significance, comprehensive data on emissions from waste management is largely unavailable, hindering accurate assessment of its full impact.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p class="read-more-para">Due to the lack of comprehensive data, specific emissions figures for the waste sector in Gujarat are not available, but the sector remains a key focus for greenhouse gas mitigation.<a href="https://climatedot.org/blog/waste-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
                </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get radio buttons and images
            const radioButtons = document.querySelectorAll('input[name="gwp"]');
            const imgGWP20 = document.getElementById("imgGWP20");
            const imgGWP100 = document.getElementById("imgGWP100");
        
            // Add event listeners to radio buttons
            radioButtons.forEach(radio => {
                radio.addEventListener("change", function () {
                    if (this.value === "GWP20") {
                        imgGWP20.classList.add("active");
                        imgGWP100.classList.remove("active");
                    } else if (this.value === "GWP100") {
                        imgGWP100.classList.add("active");
                        imgGWP20.classList.remove("active");
                    }
                });
            });
        });
    </script>
</body>
</html>