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
<?php include('include/side-arrow.php'); ?>


<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>How to use this dashboard?</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="/include/climatedot.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    
    .how-to-use-title{
        text-align: center;
        font-size: 42px;
        font-family: 'Quicksand', sans-serif;
        margin: 0;
        font-weight: 700;
    }
   .wrapper.responsive {
            display: none;
        }
   
  </style>
</head>
<body>
    <div class="how-to-use-title">
        How to use this dashboard?
    </div>
    <div class="banner">
        <div class="responsive">
            <div>
                <h1>Energy</h1>
                <p>Emissions from fuel combustion, fugitive releases, and CO₂ transport & storage.</p>
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
                    <span>Energy</span>
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
            <a href="/fuel-combustion" class="menu-item">
                Fuel Combustion
            </a>
            <a href="#" class="menu-item unclickable">
                Fugitive Emissions
            </a>
            <a href="#" class="menu-item unclickable">
                CO<sub>2</sub> Transport
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
                            <img src="/images/mod-ic.svg" width="44" height="44"><h3>30%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#E69138">1A</span>
                            <span class="data-qua-single-box" style="background-color:#E16565">1B</span>
                            <span class="data-qua-single-box" style="background-color:#E16565">1C</span>
                        </div>
                    </div>
                </div>
                <div class="page-content-1fr-left-2">
                    <h2>Data Sources</h2>
                    <div class="data-sources-img">
                        <div class="source-img">
                            <img src="/images/cea.svg">
                        </div>
                        <div class="source-img">
                            <img src="/images/cerc.svg">
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
                                <h2>Emissions | Energy sector</h2>
                                <div class="toggle-buttons">
                                    <label>
                                        <input type="radio" name="gwp1" value="GWP20" checked onclick="updateChart('GWP20')">
                                        GWP 20
                                    </label>
                                    <label>
                                        <input type="radio" name="gwp1" value="GWP100" onclick="updateChart('GWP100')">
                                        GWP 100
                                    </label>
                                </div>
                            </div>
                            <div style="padding-bottom: 30px;" class="chart-container">
                                <canvas id="energySectorChart"></canvas>
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
                <p>The energy sector, a key driver of the Gujarat’s economy, is a major source of emissions, resulting from fuel combustion activities like electricity generation and transportation, and fugitive emissions from fuel extraction and processing.</p>
                <p>Coal consumption data for Gujarat’s thermal power generation is readily available. However, similar data from decentralized plants remain largely inaccessible, complicating accurate reporting under IPCC guidelines. Additionally, the absence of reliable data from the disaggregated end use of fuel and the petroleum refining industry underscores the need to enhance data collection mechanisms to ensure a more accurate emissions inventory. </p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p>The electricity sector leads emissions with 65% of the total energy emissions, followed by transport, manufacturing, residential, and other sectors, with steady growth across all but the residential sector.</p>
                    <p>Limited data on decentralized power generation, coal use, and disaggregated fuel consumption affects the accuracy of emissions reporting.</p>
                    <p>Renewable energy policies aim to curb power sector emissions, but rising electricity and transport demand seem to offset potential gains.<a href="#"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
                </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let colors = ["#0A9396"];
            let currentGWP = "GWP20";
            let chartInstance;
        
            function generateChartData(gwpType) {
                let yearWiseData = {};
        
                jsonData.forEach(row => {
                    let category = row[2]; // Column C (1 Energy)
                    let year = parseInt(row[7]) || 0; // Column H (Year)
                    let valueGWP20 = parseFloat(row[12]) || 0; // Column M (GWP20)
                    let valueGWP100 = parseFloat(row[14]) || 0; // Column O (GWP100)
        
                    if (category === "1 Energy" && year >= 2012 && year <= 2021) {
                        if (!yearWiseData[year]) {
                            yearWiseData[year] = 0;
                        }
        
                        let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
                        yearWiseData[year] += valueToUse;
                    }
                });
        
                return yearWiseData;
            }
        
            function updateChart() {
                let yearWiseData = generateChartData(currentGWP);
                let years = Object.keys(yearWiseData);
                let values = Object.values(yearWiseData);
        
                if (years.length === 0) {
                    console.warn("⚠ No Data Available for Selected Range!");
                    return;
                }
        
                let ctx = document.getElementById("energySectorChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy();
                }
        
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: years,
                        datasets: [{
                            label: "1 Energy",
                            data: values,
                            backgroundColor: colors[0],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, // Full height मध्ये दिसण्यासाठी
                        scales: {
                            x: {
                                stacked: true,
                                ticks: { 
                                    font: { size: 12 },
                                    color: "#000"
                                    },
                                    
                                title: { display: true, text: "Year", font: { size: 14 }, color: "#000" }
                            },
                            y: {
                                stacked: true,
                                beginAtZero: true,
                                ticks: {
                                    font: { size: 12 },
                                    color: "#000",
                                    stepSize: 500
                                },
                                
                                title: { display: true, text: "CO₂e Emissions", font: { size: 12 }, color: "#000" }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let year = tooltipItem.label;
                                        let totalValue = yearWiseData[year] || 0;
                                        return `${year}: ${totalValue.toLocaleString()} tCO₂e`;
                                    }
                                }
                            },
                            legend: {
                                position: "top",
                                labels: { font: { size: 12 }, color: "#000000" }
                            }
                        },
                        onResize: function(chart) {
                            chart.options.plugins.legend.labels.font.size = getFontSize();
                            chart.update();
                        }
                    }
                });
                chartInstance.canvas.parentNode.style.height = '230px';
                
                function getFontSize() {
                    let width = window.innerWidth;
                    if (width <= 1366) {
                        return 10; // Font size for screens <= 1366px
                    } else if (width > 1366 && width <= 1600) {
                        return 12; // Font size for screens between 1367px - 1600px
                    } else {
                        return 12; // Default font size for larger screens
                    }
                }
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
                                },
                                // categoryPercentage आणि barPercentage इथे वापरा
                                categoryPercentage: 1.0,  // 90% of the space for each category
                                barPercentage: 1.0,  // 100% space used for each bar within the category
                                barThickness: 100,   
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