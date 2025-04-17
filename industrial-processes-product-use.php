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
    $range = '2 IPPU!A2:S';

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
  <title>Industrial Processes & Product Use (IPPU)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="/include/climatedot.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
   
    @media (min-width: 1300px) and (max-width: 1366px) {
        .gret-symbol:after {
            bottom: 17px;
        }
    }
    
  </style>
</head>
<body>
    <div class="banner">
        <div class="responsive">
            <div>
                <h1>Industrial Processes & Product Use (IPPU)</h1>
                <p>Emissions from production processes in industries such as chemical, mineral, metal, and product use of refrigerants, and electronic equipments.</p>
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
                    <span>IPPU</span>
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
            <a href="/mineral-industry" class="menu-item">
                Mineral Industry
            </a>
            <a href="/chemical-industry" class="menu-item">
                Chemical Industry
            </a>
            <a href="/metal-industry" class="menu-item">
                Metal Industry
            </a>
            <a href="#" class="menu-item unclickable">
                Non-Energy Products from Fuels
            </a>
            <a href="#" class="menu-item unclickable">
                Electronics Industry
            </a>
            <a href="#" class="menu-item unclickable">
                Product Uses for Ozone Depleting Substitutes
            </a>
            <a href="#" class="menu-item unclickable">
                Other Manufacture and Use
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
                            <img src="/images/mod-ic.svg" width="44" height="44"><h3>25%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Mineral Industry">2A</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Chemical Industry">2B</span>
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Metal Industry">2C</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Non-Energy Products from Fuels">2D</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Electronics Industry">2E</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Product Uses for Ozone Depleting Substitutes">2F</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Other Manufacture and Use">2G</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Other">2H</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/ibom.webp" title="IBOM">
                        </div>
                        <div class="source-img">
                            <img src="/images/iffco.webp" title="IFFCO">
                        </div>
                        <div class="source-img">
                            <img src="/images/gnfc.svg" title="GNFC">
                        </div>
                        <div class="source-img">
                            <img src="/images/kribhco.webp" title="KRIBHCO">
                        </div>
                        <div class="source-img">
                            <img src="/images/ghcl.webp" title="GHCL">
                        </div>
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
                                <h2>Emissions | IPPU Sector</h2>
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
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Mineral Industry</h2>
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
                               <canvas id="mineralIndustryChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Metal Industry</h2>
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
                               <canvas id="metalIndustryChart"></canvas>
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
                <p>As India's top industrial and manufacturing hubs, Gujarat’s IPPU sector is a significant contributor to the state’s emissions. While state-level data is available for the mineral and metal industries, comprehensive data for the chemical industry remains scarce. Additionally, information on manufacturing and product use in sectors such as lubricants, solvents, electronics, ozone-depleting substances, paper, pulp, and food industries remains entirely unavailable. Currently, decarbonization studies rely on production estimates to calculate baseline emissions. However, availability of this data at a granular level would significantly enhance the accuracy of a state’s emissions profile, thereby providing a strong base for decarbonization and net-zero studies.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p class="read-more-para">In 2020, our calculations estimate 83,535 Gigagrams of CO₂e emissions, the highest recorded, based solely on data from the mineral and metal sectors. This data was sourced from a government publication (Indian Minerals Book) and a repository (National Data and Analytics Platform). The mineral sector offers significant insights for the chemical industry, as nationwide production data is available per production unit.<a href="https://climatedot.org/blog/ippu-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
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
        
                // Process Data from Sheet
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let year = parseInt(row[5]) || 0; // Column F (Year)
                    
                    // Ensure value is a string before replacing commas
                    let valueGWP20 = row[10] ? parseFloat(row[10].toString().replace(/,/g, "")) || 0 : 0;
                    let valueGWP100 = row[11] ? parseFloat(row[11].toString().replace(/,/g, "")) || 0 : 0;
        
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (!categoryData[category]) {
                        categoryData[category] = {};
                    }
        
                    if (!categoryData[category][year]) {
                        categoryData[category][year] = 0;
                    }
        
                    categoryData[category][year] += valueToUse;
                });
        
                console.log("📊 Full Category Data:", categoryData);
        
                return categoryData;
            }
        
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let categories = Object.keys(categoryData);
                let years = [...new Set(jsonData.map(row => parseInt(row[5]) || 0))].sort();
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
        
                let ctx = document.getElementById("barChart").getContext("2d");
        
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
                let colors = ["#9B2226", "#0A9396"];
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
    
            function generateChartData(gwpType) {
                let categoryData = {};
    
                // Process Data from Sheet (Only "Mineral Industry" from Column C)
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let year = parseInt(row[5]) || 0; // Column F (Year)
    
                    // Filter Only "Mineral Industry"
                    if (category !== "Mineral Industry") return;
    
                    let valueGWP20 = row[10] ? parseFloat(row[10].toString().replace(/,/g, "")) || 0 : 0;
                    let valueGWP100 = row[11] ? parseFloat(row[11].toString().replace(/,/g, "")) || 0 : 0;
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
    
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
                    categoryData[year] += valueToUse;
                });
    
                console.log("📊 Mineral Industry Data:", categoryData);
                return categoryData;
            }
    
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let years = Object.keys(categoryData).sort();
                let values = Object.values(categoryData);
    
                let ctx = document.getElementById("mineralIndustryChart").getContext("2d");
    
                if (chartInstance) {
                    chartInstance.destroy();
                }
    
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [{
                            label: "Mineral Industry",
                            data: values,
                            backgroundColor: "#9B2226", // Red shade for Mineral Industry
                            borderWidth: 1
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
                                        return `Year: ${year}, Emissions: ${totalValue.toLocaleString()} tCO₂e`;
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
            let currentGWP = "GWP20"; // Default Selection - GWP20
            let chartInstance;
    
            function generateChartData(gwpType) {
                let categoryData = {};
    
                // Process Data from Sheet (Only "Metal Industry" from Column C)
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (Category)
                    let year = parseInt(row[5]) || 0; // Column F (Year)
    
                    // Filter Only "Metal Industry"
                    if (category !== "Metal Industry") return;
    
                    let valueGWP20 = row[10] ? parseFloat(row[10].toString().replace(/,/g, "")) || 0 : 0;
                    let valueGWP100 = row[11] ? parseFloat(row[11].toString().replace(/,/g, "")) || 0 : 0;
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
    
                    if (!categoryData[year]) {
                        categoryData[year] = 0;
                    }
                    categoryData[year] += valueToUse;
                });
    
                console.log("Metal Industry Data:", categoryData);
                return categoryData;
            }
    
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let years = Object.keys(categoryData).sort();
                let values = Object.values(categoryData);
    
                let ctx = document.getElementById("metalIndustryChart").getContext("2d");
    
                if (chartInstance) {
                    chartInstance.destroy();
                }
    
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [{
                            label: "Metal Industry",
                            data: values,
                            backgroundColor: "#0A9396", // Red shade for Metal Industry
                            borderWidth: 1
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
                                        return `Year: ${year}, Emissions: ${totalValue.toLocaleString()} tCO₂e`;
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