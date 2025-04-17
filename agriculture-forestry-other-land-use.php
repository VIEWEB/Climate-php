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
    $range = '3 AFOLU!A2:S';

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
  <title>Agriculture Forestry other land use</title>
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
                <h1>Agriculture, Forestry & Other Land Use</h1>
                <p>Emissions from agricultural and land use activities.</p>
            </div>
            <div class="level">
                <div class="lev-home">
                    <a class="gret-symbol" href="/ipcc-categories">
                        <img src="/images/level-tree.svg">
                        <span>Home</span>
                    </a>
                </div>
                <div class="lev-home">
                        <h6 style="background-color:#F1C232">L1</h6>
                        <span>AFOLU</span>
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
            <a href="/livestock" class="menu-item">
                Livestock
            </a>
            <a href="/land" class="menu-item">
                Land
            </a>
            <a href="/aggregate-non-co-2-sources" class="menu-item">
                Aggregate & Non-CO₂ Source
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
                            <img src="/images/poor-ic.svg" width="44" height="44"><h3>60%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Qulity</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Livestock">3A</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Land">3B</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Aggregate & Non-CO2 Sources">3C</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Other">3C</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/dept-animal.svg" title="Department of Animal Husbandry">
                        </div>
                        <div class="source-img">
                            <img src="/images/for-dept.svg" title="Forest and Environment Department, Government of Gujarat">
                        </div>
                        <div class="source-img">
                            <img src="/images/isro.svg" title="Indian Space Research Organisation">
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
                                <h2>Emissions | Sectoral</h2>
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
                                <canvas id="categoryBarChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Sectoral break-up</h2>
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
                               <canvas id="sectoralPieChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | AFOLU sector</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp3" value="GWP20" checked> GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp3" value="GWP100"> GWP 100
                                    </label>
                                </div>
                            </div>
                            <div class="chart-container">
                               <canvas id="categoryLineChart"></canvas>
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
            <p>The AFOLU sector forms a vital part of the emissions profile of Gujarat with a thriving dairy industry and a robust agricultural sector. It also leads in the production of cotton, groundnut and castor production. Forests and wetlands like mangroves, though small, play a key role in carbon sequestration acting as carbon sinks.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p>Carbon removal efforts have reduced emissions by 25 million tonnes CO₂e/year, bringing the net emissions to 75 million tonnes CO₂e/year.</p>
                    <p>Livestock is the largest contributor to emissions within the AFOLU sector, accounting for 65.4% of the total emissions.</p>
                    <p class="read-more-para">The negative value (-20 million tonnes CO₂e/year) indicates significant carbon removal efforts, likely from land use changes and forestry that act as carbon sinks.<a href="https://climatedot.org/blog/afolu-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
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
    
                // **Process Data from Sheet**
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
                    
                    // Ensure value is a string before replacing commas
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0;
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0;
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
    
                    if (!categoryData[category]) {
                        categoryData[category] = {};
                    }
    
                    if (!categoryData[category][year]) {
                        categoryData[category][year] = 0;
                    }
    
                    categoryData[category][year] += valueToUse;
                });
    
                return categoryData;
            }
    
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let categories = Object.keys(categoryData);
                let years = [...new Set(jsonData.map(row => parseInt(row[6]) || 0))].sort();
                let datasets = [];
    
                categories.forEach((category, index) => {
                    let dataPoints = years.map(year => categoryData[category][year] || 0);
                    datasets.push({
                        label: category,
                        data: dataPoints,
                        backgroundColor: getRandomColor(index),
                        borderWidth: 1
                    });
                });
    
                let ctx = document.getElementById("categoryBarChart").getContext("2d");
    
                if (chartInstance) {
                    chartInstance.destroy();
                }
    
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: datasets
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                stacked: false,
                                ticks: { font: { size: 12 }, color: "#000" },
                                title: { display: true, text: "Year", font: { size: 14 }, color: "#000" }
                            },
                            y: {
                                stacked: false,
                                beginAtZero: true,
                                ticks: { font: { size: 12 }, color: "#000", stepSize: 5000000 },
                                title: { display: true, text: "CO₂e Emissions", font: { size: 14 }, color: "#000" }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let year = tooltipItem.label;
                                        let category = tooltipItem.dataset.label;
                                        let totalValue = categoryData[category][year] || 0;
                                        return `${category} - ${year}: ${totalValue.toLocaleString()} tCO₂e`;
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
    
            function getRandomColor(index) {
                let colors = ["#9B2226", "#0A9396", "#EE9B00", "#CA6702", "#BB3E03"];
                return colors[index % colors.length];
            }
    
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
            let currentGWP = "GWP20"; // Default Selection - GWP20
            let chartInstance;
            let latestYears = {}; // Store Latest Year for Each Category
        
            function generateChartData(gwpType) {
                let categoryData = {};
                latestYears = {}; 
        
                // **Step 1: प्रत्येक टाइपचा Latest Year शोधा**
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (!latestYears[category] || year > latestYears[category]) {
                        latestYears[category] = year; // **Each category's latest year**
                    }
                });
        
                console.log("🔍 Latest Year Per Category:", latestYears);
        
                // **Step 2: Latest Year साठी टोटल किमती जमा करा (फक्त Positive Values)**
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (year !== latestYears[category]) return; // **Filter Only Latest Year Data**
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (valueToUse < 0) return; // **Negative Values Ignore करा**
        
                    if (!categoryData[category]) {
                        categoryData[category] = 0;
                    }
        
                    categoryData[category] += valueToUse;
                });
        
                console.log("📊 Category-wise Total Values (Positive Only):", categoryData);
        
                // **Step 3: Percentage काढा**
                let totalEmissions = Object.values(categoryData).reduce((sum, val) => sum + val, 0);
                let percentages = {};
                Object.keys(categoryData).forEach(category => {
                    percentages[category] = ((categoryData[category] / totalEmissions) * 100).toFixed(1); // Percentage Calculation
                });
        
                console.log("📊 Category-wise Percentages:", percentages);
        
                return { categoryData, percentages };
            }
        
            function updateChart() {
                let { categoryData, percentages } = generateChartData(currentGWP);
                let categories = Object.keys(categoryData);
                let values = Object.values(categoryData);
                let percentageLabels = categories.map((cat) => `${cat} (${percentages[cat]}%)`);
        
                let ctx = document.getElementById("sectoralPieChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: percentageLabels,
                        datasets: [{
                            data: values,
                            backgroundColor: ["#BB3E03", "#0A9396", "#769848"], // Colors for Types
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: false,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let category = tooltipItem.label.split(" (")[0];
                                        let totalValue = categoryData[category];
                                        let latestYear = latestYears[category]; // **Latest Year मिळवा**
                                        
                                        return `Category: ${category}\nLatest Year: ${latestYear}\nTotal: ${totalValue.toLocaleString()} tCO₂e`;
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
        
                // **Process Data from Sheet**
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
                    
                    // Ensure value is a string before replacing commas
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0;
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0;
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (!categoryData[category]) {
                        categoryData[category] = {};
                    }
        
                    if (!categoryData[category][year]) {
                        categoryData[category][year] = 0;
                    }
        
                    categoryData[category][year] += valueToUse;
                });
        
                return categoryData;
            }
        
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let categories = Object.keys(categoryData);
                let years = [...new Set(jsonData.map(row => parseInt(row[6]) || 0))].sort();
                let datasets = [];
        
                categories.forEach((category, index) => {
                    let dataPoints = years.map(year => categoryData[category][year] || 0);
                    datasets.push({
                        label: category,
                        data: dataPoints,
                        backgroundColor: getRandomColor(index),
                        borderColor: getRandomColor(index), // **Line color**
                        borderWidth: 2,
                        fill: false, // **Fill under the line (set to true if needed)**
                        tension: 0.2 // **Smooth Line Curve**
                    });
                });
        
                let ctx = document.getElementById("categoryLineChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy();
                }
        
                chartInstance = new Chart(ctx, {
                    type: "line", // **Changed from "bar" to "line"**
                    data: {
                        labels: years,
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
                                ticks: { font: { size: 12 }, color: "#000", stepSize: 5000000 },
                                title: { display: true, text: "CO₂e Emissions", font: { size: 14 }, color: "#000" }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let year = tooltipItem.label;
                                        let category = tooltipItem.dataset.label;
                                        let totalValue = categoryData[category][year] || 0;
                                        return `${category} - ${year}: ${totalValue.toLocaleString()} tCO₂e`;
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
        
            function getRandomColor(index) {
                let colors = ["#9B2226", "#0A9396", "#EE9B00", "#CA6702", "#BB3E03"];
                return colors[index % colors.length];
            }
        
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