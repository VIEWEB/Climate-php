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
    $range = '3B Land!A2:S';

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
  <title>Land</title>
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
                <h1>Land</h1>
                <p>Emissions due to Land Use & Land Use Change.</p>
            </div>
            <div class="level">
                <div class="lev-home">
                    <a class="gret-symbol" href="/ipcc-categories">
                        <img src="/images/level-tree.svg">
                        <span>Home</span>
                    </a>
                </div>
                <div class="lev-home">
                    <a class="gret-symbol" href="/agriculture-forestry-other-land-use">
                        <h6 class="level-text" style="background-color:#F8F8F8">L1</h6>
                        <span>AFOLU</span>
                    </a>
                </div>
                <div class="lev-home">
                    <h6 class="level-text" style="background-color:#F1C232">L2</h6>
                    <span>Land</span>
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
                Forest Land
            </a>
            <a href="#" class="menu-item unclickable">
                Cropland
            </a>
            <a href="#" class="menu-item unclickable">
                Grassland
            </a>
            <a href="#" class="menu-item unclickable">
                Wetland
            </a>
            <a href="#" class="menu-item unclickable">
                Settlements
            </a>
            <a href="#" class="menu-item unclickable">
                Other Land
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
                            <img src="/images/mod-ic.svg" width="44" height="44"><h3>50%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Forest Land">3B1</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Cropland">3B2</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Grassland">3B3</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Wetland">3B4</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Settlements">3B5</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Other Land">3B6</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/fedg.webp" title="Forests & Environment Department">
                        </div>
                        <div class="source-img">
                            <img src="/images/isro.webp" title="Indian Space Research Organisation">
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
                                <h2>Emissions | LULUCF</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp1" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp1" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="landLineChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Forest Land</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp2" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp2" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="forestLandLineChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Cropland</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp3" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp3" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="croplandLineChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Wetlands</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp4" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp4" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="wetlandsLineChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Settlements</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp5" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp5" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="settlementsLineChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Other Land</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp6" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp6" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="otherLandLineChart"></canvas>
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
                <p>The land sector plays a key role in shaping Gujarat's emissions landscape. Covering 196,024 sq. km, the state has 10% forest cover, which plays a crucial role in carbon sequestration, while cropland and settlements contribute to greenhouse gas emissions. Cropland is vital for Gujarat's economy but also presents challenges for managing emissions. Sustainable land management is essential to reducing overall emissions from the land sector. While data is available for land that remains under the same land usage, information on land that has been converted to other land types is lacking.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p>Data for Forest Land, Cropland, Wetlands, Settlements, and Other Land has been sourced from, Gujarat Forest Statistics & ISRO's Bhuvan platform. Forest land & Other Land consistently show negative emissions, indicating net CO₂ sequestration throughout 2012–2024.</p>
                    <p class="read-more-para">Cropland emissions exhibit significant volatility, with notable peaking and occasional negative values pointing to variations in agricultural activity, land use patterns or crop types. Settlements emissions stayed near zero until 2016, then sharply increased by 2022, signifying rise in urbanisation or infrastructure activities during this period.<a href="https://climatedot.org/blog/afolu-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>

                </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
                let yearsSet = new Set(); // Store unique years
        
                // **Step 1: प्रत्येक उप-टाइप साठी डेटा जमा करा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Land)
                    let subCategory = row[3]; // Column D (Sub Type)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Land") return; // **Filter Only Land Data**
                    if (year === 0) return; // Ignore invalid years
        
                    yearsSet.add(year); // Store unique years
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    // if (valueToUse < 0) return; // **Negative Values Ignore करा**
        
                    if (!categoryData[subCategory]) {
                        categoryData[subCategory] = {};
                    }
                    if (!categoryData[subCategory][year]) {
                        categoryData[subCategory][year] = 0;
                    }
        
                    categoryData[subCategory][year] += valueToUse;
                });
        
                console.log("📊 Year-wise Total Values:", categoryData);
        
                let allYears = Array.from(yearsSet).sort();
                return { categoryData, allYears };
            }
        
            function updateChart() {
                let { categoryData, allYears } = generateChartData(currentGWP);
                let datasets = [];
        
                Object.keys(categoryData).forEach((subCategory, index) => {
                    let dataPoints = allYears.map(year => categoryData[subCategory][year] || 0);
                    datasets.push({
                        label: subCategory,
                        data: dataPoints,
                        borderColor: getRandomColor(index),
                        backgroundColor: getRandomColor(index),
                        fill: false,
                        tension: 0.2
                    });
                });
        
                let ctx = document.getElementById("landLineChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: allYears,
                        datasets: datasets
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
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // Proper Formatting
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
                                        let subCategory = tooltipItem.dataset.label;
                                        let totalValue = categoryData[subCategory][year] || 0;
                                        return `Year: ${year}, ${subCategory}: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "right",
                                labels: {
                                    font: { size: 14 },
                                    color: "#000000"
                                }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            function getRandomColor(index) {
                let colors = ["#9B2226", "#0A9396", "#EE9B00", "#CA6702", "#BB3E03"];
                return colors[index % colors.length];
            }
        
            // **Radio Button Click केल्यावर चार्ट Update करणे**
            document.querySelectorAll("input[name='gwp1']").forEach(radio => {
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
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
                let yearsSet = new Set(); // Store unique years
        
                // **Step 1: फक्त "Forest Land" साठी डेटा जमा करा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Land)
                    let subCategory = row[3]; // Column D (Sub Type)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Land") return; // **Filter Only Land Data**
                    if (subCategory !== "Forest Land") return; // **फक्त "Forest Land" डेटा घ्या**
                    if (year === 0) return; // Ignore invalid years
        
                    yearsSet.add(year); // Store unique years
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    // if (valueToUse < 0) return; // **Negative Values Ignore करा**
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
        
                    categoryData[year] += valueToUse;
                });
        
                console.log("📊 Year-wise Total Values for Forest Land:", categoryData);
        
                let allYears = Array.from(yearsSet).sort();
                return { categoryData, allYears };
            }
        
            function updateChart() {
                let { categoryData, allYears } = generateChartData(currentGWP);
                let dataPoints = allYears.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("forestLandLineChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: allYears,
                        datasets: [{
                            label: "Forest Land",
                            data: dataPoints,
                            borderColor: "#0A9396",
                            backgroundColor: "#0A9396",
                            fill: false,
                            tension: 0.2
                        }]
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
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // Proper Formatting
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
                                        return `Year: ${year}, Forest Land: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "right",
                                labels: {
                                    font: { size: 14 },
                                    color: "#000000"
                                }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            // **Radio Button Click केल्यावर चार्ट Update करणे**
            document.querySelectorAll("input[name='gwp2']").forEach(radio => {
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
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
                let yearsSet = new Set(); // Store unique years
        
                // **Step 1: फक्त "Cropland" साठी डेटा जमा करा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Land)
                    let subCategory = row[3]; // Column D (Sub Type)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Land") return; // **Filter Only Land Data**
                    if (subCategory !== "Cropland") return; // **फक्त "Cropland" डेटा घ्या**
                    if (year === 0) return; // Ignore invalid years
        
                    yearsSet.add(year); // Store unique years
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    // if (valueToUse < 0) return; // **Negative Values Ignore करा**
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
        
                    categoryData[year] += valueToUse;
                });
        
                console.log("📊 Year-wise Total Values for Cropland:", categoryData);
        
                let allYears = Array.from(yearsSet).sort();
                return { categoryData, allYears };
            }
        
            function updateChart() {
                let { categoryData, allYears } = generateChartData(currentGWP);
                let dataPoints = allYears.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("croplandLineChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: allYears,
                        datasets: [{
                            label: "Cropland",
                            data: dataPoints,
                            borderColor: "#EE9B00",
                            backgroundColor: "#EE9B00",
                            fill: false,
                            tension: 0.2
                        }]
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
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // Proper Formatting
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
                                        return `Year: ${year}, Cropland: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "right",
                                labels: {
                                    font: { size: 14 },
                                    color: "#000000"
                                }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            // **Radio Button Click केल्यावर चार्ट Update करणे**
            document.querySelectorAll("input[name='gwp3']").forEach(radio => {
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
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
                let yearsSet = new Set(); // Store unique years
        
                // **Step 1: फक्त "Wetlands" साठी डेटा जमा करा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Land)
                    let subCategory = row[3]; // Column D (Sub Type)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Land") return; // **Filter Only Land Data**
                    if (subCategory !== "Wetlands") return; // **फक्त "Wetlands" डेटा घ्या**
                    if (year === 0) return; // Ignore invalid years
        
                    yearsSet.add(year); // Store unique years
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    // if (valueToUse < 0) return; // **Negative Values Ignore करा**
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
        
                    categoryData[year] += valueToUse;
                });
        
                console.log("📊 Year-wise Total Values for Wetlands:", categoryData);
        
                let allYears = Array.from(yearsSet).sort();
                return { categoryData, allYears };
            }
        
            function updateChart() {
                let { categoryData, allYears } = generateChartData(currentGWP);
                let dataPoints = allYears.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("wetlandsLineChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: allYears,
                        datasets: [{
                            label: "Wetlands",
                            data: dataPoints,
                            borderColor: "#005F73",
                            backgroundColor: "#005F73",
                            fill: false,
                            tension: 0.2
                        }]
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
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // Proper Formatting
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
                                        return `Year: ${year}, Wetlands: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "right",
                                labels: {
                                    font: { size: 14 },
                                    color: "#000000"
                                }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            // **Radio Button Click केल्यावर चार्ट Update करणे**
            document.querySelectorAll("input[name='gwp4']").forEach(radio => {
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
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
                let yearsSet = new Set(); // Store unique years
        
                // **Step 1: फक्त "Settlements" साठी डेटा जमा करा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Land)
                    let subCategory = row[3]; // Column D (Sub Type)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Land") return; // **Filter Only Land Data**
                    if (subCategory !== "Settlements") return; // **फक्त "Settlements" डेटा घ्या**
                    if (year === 0) return; // Ignore invalid years
        
                    yearsSet.add(year); // Store unique years
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    // **Negative Values Ignore करण्यासाठी हि लाइन कमेंट केली आहे.**
                    // if (valueToUse < 0) return; 
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
        
                    categoryData[year] += valueToUse;
                });
        
                console.log("📊 Year-wise Total Values for Settlements:", categoryData);
        
                let allYears = Array.from(yearsSet).sort();
                return { categoryData, allYears };
            }
        
            function updateChart() {
                let { categoryData, allYears } = generateChartData(currentGWP);
                let dataPoints = allYears.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("settlementsLineChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: allYears,
                        datasets: [{
                            label: "Settlements",
                            data: dataPoints,
                            borderColor: "#D62828",
                            backgroundColor: "#D62828",
                            fill: false,
                            tension: 0.2
                        }]
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
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // Proper Formatting
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
                                        return `Year: ${year}, Settlements: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "right",
                                labels: {
                                    font: { size: 14 },
                                    color: "#000000"
                                }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            // **Radio Button Click केल्यावर चार्ट Update करणे**
            document.querySelectorAll("input[name='gwp5']").forEach(radio => {
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
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
        
            function generateChartData(gwpType) {
                let categoryData = {};
                let yearsSet = new Set(); // Store unique years
        
                // **Step 1: फक्त "Other Land" साठी डेटा जमा करा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Land)
                    let subCategory = row[3]; // Column D (Sub Type)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Land") return; // **Filter Only Land Data**
                    if (subCategory !== "Other Land") return; // **फक्त "Other Land" डेटा घ्या**
                    if (year === 0) return; // Ignore invalid years
        
                    yearsSet.add(year); // Store unique years
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    // **Negative Values Ignore करण्यासाठी हि लाइन कमेंट केली आहे.**
                    // if (valueToUse < 0) return; 
        
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
        
                    categoryData[year] += valueToUse;
                });
        
                console.log("📊 Year-wise Total Values for Other Land:", categoryData);
        
                let allYears = Array.from(yearsSet).sort();
                return { categoryData, allYears };
            }
        
            function updateChart() {
                let { categoryData, allYears } = generateChartData(currentGWP);
                let dataPoints = allYears.map(year => categoryData[year] || 0);
        
                let ctx = document.getElementById("otherLandLineChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: allYears,
                        datasets: [{
                            label: "Other Land",
                            data: dataPoints,
                            borderColor: "#5A189A",
                            backgroundColor: "#5A189A",
                            fill: false,
                            tension: 0.2
                        }]
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
                                    stepSize: 5000000,
                                    callback: function(value) {
                                        return value.toLocaleString(); // Proper Formatting
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
                                        return `Year: ${year}, Other Land: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "right",
                                labels: {
                                    font: { size: 14 },
                                    color: "#000000"
                                }
                            }
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
            }
        
            // **Radio Button Click केल्यावर चार्ट Update करणे**
            document.querySelectorAll("input[name='gwp6']").forEach(radio => {
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