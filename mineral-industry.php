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
    $range = '2A Mineral Industry!A2:S';

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
  <title>Mineral Industry</title>
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
                <h1>Mineral Industry</h1>
                <p>Emissions from production processes in mineral industry.</p>
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
                    <span title="Mineral Industry">Mineral Industry</span>
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
                Cement Production
            </a>
            <a href="#" class="menu-item unclickable">
                Lime Production
            </a>
            <a href="#" class="menu-item unclickable">
                Glass Production
            </a>
            <a href="#" class="menu-item unclickable">
                Other Uses of Carbonates
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
                            <img src="/images/mod-ic.svg" width="44" height="44"><h3>40%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Cement production">2A1</span>
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Lime production">2A2</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Glass production">2A3</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Other Uses of Carbonate">2A4</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Others">2A5</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/ibom.webp" title="Indian Bureau of Mines">
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
                                <h2>Emissions | Cement Production</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwpCement" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwpCement" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="cementProductionChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Lime Production</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwpLime" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwpLime" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="limeProductionChart"></canvas>
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
                <p>The mineral industry is one of the highest emitter within the IPPU sector, and includes emissions from the production of cement, lime, glass, ceramics, and similar materials.</p>
                <p>Gujarat, in particular, is a major hub for the ceramics production with significant activity concentrated around Morbi. However, state-level aggregated data is available through the Indian Mineral Book only for cement and lime production.</p>
                <p>The lack of data on these activities hampers the creation of an accurate emissions inventory.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p>Emissions from cement production show an increasing trend, except for 2019, with values ranging from 41,594 to 74,185 Gigagram of CO₂e emissions. Major cement producers in Gujarat include Ambuja Cement and ACC Cement.</p>
                    <p>In contrast, emissions from lime production fluctuate between 14 and 19 Gigagram of CO₂e emissions, with key producers such as UltraTech, Ambuja Cement, and Jaiprakash Associates.</p>
                    <p class="read-more-para">The rise in cement production can be attributed to Gujarat’s mining policy, which supported the establishment of new cement companies and encouraged mineral-oriented industries, including limestone-based cement plants.<a href="https://climatedot.org/blog/ippu-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
                </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>; // **New Sheet Data**
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {}; // Store year-wise data
        
                if (!jsonData || !Array.isArray(jsonData)) {
                    console.error("🚨 jsonData is not properly loaded!", jsonData);
                    return categoryData;
                }
        
                // ✅ Process Data
                jsonData.forEach(row => {
                    let category = row[4] ? row[4].trim() : ""; // **Column E → Category**
                    let year = row[6] ? parseInt(row[6]) : 0; // **Column G → Year**
                    if (category !== "Cement Production") return; // **फक्त "Cement Production" घेणार**
        
                    let valueGWP20 = row[11] ? parseFloat(row[11].toString().replace(/,/g, "")) || 0 : 0; // **Column L**
                    let valueGWP100 = row[12] ? parseFloat(row[12].toString().replace(/,/g, "")) || 0 : 0; // **Column M**
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (!year) return;
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
                    categoryData[year] += valueToUse; // **Summing Values**
                });
        
                console.log("📊 Cement Production Data:", categoryData);
                return categoryData;
            }
        
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let years = [...new Set(jsonData.map(row => parseInt(row[6]) || 0))].filter(y => y).sort();
                let values = years.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("cementProductionChart");
                if (!ctx) {
                    console.error("🚨 Canvas with ID 'cementProductionChart' not found!");
                    return;
                }
                ctx = ctx.getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy();
                }
        
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [
                            {
                                label: "Cement Production",
                                data: values,
                                backgroundColor: "#9B2226", // **Red**
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                ticks: { font: { size: 12 }, color: "#000" },
                                title: { display: true, text: "Year", font: { size: 14 }, color: "#000" }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    font: { size: 12 }, 
                                    color: "#000", 
                                    weight: 900,
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // **Proper Formatting**
                                    }
                                },
                                title: { display: true, text: "CO₂e Emissions", font: { size: 14 }, color: "#000" }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let year = tooltipItem.label;
                                        let totalValue = categoryData[year] || 0;
                                        return `Year: ${year}, Cement Production: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "top",
                                labels: { font: { size: 14 }, color: "#000000" }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            let radioButtons = document.querySelectorAll("input[name='gwpCement']");
            if (radioButtons.length > 0) {
                radioButtons.forEach(radio => {
                    radio.addEventListener("change", function () {
                        currentGWP = this.value;
                        updateChart();
                    });
                });
            } else {
                console.error("🚨 Radio Buttons with name 'gwpCement' not found!");
            }
        
            updateChart();
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>; // **New Sheet Data**
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {}; // Store year-wise data
        
                if (!jsonData || !Array.isArray(jsonData)) {
                    console.error("🚨 jsonData is not properly loaded!", jsonData);
                    return categoryData;
                }
        
                // ✅ Process Data
                jsonData.forEach(row => {
                    let category = row[4] ? row[4].trim() : ""; // **Column E → Category**
                    let year = row[6] ? parseInt(row[6]) : 0; // **Column G → Year**
                    if (category !== "Lime Production") return; // **फक्त "Lime Production" घेणार**
        
                    let valueGWP20 = row[11] ? parseFloat(row[11].toString().replace(/,/g, "")) || 0 : 0; // **Column L**
                    let valueGWP100 = row[12] ? parseFloat(row[12].toString().replace(/,/g, "")) || 0 : 0; // **Column M**
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (!year) return;
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
                    categoryData[year] += valueToUse; // **Summing Values**
                });
        
                console.log("📊 Lime Production Data:", categoryData);
                return categoryData;
            }
        
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let years = [...new Set(jsonData.map(row => parseInt(row[6]) || 0))].filter(y => y).sort();
                let values = years.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("limeProductionChart");
                if (!ctx) {
                    console.error("🚨 Canvas with ID 'limeProductionChart' not found!");
                    return;
                }
                ctx = ctx.getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy();
                }
        
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [
                            {
                                label: "Lime Production",
                                data: values,
                                backgroundColor: "#0A9396", // **Teal**
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                ticks: { font: { size: 12 }, color: "#000" },
                                title: { display: true, text: "Year", font: { size: 14 }, color: "#000" }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    font: { size: 12 }, 
                                    color: "#000", 
                                    weight: 900,
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // **Proper Formatting**
                                    }
                                },
                                title: { display: true, text: "CO₂e Emissions", font: { size: 14 }, color: "#000" }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let year = tooltipItem.label;
                                        let totalValue = categoryData[year] || 0;
                                        return `Year: ${year}, Lime Production: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "top",
                                labels: { font: { size: 14 }, color: "#000000" }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            let radioButtons = document.querySelectorAll("input[name='gwpLime']");
            if (radioButtons.length > 0) {
                radioButtons.forEach(radio => {
                    radio.addEventListener("change", function () {
                        currentGWP = this.value;
                        updateChart();
                    });
                });
            } else {
                console.error("🚨 Radio Buttons with name 'gwpLime' not found!");
            }
        
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