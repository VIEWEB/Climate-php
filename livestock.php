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
  <title>Livestock</title>
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
                <h1>Livestock</h1>
                <p>Emissions from dairy and its waste products.</p>
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
                    <span>Livestock</span>
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
                Enteric Fermentation
            </a>
            <a href="#" class="menu-item unclickable">
                Manure Management
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
                            <img src="/images/mod-ic.svg" width="44" height="44"><h3>75%</h3>
                        </div>
                    </div>
                    <div class="data-qua">
                        <h2>Data Quality</h2>
                        <div class="data-qua-box">
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Enteric Fermentation">3A1</span>
                            <span class="data-qua-single-box" style="background-color:#E69138" title="Manure Management">3A2</span>
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
                                <h2>Emissions | Manure vs Enteric (Gg CO₂e)</h2>
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
                                <canvas id="livestockPieChart"></canvas>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="graph-heading">
                                <h2>Emissions | Livestock</h2>
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
                              <canvas id="livestockBarChart"></canvas>
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
                <p>Livestock activities significantly contribute to greenhouse gas emissions, mainly CH₄ from enteric fermentation and manure management. Gujarat's dairy industry, led by Indigenous breeds like Gir and Kankrej, makes Gujarat a leader in milk production.. The 2019 Livestock Census recorded 29.8 million livestock, with the sector contributing 3.35% to the state's GVA. While activity data on livestock numbers is available, additional activity data particularly in relation to manure management systems is required for accurate emission assessment.</p>
        </div>
        <div class="page-content-2r-bottom">
            <h2>Key Highlights</h2>
                <div class="key-highlight-content">
                    <p>GHG emission estimates are based on the 18th (2012) and 19th (2017) Livestock Census from the Directorate of Animal Husbandry, Gujarat.</p>
                    <p>Data for the remaining period between 2013–2016 was estimated using interpolation techniques. Post 2017, emissions data has been reported as zero due to lack of updated livestock census reports.</p>
                    <p class="read-more-para">Enteric Fermentation and Manure Management account for 54.9% and 45.1% of total GHG emissions, respectively in the Livestock sector.<a href="<a href="https://climatedot.org/blog/afolu-climate-dashboard" target="_blank">"><img src="/images/add.png" width="22px" height="22px" style="margin-bottom:-6px;padding-left:5px;"></a></p>
                </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let jsonData = <?php echo $jsonData; ?>;
            let currentGWP = "GWP20"; // Default Selection
            let chartInstance;
            let latestYears = {}; // Store Latest Year for Each Sub-category
        
            function generateChartData(gwpType) {
                let categoryData = { "Manure Management": 0, "Enteric Fermentation": 0 };
        
                // **Step 1: प्रत्येक टाइपचा Latest Year शोधा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Livestock)
                    let subCategory = row[3]; // Column D (Sub Type - Manure Management & Enteric Fermentation)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Livestock") return; // **Filter Only Livestock Data**
                    if (!["Manure Management", "Enteric Fermentation"].includes(subCategory)) return; // **Filter Only These Two Types**
        
                    if (!latestYears[subCategory] || year > latestYears[subCategory]) {
                        latestYears[subCategory] = year; // **Latest Year for Each Type**
                    }
                });
        
                console.log("🔍 Latest Year Per Sub-Category:", latestYears);
        
                // **Step 2: Latest Year साठी टोटल किमती जमा करा (फक्त पॉझिटिव्ह किमती)**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type)
                    let subCategory = row[3]; // Column D (Sub Type)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Livestock") return;
                    if (!["Manure Management", "Enteric Fermentation"].includes(subCategory)) return;
                    if (year !== latestYears[subCategory]) return; // **Filter Only Latest Year Data**
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (valueToUse < 0) return; // **Negative Values Ignore करा**
        
                    categoryData[subCategory] += valueToUse;
                });
        
                console.log("📊 Sub-Category-wise Total Values (Positive Only):", categoryData);
        
                // **Step 3: Percentage काढा**
                let totalEmissions = Object.values(categoryData).reduce((sum, val) => sum + val, 0);
                let percentages = {};
                Object.keys(categoryData).forEach(subCategory => {
                    percentages[subCategory] = ((categoryData[subCategory] / totalEmissions) * 100).toFixed(1); // Percentage Calculation
                });
        
                console.log("📊 Sub-Category-wise Percentages:", percentages);
        
                return { categoryData, percentages };
            }
        
            function updateChart() {
                let { categoryData, percentages } = generateChartData(currentGWP);
                let subCategories = Object.keys(categoryData);
                let values = Object.values(categoryData);
                let percentageLabels = subCategories.map((sub) => `${sub} (${percentages[sub]}%)`);
        
                let ctx = document.getElementById("livestockPieChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: percentageLabels,
                        datasets: [{
                            data: values,
                            backgroundColor: ["#BB3E03", "#0A9396"], // Colors for Sub-categories
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: false,  // ✅ **Animation काढले**
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        let subCategory = tooltipItem.label.split(" (")[0];
                                        let totalValue = categoryData[subCategory];
                                        let latestYear = latestYears[subCategory]; // **Latest Year मिळवा**
                                        
                                        return `Sub-Category: ${subCategory}\nLatest Year: ${latestYear}\nTotal: ${totalValue.toLocaleString()} tCO₂e`;
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
                let categoryData = { "Manure Management": {}, "Enteric Fermentation": {} };
                let yearsSet = new Set(); // Store unique years
        
                // **Step 1: प्रत्येक वर्षासाठी डेटा जमा करा**
                jsonData.forEach(row => {
                    let mainCategory = row[2]; // Column C (Main Type - Livestock)
                    let subCategory = row[3]; // Column D (Sub Type - Manure Management & Enteric Fermentation)
                    let year = parseInt(row[6]) || 0; // Column G (Year)
        
                    if (mainCategory !== "Livestock") return; // **Filter Only Livestock Data**
                    if (!["Manure Management", "Enteric Fermentation"].includes(subCategory)) return; // **Filter Only These Two Types**
                    if (year === 0) return; // Ignore invalid years
        
                    yearsSet.add(year); // Store unique years
        
                    let valueGWP20 = row[15] ? parseFloat(row[15].toString().replace(/,/g, "")) || 0 : 0; // Column P
                    let valueGWP100 = row[16] ? parseFloat(row[16].toString().replace(/,/g, "")) || 0 : 0; // Column Q
                    let valueToUse = (gwpType === "GWP20") ? valueGWP20 : valueGWP100;
        
                    if (valueToUse < 0) return; // **Negative Values Ignore करा**
        
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
                let manureValues = allYears.map(year => categoryData["Manure Management"][year] || 0);
                let entericValues = allYears.map(year => categoryData["Enteric Fermentation"][year] || 0);
        
                let ctx = document.getElementById("livestockBarChart").getContext("2d");
        
                if (chartInstance) {
                    chartInstance.destroy(); // **Destroy Previous Chart**
                }
        
                chartInstance = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: allYears,
                        datasets: [
                            {
                                label: "Manure Management",
                                data: manureValues,
                                backgroundColor: "#BB3E03", // Orange for Manure Management
                                borderWidth: 1
                            },
                            {
                                label: "Enteric Fermentation",
                                data: entericValues,
                                backgroundColor: "#0A9396", // Teal for Enteric Fermentation
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: false, // ✅ Animation Removed
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
                                position: "top",
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