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
    $range = '3C Aggregate  & Non-CO₂ Sources!A2:S';

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
  <title>Aggregate & Non-CO₂ Sources</title>
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
                <h1>Aggregate & Non-CO₂ Sources</h1>
                <p>GHG emissions except CO2  occurring from managed soils & use of fertilisers.</p>
            </div>
            <div class="level">
                <div class="lev-home">
                    <a class="gret-symbol"  href="/ipcc-categories">
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
                    <span title="Aggregate & Non-CO₂ Sources">Aggregate & Non-CO<sub>2</sub> Sources</span>
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
                Biomass burning
            </a>
            <a href="#" class="menu-item unclickable">
                Liming
            </a>
            <a href="#" class="menu-item unclickable">
                Urea Application
            </a>
            <a href="#" class="menu-item unclickable">
                Direct N2O Emissions from Managed Soils
            </a>
            <a href="#" class="menu-item unclickable">
                Indirect N2O Emissions from Managed Soil
            </a>
            <a href="#" class="menu-item unclickable">
                Indirect N2O Emissions from MMS
            </a>
            <a href="#" class="menu-item unclickable">
                Rice Cultivations
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
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Biomass burning">3C1</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Liming">3C2</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Urea Application">3C3</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Direct N2O Emissions from Managed Soils">3C4</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Indirect N2O Emissions from Managed Soil">3C5</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Indirect N2O Emissions from MMS">3C6</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Rice Cultivations">3C7</span>
                            <!--<span class="data-qua-single-box" style="background-color:#DD7E6B" title="">3C8</span>-->
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/doah.webp" title="Department of Animal Husbandry">
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
                                <h2>Emissions | Aggregate & Non- CO₂ Sources</h2>
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
                                <canvas id="indirectN2OChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Aggregate & Non- CO₂ Sources</h2>
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
                               <canvas id="directN2OChart"></canvas>
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
                <p>Aggregate Sources & Non-CO2 Emissions Sources on Land includes direct and indirect nitrous oxide (N2O) emissions from managed soils, as well as CO2 emissions due to use of fertilisers. Managed soils include all soil types which are being managed. While data is available for calculating direct N₂O emissions from managed soils and indirect N₂O emissions from manure management, activity data for the remaining sub sectors is currently unavailable.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p>The graph highlights direct and indirect nitrous oxide (N2O) emissions from managed soils and manure management system.</p>
                    <p>Due to large amount of data unavailability, the emission profile from this sector is incomplete.</p>
                    <p class="read-more-para">Activity data for liming, urea application, managed soils and rice cultivations are unavailable.<a href="https://climatedot.org/blog/afolu-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
                </div>
        </div>
    </div>
    <script>
     document.addEventListener("DOMContentLoaded", function () {
        let jsonData = <?php echo $jsonData; ?>;
        let currentGWP = "GWP20"; // Default Selection
        let chartInstance;
    
        function generateChartData(gwpType) {
            let yearWiseData = {};
    
            jsonData.forEach(row => {
                let mainCategory = row[2].trim(); // Column C (Main Category)
                let subCategory = row[4].trim(); // Column E (Sub-Type)
                let year = parseInt(row[6].trim()) || 0; // Column G (Year)
                let valueGWP20 = parseFloat(row[15]?.toString().replace(/,/g, "")) || 0; // Column P
                let valueGWP100 = parseFloat(row[16]?.toString().replace(/,/g, "")) || 0; // Column Q
                let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
    
                // ✅ फक्त "Indirect N₂O" उप-टाइपच्या डेटा वर प्रक्रिया करा
                if (mainCategory !== "Aggregate Sources and Non CO2 Emissions Sources on Land") return;
                if (subCategory !== "Indirect N₂O") return;
                if (year === 0 || isNaN(year)) return; // Invalid Year Skipping
                if (valueToUse <= 0) return; // Negative आणि Zero Values Skipping
    
                if (!yearWiseData[year]) {
                    yearWiseData[year] = 0;
                }
    
                yearWiseData[year] += valueToUse;
            });
    
            return yearWiseData;
        }
    
        function updateChart() {
            let yearWiseData = generateChartData(currentGWP);
            let years = Object.keys(yearWiseData).sort();
            let values = Object.values(yearWiseData);
    
            let ctx = document.getElementById("indirectN2OChart").getContext("2d");
    
            if (chartInstance) {
                chartInstance.destroy();
            }
    
            chartInstance = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: years,
                    datasets: [{
                        label: "Indirect N₂O Emissions",
                        data: values,
                        backgroundColor: "#0A9396",
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
                                    return value.toLocaleString();
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
                                    let totalValue = yearWiseData[year] || 0;
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
                let yearWiseData = {};
        
                jsonData.forEach(row => {
                    let mainCategory = row[2].trim(); // Column C (Main Category)
                    let subCategory = row[4].trim(); // Column E (Sub-Type)
                    let year = parseInt(row[6].trim()) || 0; // Column G (Year)
                    let valueGWP20 = parseFloat(row[15]?.toString().replace(/,/g, "")) || 0; // Column P
                    let valueGWP100 = parseFloat(row[16]?.toString().replace(/,/g, "")) || 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    // ✅ फक्त "Direct N₂O" उप-टाइपच्या डेटा वर प्रक्रिया करा
                    if (mainCategory !== "Aggregate Sources and Non CO2 Emissions Sources on Land") return;
                    if (subCategory !== "Direct N₂O") return;
                    if (year === 0 || isNaN(year)) return; // Invalid Year Skipping
                    if (valueToUse <= 0) return; // Negative आणि Zero Values Skipping
        
                    if (!yearWiseData[year]) {
                        yearWiseData[year] = 0;
                    }
        
                    yearWiseData[year] += valueToUse;
                });
        
                return yearWiseData;
            }
        
            function updateChart() {
                let yearWiseData = generateChartData(currentGWP);
                let years = Object.keys(yearWiseData).sort();
                let values = Object.values(yearWiseData);
        
                let ctx = document.getElementById("directN2OChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy();
                }
        
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [{
                            label: "Direct N₂O Emissions",
                            data: values,
                            backgroundColor: "#BB3E03",
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
                                        return value.toLocaleString();
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
                                        let totalValue = yearWiseData[year] || 0;
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