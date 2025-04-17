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
    $range = '1 Energy!A2:W';

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
  <title>Energy Industries</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="/include/climatedot.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
        
       
        .graph-heading{
            display: flex;
            justify-content: space-between;
        }
        .lev-home:nth-of-type(3) a{
            width:50px !important;
        }
      
        @media (min-width: 1367px) and (max-width: 1600px){
            .lev-home:nth-of-type(3) a{
                width:43px !important;
            }
        }
        @media (min-width: 1300px) and (max-width: 1366px){
            .lev-home:nth-of-type(3) a{
                width:36px !important;
            }
            .lev-home a{
                width:36px !important;
            }
        }
        @media (min-width: 1024px) and (max-width: 1299px){
            .lev-home:nth-of-type(3) a{
                width:31px !important;
            }
        }
        @media (min-width: 2550px) {
            .lev-home:nth-of-type(3) a{
                width:68px !important;
            }
        }

        
  </style>
</head>
<body>
    <div class="banner">
        <div class="responsive">
            <div>
                <h1>Energy Industries</h1>
                <p>Emissions from fuel combustion activities such as electricity generation, transportation or commercial operations.</p>
            </div>
            <div class="level">
                <div class="lev-home">
                    <a class="level-text gret-symbol" href="/ipcc-categories">
                        <img src="/images/level-tree.svg">
                        <span>Home</span>
                    </a>
                </div>
                <div class="lev-home">
                    <a class="level-text gret-symbol" href="/energy">
                        <h6 class="level-text" style="background-color:#F8F8F8">L1</h6>
                        <span>Energy</span>
                    </a>
                </div>
                <div class="lev-home">
                    <a href="/fuel-combustion">
                    <h6 class="level-text" style="background-color:#F8F8F8">L2</h6>
                    <span title="Fuel Combustion">Fuel Combustion</span>
                    </a>
                </div>
                <div class="lev-home">
                    <h6 class="level-text" style="background-color:#F1C232">L3</h6>
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
                Electricity Generation
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
                            <img src="/images/good-ic.svg" width="44" height="44"><h3>75%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Electricity">1A1a</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Petroleum Refining">1A1b</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Solid Fuels & Other Energy">1A1c</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/cea.svg" title="Central Electricity Authority">
                        </div>
                        <div class="source-img">
                            <img src="/images/cerc.svg" title="CERC">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="page-content-2r">
            <div style="padding-left:50px;" class="page-content-2r-left">
                <div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
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
                            <div style="padding-bottom:30px;" class="chart-container">
                                <canvas id="fuelChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | State vs Private coal plants</h2>
                                
                            </div>
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
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
            <p>Gujarat's power sector is heavily reliant on fossil fuels, with coal and natural gas playing a dominant role in electricity generation. The state hosts several state and privately owned thermal power plants that cater to its residential, industrial and commercial energy demands. While Gujarat has significantly expanding its renewable energy capacity, fossil fuel-based plants continue to provide base-load power, ensuring grid stability. Data gaps, particularly regarding decentralized power generation pose challenges in accurate emissions accounting underscoring the need for more granular and transparent reporting frameworks.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
            <div class="key-highlight-content">
                <p>Significant emissions from electricity generation stem from coal fired power plants remain almost steady over time, while changes in the natural gas emissions occur pointing to a possible shift in the energy mix. </p>
                <p class="read-more-para">Privately owned power plants account for a higher proportion of the total electricity generation and consequently contribute more compared to state owned power plants.<a href="https://climatedot.org/blog/energy-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let fuelTypes = new Set();
            let yearWiseData = {};
        
            // ✅ Extract Unique Years & Filter Only "Coal", "Lignite", "Natural gas"
            jsonData.forEach(row => {
                let year = row[7]; // Column H (Year)
                let fuelType = row[1]; // Column B (Fuel Type)
                let ghgType = row[6]; // Column G (GHG Type)
        
                // ✅ Column M (GWP20) आणि Column O (GWP100) मधून योग्य डेटा घेणे
                let valueGWP20 = parseFloat(row[12].replace(/,/g, "")) || 0;
                let valueGWP100 = parseFloat(row[14].replace(/,/g, "")) || 0;
        
                // ✅ फक्त "Coal", "Lignite", "Natural gas" चे डेटा घेणे
                if (["Coal", "Lignite", "Natural gas"].includes(fuelType)) {
                    fuelTypes.add(fuelType);
        
                    if (!yearWiseData[year]) {
                        yearWiseData[year] = {};
                    }
                    if (!yearWiseData[year][fuelType]) {
                        yearWiseData[year][fuelType] = { CO2: 0, CH4: 0, N2O: 0, GWP20: 0, GWP100: 0 };
                    }
        
                    // ✅ Column G (GHG Type) नुसार डेटा वेगळा साठवणे
                    if (ghgType === "CO2") {
                        yearWiseData[year][fuelType].CO2 += valueGWP20;
                    } else if (ghgType === "CH4") {
                        yearWiseData[year][fuelType].CH4 += valueGWP20;
                    } else if (ghgType === "N2O") {
                        yearWiseData[year][fuelType].N2O += valueGWP20;
                    }
        
                    // ✅ Final GWP20 आणि GWP100 Calculation
                    yearWiseData[year][fuelType].GWP20 += valueGWP20;
                    yearWiseData[year][fuelType].GWP100 += valueGWP100;
                }
            });
        
            fuelTypes = Array.from(fuelTypes); // Convert Set to Array
            let years = Object.keys(yearWiseData).sort();
        
            // ✅ Function to compute percentage distribution per year
            function computePercentage(data, gwpType) {
                return years.map(year => {
                    let total = Object.values(yearWiseData[year]).reduce((sum, fuel) => sum + fuel[gwpType], 0);
                    return fuelTypes.map(fuel => (total > 0 ? (yearWiseData[year][fuel]?.[gwpType] || 0) / total * 100 : 0));
                });
            }
        
            // ✅ Initial dataset for GWP20
            let dataset = computePercentage(yearWiseData, "GWP20");
        
            let customColors = ["#0A9396", "#005F73","#001219"]; // Custom Colors for 3 fuels
        
            let chartDatasets = fuelTypes.map((fuel, index) => ({
                label: fuel,
                data: dataset.map(yearData => yearData[index]),
                backgroundColor: customColors[index % customColors.length],
                borderWidth: 1
            }));
        
            // ✅ Create Chart.js instance
            let ctx = document.getElementById("fuelChart").getContext("2d");
            let fuelChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: years,
                    datasets: chartDatasets
                },
                options: {
                    responsive: true, 
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: true,
                            ticks: { color: "#000" },
                            title: { display: true, text: "Year (AY)", font: { size: 14 }, color: "#000" }
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                stepSize: 25,
                                callback: function (value) { return value + "%" },
                                color: "#000"
                            },
                            title: { display: true, text: "CO₂e Emissions (%)", font: { size: 14 }, color: "#000" }
                        }
                    },
                    plugins: {
                        legend: {
                            position: "right",
                            reverse: "false",
                            labels: { font: { size: 12 }, color: "#000000" }
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    let dataset = tooltipItem.dataset;
                                    let percentageValue = dataset.data[tooltipItem.dataIndex]; // Percentage Value
                                    let year = fuelChart.data.labels[tooltipItem.dataIndex]; // Year
        
                                    let totalCO2 = yearWiseData[year]?.[dataset.label]?.CO2 || 0;
                                    let totalCH4 = yearWiseData[year]?.[dataset.label]?.CH4 || 0;
                                    let totalN2O = yearWiseData[year]?.[dataset.label]?.N2O || 0;
        
                                    let totalValue = totalCO2 + totalCH4 + totalN2O;
                                    let formattedTotal = totalValue.toLocaleString(undefined, { maximumFractionDigits: 6 });
        
                                    return `${year} - ${dataset.label}: ${percentageValue.toFixed(2)}% (Total: ${formattedTotal})`;
                                }
                            }
                        }
                    }
                }
            });
            fuelChart.canvas.parentNode.style.height = '250px';
        
            // ✅ Function to update chart when toggling GWP 20 / GWP 100
            function updateChart(gwpType) {
                let newDataset = computePercentage(yearWiseData, gwpType);
                fuelChart.data.datasets.forEach((dataset, index) => {
                    dataset.data = newDataset.map(yearData => yearData[index]);
                });
                fuelChart.update();
            }

        
            // ✅ Event listener for radio buttons
            document.querySelectorAll("input[name='gwp2']").forEach(radio => {
                radio.addEventListener("change", function () {
                    updateChart(this.value);
                });
            });
        });

    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let yearWiseData = {};
        
            // Process Data
            jsonData.forEach(row => {
                let year = row[20]; // Column U (Year)
                
                // Check if 'year' is properly extracted
                console.log(`Extracted Year: ${year}`);
        
                // Skip if year is undefined
                if (!year || year === "undefined") {
                    return;
                }
        
                // Ensure to replace commas and parse correctly
                let privateEmissions = parseFloat(row[21].replace(/,/g, '')) || 0;  // Column V (Private power plants emissions)
                let stateEmissions = parseFloat(row[22].replace(/,/g, '')) || 0;  // Column W (State owned power plants emissions)
        
                // Check parsed emissions
                console.log(`Private: ${privateEmissions}, State: ${stateEmissions}`);
        
                if (!yearWiseData[year]) {
                    yearWiseData[year] = { private: 0, state: 0 };
                }
        
                yearWiseData[year].private += privateEmissions;
                yearWiseData[year].state += stateEmissions;
            });
        
            // Log data to see if it's being processed
            console.log(yearWiseData);
        
            // Prepare chart labels and datasets
            let years = Object.keys(yearWiseData);
            let privateEmissions = years.map(year => yearWiseData[year].private);
            let stateEmissions = years.map(year => yearWiseData[year].state);
        
            // Create the chart
            let ctx = document.getElementById("barChart").getContext("2d");
        
            let chartInstance = new Chart(ctx, {
                type: "bar", // Bar chart
                data: {
                    labels: years,
                    datasets: [
                        {
                            label: "Private power plants",
                            data: privateEmissions,
                            backgroundColor: "#0A9396", // Color for Private power plants
                        },
                        {
                            label: "State Owned power plants",
                            data: stateEmissions,
                            backgroundColor: "#EE9B00", // Color for State Owned power plants
                        }
                    ]
                },
                options: {
                    responsive: true, 
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                font: { size: 12 },
                                color: "#000"
                            },
                            title: {
                                display: true,
                                text: "Year",
                                font: { size: 14 },
                                color: "#000"
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: { size: 12 },
                                color: "#000",
                                stepSize: 5000,
                                callback: function (value) {
                                    return value.toLocaleString(); // Format number with commas
                                }
                            },
                            title: {
                                display: true,
                                text: "CO₂ Emissions (Gg)",
                                font: { size: 14 },
                                color: "#000"
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    let year = tooltipItem.label;
                                    let label = tooltipItem.dataset.label;
                                    let totalValue = yearWiseData[year][label === "Private power plants" ? 'private' : 'state'] || 0;
                                    return `${label}: ${totalValue.toLocaleString()} Gg CO₂`; // Format number with commas
                                }
                            }
                        },
                        legend: {
                            position: "top",
                            labels: {
                                font: { size: 12 },
                                color: "#000000"
                            }
                        }
                    }
                }
            });
            chartInstance.canvas.parentNode.style.height = '250px';
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