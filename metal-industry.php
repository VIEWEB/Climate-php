<?php
    require __DIR__ . '/vendor/autoload.php';

    // Replace with your actual credentials file path
    $credentialsPath = __DIR__ .'/prismatic-voice-433709-c1-08d941c32ae1.json';

    if (!file_exists($credentialsPath)) {
        die('Error: Credentials file not found.');
    }

    putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $credentialsPath);

    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);

    $service = new Google_Service_Sheets($client);

    // Replace with your actual spreadsheet ID
    $spreadsheetId = '135rnqouTAw4iQZeDihHbZxrD9xCmsJhcjjkdN1UBN5s';
    $range = '2C Metal Industry!A2:S';

    try {
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
    } catch (Exception $e) {
        die('Error fetching data: ' . $e->getMessage());
    }

    $jsonData = json_encode($values);
?>
<?php include 'include/feb-header.php'; ?>


<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Metal Industry</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="/include/climatedot.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
   
  </style>
</head>
<body>
    <div class="banner">
        <div class="responsive">
            <div>
                <h1>Metal Industry</h1>
                <p>Emissions from metal production.</p>
            </div>
            <div class="level">
                <div class="lev-home">
                    <a class="gret-symbol" href="/ipcc-categories">
                        <img src="/images/level-tree.svg">
                        <span>Home</span>
                    </a>
                </div>
                <div class="lev-home">
                    <a class="gret-symbol" href="/industrial-processes-product-use">
                        <h6 class="level-text" style="background-color:#F8F8F8">L1</h6>
                        <span>IPPU</span>
                    </a>
                </div>
                <div class="lev-home">
                    <h6 class="level-text" style="background-color:#F1C232">L2</h6>
                    <span title="Metal Industry">Metal Industry</span>
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
                Iron and Steel Production
            </a>
            <a href="#" class="menu-item unclickable">
                Ferroalloys Production
            </a>
            <a href="#" class="menu-item unclickable">
                Aluminium production
            </a>
            <a href="#" class="menu-item unclickable">
                Magnesium production
            </a>
            <a href="#" class="menu-item unclickable">
                Lead Production
            </a>
            <a href="#" class="menu-item unclickable">
                Zinc Production
            </a>
            <a href="#" class="menu-item unclickable">
                Others
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
                            <img src="/images/mod-ic.svg" width="44" height="44"><h3>40%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Iron and Steel Production">2C1</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Ferroalloys Production">2C2</span>
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Aluminium production">2C3</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Magnesium production">2C4</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Lead Production">2C5</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Zinc Production">2C6</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Others">2C7</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/ndap.webp" title="NDAP">
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="page-content-2r">
            <div class="page-content-2r-left">
                <div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Iron and Steel Production</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwpIron" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwpIron" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="ironSteelProductionChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Aluminum production</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwpAluminium" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwpAluminium" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                               <canvas id="aluminiumProductionChart"></canvas>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Navigation -->
                </div>
                </div>
                
            </div>
            
        </div>
    </div>
    <div style="padding-top:0;padding-bottom:10px;" class="page-content-bottom responsive">
        <div class="page-content-1r-bottom">
            <h2>Overview</h2>
                <p>The steel industry significantly contributes to the IPPU sector in Gujarat. It includes emissions from the production of iron and steel, ferroalloys, aluminium, magnesium, lead, and zinc. However, state-level aggregated data is available through the National Data and Analytics Platform only for iron & steel and aluminium production.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p class="read-more-para">Iron and steel production remained steady from 2017 to 2021, while aluminum production declined from 2018 to 2021 after minimal output in 2016 and 2017.<a href="https://climatedot.org/blog/ippu-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
                </div>
        </div>
    </div>


    <script>
       document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let currentGWP = "GWP20"; // Default Selection - GWP20
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
        
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let subCategory = row[3]; // Column D (Sub Category)
                    let year = parseInt(row[5]) || 0; // Column F (Year)
        
                    if (category !== "Metal Industry") return;
                    if (subCategory !== "Iron and Steel production") return;
        
                    let valueGWP20 = row[10] ? parseFloat(row[10].toString().replace(/,/g, "")) || 0 : 0;
                    let valueGWP100 = row[11] ? parseFloat(row[11].toString().replace(/,/g, "")) || 0 : 0;
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (!year) return;
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
                    categoryData[year] += valueToUse;
                });
        
                console.log("📊 Iron and Steel Production Data:", categoryData);
                return categoryData;
            }
        
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let years = [...new Set(jsonData.map(row => parseInt(row[5]) || 0))].filter(y => y).sort();
                let values = years.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("ironSteelProductionChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy();
                }
        
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [
                            {
                                label: "Iron and Steel Production",
                                data: values,
                                backgroundColor: "#BB3E03",
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: { ticks: { font: { size: 12 }, color: "#000" }, title: { display: true, text: "Year", font: { size: 14 }, color: "#000" } },
                            y: {
                                beginAtZero: true,
                                ticks: { font: { size: 12 }, color: "#000", stepSize: 5000000, callback: function(value) { return value.toLocaleString(); } },
                                title: { display: true, text: "CO₂e Emissions", font: { size: 14 }, color: "#000" }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let year = tooltipItem.label;
                                        let totalValue = categoryData[year] || 0;
                                        return `Year: ${year}, Iron and Steel Production: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: { position: "top", labels: { font: { size: 14 }, color: "#000000" } }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            document.querySelectorAll("input[name='gwpIron']").forEach(radio => {
                radio.addEventListener("change", function () {
                    currentGWP = this.value;
                    updateChart();
                });
            });
        
            updateChart();
        });


    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let currentGWP = "GWP20"; // Default Selection - GWP20
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
        
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let subCategory = row[3]; // Column D (Sub Category)
                    let year = parseInt(row[5]) || 0; // Column F (Year)
        
                    if (category !== "Metal Industry") return;
                    if (subCategory !== "Aluminium production") return;
        
                    let valueGWP20 = row[10] ? parseFloat(row[10].toString().replace(/,/g, "")) || 0 : 0;
                    let valueGWP100 = row[11] ? parseFloat(row[11].toString().replace(/,/g, "")) || 0 : 0;
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (!year) return;
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
                    categoryData[year] += valueToUse;
                });
        
                console.log("📊 Aluminium Production Data:", categoryData);
                return categoryData;
            }
        
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let years = [...new Set(jsonData.map(row => parseInt(row[5]) || 0))].filter(y => y).sort();
                let values = years.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("aluminiumProductionChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy();
                }
        
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [
                            {
                                label: "Aluminium Production",
                                data: values,
                                backgroundColor: "#0A9396",
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: { ticks: { font: { size: 12 }, color: "#000" }, title: { display: true, text: "Year", font: { size: 14 }, color: "#000" } },
                            y: {
                                beginAtZero: true,
                                ticks: { font: { size: 12 }, color: "#000", stepSize: 5000000, callback: function(value) { return value.toLocaleString(); } },
                                title: { display: true, text: "CO₂e Emissions", font: { size: 14 }, color: "#000" }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let year = tooltipItem.label;
                                        let totalValue = categoryData[year] || 0;
                                        return `Year: ${year}, Aluminium Production: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: { position: "top", labels: { font: { size: 14 }, color: "#000000" } }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            document.querySelectorAll("input[name='gwpAluminium']").forEach(radio => {
                radio.addEventListener("change", function () {
                    currentGWP = this.value;
                    updateChart();
                });
            });
        
            updateChart();
        });

    </script>
    <script>
    // Swiper initialization
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: false // **REMOVE semicolon** (✅ Correct)
        });
    </script>
</body>
</html>