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
    $range = '1 Energy!A2:S';

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
  <title>Fuel Combustion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="/include/climatedot.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
        
        #chartLegend div {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }
        #chartLegend span {
            width: 20px;
            height: 20px;
            display: inline-block;
            margin-right: 5px;
        }
        .chart-container{
            display: flex;
            gap: 30px;
        }
        .graph-heading{
            display: flex;
            justify-content: space-between;
        }
        .page-content-1r{
            border-right: 0px solid #F5F5F5;
        }
        .page-content-1r-bottom{
            border-right: 0px solid #F5F5F5;
        }
        @media(min-width:1024px) and (max-width:1299px){
            .page-content-2r-left{
                padding-left: 0px !important;
            }
            .graph-heading{
                padding-left: 25px;
            }
           
        }
        @media(min-width:1300px) and (max-width:1366px){
            .page-content-2r-left{
                padding-left: 0px !important;
            }
            .graph-heading{
                padding-left: 25px;
            }
            .level .lev-home:nth-child(2) h6{
                margin: 0px 2px;
            }
            
        }
    
  </style>
</head>
<body>
    <div class="banner">
        <div class="responsive">
            <div>
                <h1>Fuel Combustion</h1>
                <p>Emissions from any activities that burn fuel like electricity generation, transport or manufacturing industries.</p>
            </div>
            <div class="level">
                <div class="lev-home">
                    <a class="gret-symbol" href="/ipcc-categories">
                        <img src="/images/level-tree.svg">
                        <span>Home</span>
                    </a>
                </div>
                <div class="lev-home">
                    <a class="gret-symbol" href="/energy">
                        <h6 class="level-text" style="background-color:#F8F8F8">L1</h6>
                        <span>Energy</span>
                    </a>
                </div>
                <div class="lev-home">
                    <h6 class="level-text" style="background-color:#F1C232">L2</h6>
                    <span title="Fuel Combustion">Fuel Combustion</span>
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
            <a href="/energy-industries" class="menu-item">
                Energy Industries
            </a>
            <a href="#" class="menu-item unclickable">
                Manufacturing
            </a>
            <a href="#" class="menu-item unclickable">
                Transport
            </a>
            <a href="#" class="menu-item unclickable">
                Other Sectors
            </a>
            <a href="#" class="menu-item unclickable">
                Non-specified
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
                            <span class="data-qua-single-box" style="background-color:#93C57C" title="Energy Industries">1A1</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Manufacturing & Construction">1A2</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Transport">1A3</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Other Sectors">1A4</span>
                            <span class="data-qua-single-box" style="background-color:#DD7E6B" title="Non-specified">1A5</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <img src="/images/cea.svg" width="66" height="66" title="Central Electricity Authority">
                        <img src="/images/cerc.svg" width="66" height="66" title="CERC">
                        <img src="/images/petrolium-gas.png" width="66" height="66" title="Ministry of Petroleum and Natural Gas">
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
                                <h2>Emissions | by Fuels </h2>
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
                                <canvas id="stackedBarChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Sectoral break-up</h2>
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
                                <canvas id="donutChart"></canvas>
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
                <p>Fuel combustion activities represent a substantial portion of Gujarat’s emissions, primarily driven by electricity generation, transport, and industrial processes. Data availability for coal- and gas-powered electricity generation is relatively straightforward, however decentralized energy systems face more challenges due to significant data gaps. Additionally, the absence of disaggregated fuel consumption data across key sectors—transport, electricity, and manufacturing—hampers the precision of emissions inventories. Strengthening data collection and reporting mechanisms is critical to enhancing inventory accuracy and aligning with IPCC.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p>Fuel combustion activities in Gujarat are primarily driven by coal, with electricity generation, transport, and manufacturing as the key contributors to emissions.</p>
                    <p class="read-more-para">Significant data gaps exist, particularly regarding decentralized power generation, disaggregated fuel consumption across sectors, and waterborne navigation emissions.<a href="https://climatedot.org/blog/energy-climate-dashboard" target="_blank"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
                </div>
        </div>
    </div>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let fuelTypes = new Set();
            let yearWiseData = {};
    
            // Extract unique years & fuel types
            jsonData.forEach(row => {
                let year = row[7]; // Column H (Year)
                let fuelType = row[1]; // Column B (Fuel Type)
                let ghgType = row[6]; // Column G (GHG Type)
            
                // ✅ Column M (GWP20) आणि Column O (GWP100) मधून योग्य डेटा घेणे
                let valueGWP20 = parseFloat(row[12].replace(/,/g, "")) || 0;
                let valueGWP100 = parseFloat(row[14].replace(/,/g, "")) || 0;
            
                fuelTypes.add(fuelType);
                if (!yearWiseData[year]) {
                    yearWiseData[year] = {};
                }
                if (!yearWiseData[year][fuelType]) {
                    yearWiseData[year][fuelType] = { CO2: 0, CH4: 0, N2O: 0, GWP20: 0, GWP100: 0 };
                }
            
                // Column G (GHG Type) नुसार डेटा वेगळा साठवणे
                if (ghgType === "CO2") {
                    yearWiseData[year][fuelType].CO2 += valueGWP20;
                } else if (ghgType === "CH4") {
                    yearWiseData[year][fuelType].CH4 += valueGWP20;
                } else if (ghgType === "N2O") {
                    yearWiseData[year][fuelType].N2O += valueGWP20;
                }
            
                // Final GWP20 आणि GWP100 Calculation (Column M आणि Column O वर आधारित)
                yearWiseData[year][fuelType].GWP20 += valueGWP20;
                yearWiseData[year][fuelType].GWP100 += valueGWP100;
            
                // ✅ Debugging Console मध्ये योग्य डेटा Print करणे
                // console.log("🛠 Debugging yearWiseData:", {
                //     year: year,
                //     fuelType: fuelType,
                //     ghgType: ghgType,
                //     valueGWP20: valueGWP20,
                //     valueGWP100: valueGWP100,
                //     CO2_Stored: yearWiseData[year][fuelType].CO2,
                //     CH4_Stored: yearWiseData[year][fuelType].CH4,
                //     N2O_Stored: yearWiseData[year][fuelType].N2O,
                //     GWP20_Stored: yearWiseData[year][fuelType].GWP20,
                //     GWP100_Stored: yearWiseData[year][fuelType].GWP100
                // });
            });

    
            fuelTypes = Array.from(fuelTypes); // Convert Set to Array
            let years = Object.keys(yearWiseData).sort();
    
            // Function to compute percentage distribution per year
            function computePercentage(data, gwpType) {
                return years.map(year => {
                    let total = Object.values(yearWiseData[year]).reduce((sum, fuel) => sum + fuel[gwpType], 0);
                    return fuelTypes.map(fuel => (total > 0 ? (yearWiseData[year][fuel]?.[gwpType] || 0) / total * 100 : 0));
                });
            }
        
            // Initial dataset for GWP20
            let dataset = computePercentage(yearWiseData, "GWP20");
    
            let customColors = [
                "#9B2226", "#BB3E03", "#CA6702", "#EE9B00", "#DCC279","#B39C4D", 
                "#769848", "#34623F", "#94D2BD", "#0A9396", "#005F73","#001219"
            ];
            
            let fuelTypeMapping = {
                "Liquified Petroleum Gases": "LPG",
                "Motor Spirit": "Petrol",
                "Diesel Oil": "Diesel",
                "Aviation Turbine Fuel (ATF)": "ATF",
                "Lubricants": "Lubes",
                "Kerosene": "Kerosene",
                "Fuel Oil/Furnace Oil": "Furnace Oil",
                "Pet Coke": "PetCoke",
                "Bitumen": "Bitumen",
                "Coal": "Coal"
            };
            
            let chartDatasets = fuelTypes.map((fuel, index) => ({
                label: fuelTypeMapping[fuel] || fuel,
                data: dataset.map(yearData => yearData[index]),
                backgroundColor: customColors[index % customColors.length], // 👈 **custom कलर्स वापरण्यासाठी**
                borderWidth: 1
            }));
    
            // Create Chart.js instance
            let ctx = document.getElementById("stackedBarChart").getContext("2d");
            let stackedBarChart = new Chart(ctx, {
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
                            ticks: { 
                                color: "#000",
                            },
                            title: { 
                                    display: true, 
                                    text: "Year (AY)", 
                                    font: { size: 14 }, 
                                    color: "#000" 
                                }
                        },
                        y: { 
                            stacked: true, 
                            beginAtZero: true, 
                            max: 100, 
                            ticks: { 
                                stepSize: 25,
                                callback: function(value) { return value + "%" },
                                color: "#000",
                            }, 
                            title: { 
                                display: true,
                                text: "CO₂e Emissions (%)",
                                font: { size: 14 }, 
                                color: "#000" 
                                }
                        }
                        },
                        plugins: 
                        { legend: { 
                            position: "right",
                            reverse: true,
                            labels: {
                                font: { size: 8 },
                                color: "#000000"
                            }
                        },
                        tooltip: { 
                            callbacks: {
                                label: function(tooltipItem) {
                                    let dataset = tooltipItem.dataset; 
                                    let percentageValue = dataset.data[tooltipItem.dataIndex]; // 👈 Percentage Value
                                    let year = stackedBarChart.data.labels[tooltipItem.dataIndex]; // 👈 Year मिळवा
                        
                                    // **Fuel Type Mapping Handle करणे**
                                    let originalFuelType = Object.keys(fuelTypeMapping).find(key => fuelTypeMapping[key] === dataset.label) || dataset.label;
                                    
                                    // **valueGWP20 किंवा valueGWP100 ची टोटल मिळवा**
                                    let gwpType = document.querySelector("input[name='gwp2']:checked").value;
                                    let totalCO2 = yearWiseData[year]?.[originalFuelType]?.CO2 || 0;
                                    let totalCH4 = yearWiseData[year]?.[originalFuelType]?.CH4 || 0;
                                    let totalN2O = yearWiseData[year]?.[originalFuelType]?.N2O || 0;
                        
                                    // **Final Total Calculation**
                                    let totalValue = totalCO2 + totalCH4 + totalN2O;
                        
                                    // **🔥 Number Formatting - Large Number Format टाळण्यासाठी** 
                                    let formattedTotal = totalValue.toLocaleString(undefined, { maximumFractionDigits: 6 });
                        
                                    // **Debugging Print करण्यासाठी Console मध्ये Data टाका**
                                    console.log(`Year: ${year}, Fuel: ${originalFuelType}, CO2: ${totalCO2}, CH4: ${totalCH4}, N2O: ${totalN2O}, Total: ${formattedTotal}`);
                        
                                    return `${year} - ${dataset.label}: ${percentageValue.toFixed(2)}% (Total: ${formattedTotal})`;
                                }
                            }
                        }
                    }
                }
            });
            stackedBarChart.canvas.parentNode.style.height = '230px';
    
            // Function to update chart when toggling GWP 20 / GWP 100
            function updateChart(gwpType) {
                let newDataset = computePercentage(yearWiseData, gwpType);
                stackedBarChart.data.datasets.forEach((dataset, index) => {
                    dataset.data = newDataset.map(yearData => yearData[index]);
                });
                stackedBarChart.update();
            }
    
            // Event listener for radio buttons
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
            let latestYear = Math.max(...jsonData.map(row => parseInt(row[7]) || 0));
            let colors = ["#9B2226", "#EE9B00", "#769848", "#0A9396", "#001219", "#BB3E03", "#005F73"];
            let currentGWP = "GWP20";
            let chartInstance;
        
            // ✅ Legend Name Mapping
            let categoryMapping = {
                "1A4 Other Sectors": "1A4b Residential"
            };
        
            function generateChartData(gwpType) {
                let categoryData = {};
        
                jsonData.forEach(row => {
                    let category = row[4]; // Column E
                    let ghgType = row[6]; // Column G
                    let year = parseInt(row[7]) || 0;
                    let valueGWP20 = parseFloat(row[12]) || 0; // Column M (GWP20)
                    let valueGWP100 = parseFloat(row[14]) || 0; // Column O (GWP100)
        
                    if (year === latestYear) {
                        if (!categoryData[category]) {
                            categoryData[category] = { CO2: 0, CH4: 0, N2O: 0, total: 0 };
                        }
        
                        let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                        if (ghgType === "CO2") {
                            categoryData[category].CO2 += valueToUse;
                        } else if (ghgType === "CH4") {
                            categoryData[category].CH4 += valueToUse;
                        } else if (ghgType === "N2O") {
                            categoryData[category].N2O += valueToUse;
                        }
        
                        categoryData[category].total += valueToUse;
                    }
                });
        
                return categoryData;
            }
        
            function updateChart() {
                let categoryData = generateChartData(currentGWP);
                let categories = Object.keys(categoryData);
                let values = categories.map(cat => categoryData[cat].total);
                let totalEmissions = values.reduce((sum, val) => sum + val, 0);
        
                let filteredCategories = categories.filter((cat, index) => values[index] > 0);
                let filteredValues = values.filter(val => val > 0);
                let percentages = filteredValues.map(val => ((val / totalEmissions) * 100).toFixed(1) + "%");
        
                if (filteredCategories.length === 0) {
                    console.warn("⚠ No Data Available for the Latest Year!");
                    return;
                }
        
                let updatedLabels = filteredCategories.map((cat, index) => 
                    `${categoryMapping[cat] || cat} (${percentages[index]})`
                );
        
                if (!chartInstance) {
                    let ctx = document.getElementById("donutChart").getContext("2d");
                    chartInstance = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: updatedLabels,
                            datasets: [{
                                data: filteredValues,
                                backgroundColor: colors.slice(0, filteredCategories.length),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            layout:{
                                autoPadding: false,
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function (tooltipItem) {
                                            let category = tooltipItem.label.split(" (")[0];
                                            let totalValue = categoryData[category]?.total || 0;
                                            return `${category}: ${totalValue.toLocaleString()} tCO₂e`;
                                        }
                                    }
                                },
                                legend: {
                                    position: "right",
                                    labels: {
                                        font: { size: 12 },
                                        color: "#000000"
                                    }
                                }
                            }
                        }
                    });
                    chartInstance.canvas.parentNode.style.height = '230px';
                    
                } else {
                    chartInstance.data.labels = updatedLabels;
                    chartInstance.data.datasets[0].data = filteredValues;
                    chartInstance.update();
                }
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