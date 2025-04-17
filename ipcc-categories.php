<?php include 'include/feb-header.php'; ?>
<?php include 'include/tree-triangle.php'; ?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Emission Category Navigation Tree</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    #toggle-btn{
        display: none;
    }
    body{
        margin: 0;
        padding: 0;
    }
    .header-logo span{
            display: block;
        }
    h1{
        text-align: center;
        font-weight: 600;
        font-family: 'Quicksand', sans-serif;
        text-align: center;
        color: white;
    }
    .banner p{
        font-size: 18px;
        font-weight: 600;
        color: white;
        font-family: 'Quicksand', sans-serif;
        text-align: center;
    }
    .banner{
        background-color: #24577B;
        padding: 10px;
    }
    .node {
            cursor: pointer;
        }
    .node rect {
        fill: #fff;
        stroke: none;
        stroke-width: 1.5px;
        rx: 5px;
        ry: 5px;
    }
    #body svg {
        margin-top: 50px; /* Move the entire diagram 50px down */
    }
    .node text {
        font: 10px sans-serif;
    }
    .link {
        fill: none;
        stroke: #ccc;
        stroke-width: 1.5px;
    }
    #body{
        overflow-x: scroll;
        padding:0 100px;
        margin:0;
    }
    .level-label{
        width: 40px; /* Circle size */
        height: 40px; /* Circle size */
        background-color: #F1C232;
    }
    .level-image:nth-child(1){
        filter: none !important;
    }
    @media (min-width: 1025px) and (max-width: 1299px) {
        h1 {
            font-size: 24px;
            line-height: 24px;
        }
    }
    @media (min-width: 1300px) and (max-width: 1366px) {
        h1 {
            font-size: 24px;
            line-height: 24px;
        }
    }
    @media (min-width: 1367px) and (max-width: 1600px) {
        h1 {
            font-size: 26px;
            line-height: 26px;
        }
    }
    @media (min-width: 1601px) and (max-width: 1920px) {
        h1 {
            font-size: 42px;
            line-height: 35px;
        }
    }
    @media (min-width: 1921px) and (max-width: 2049px) {
        h1 {
            font-size: 42px;
        }
    }
    @media (min-width: 2550px) {
        h1 {
            font-size: 42px;
        }
    }
    @media(min-width:1200px) and (max-width:1899px){
        #body svg {
            margin-top: 50px;
            width: 1700px;
        }
    }
    @media(min-width:1900px){
        #body{
            padding:0 192px;
            overflow-x: none;
        }
        #body svg {
            margin-top: 50px;
            width: 1700px;
        }
    }
    @media(max-width:767px){
        .responsive{
            width:auto;
        }
         #body svg {
            margin-top: 50px;
            width: 1700px;
        }
        h1{
            margin:0;
            font-size: 32px;
        }
        .banner{
            display: flex;
            align-items: center;
            padding-top: 0px;
        }
        #body{
            padding:0px 10px;
        }
    }
  </style>
</head>
<body>
    <div class="banner">
        <h1>Emission Category Navigation Tree</h1>
    </div>
    <div id="body"></div>
    <div class="level">
        <script>
            var margin = { top: 0, right: 70, bottom: 20, left: 70 },
                width = window.innerWidth - margin.right - margin.left,
                height = 1150 - margin.top - margin.bottom;
        
            var i = 0,
                duration = 750,
                rectW = 140,
                rectH = 70;
        
            var tree = d3.layout.tree().nodeSize([rectH + 10, rectW + 20]);
        
            var diagonal = function (d) {
                return "M" + (d.source.y + 90) + "," + d.source.x // Start with M65 instead of M0
                    + "C" + (d.source.y + 135) + "," + d.source.x
                    + " " + (d.target.y - 125) + "," + d.target.x
                    + " " + d.target.y + "," + d.target.x;
            };
        
            var svg = d3.select("#body").append("svg")
                .attr("width", width + margin.right + margin.left)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + height / 10 + ")");
        
            var root = {
                "name": "Emission Categories",
                "color": "#CA6702",
                "children": [
                    {
                        "name": "Energy",
                        "link": "/energy",
                        "color": "#E69138",
                        "children": [
                            {
                                "name": "Fuel Combustion Activities",
                                "link": "/fuel-combustion",
                                "color": "#E69138",
                                "children": [
                                    {
                                        "name": "Energy Industries",
                                        "link": "energy-industries",
                                        "color": "#93C47D",
                                        "children": [
                                            { 
                                                "name": "Electricity",
                                                "color": "#93C47D",
                                                "children": [
                                                        { "name": "Electricity generation", "color":"#93C47D"},
                                                        { "name": "Combined Heat and Power", "color":"#E06666"},
                                                        { "name": "Heat plants", "color":"#E06666"}
                                                    ]
                                            },
                                            { "name": "Petroleum Refining", "color": "#E06666" },
                                            { 
                                                "name": "Solid Fuels & Other Energy",
                                                "color": "#E06666",
                                                "children":[
                                                        { "name": "Manufacture of solid fuels", "color":"#E06666"},
                                                        { "name": "Other Energy Industries", "color":"#E06666"}
                                                    ]
                                            }
                                        ]
                                    },
                                    { 
                                        "name": "Manufacturing & Construction",
                                        "color": "#E69138",
                                        "children": [
                                                { "name": "Iron & Steel", "color":"#E06666"},
                                                { "name": "Non-Ferrous Metals", "color":"#E06666"},
                                                { "name": "Chemicals", "color":"#E06666"},
                                                { "name": "Pulp, Paper and Print", "color":"#E06666"},
                                                { "name": "Food Processing", "color":"#E06666"},
                                                { "name": "Non Metallic Minerals", "color":"#E06666"},
                                                { "name": "Transport Equipment", "color":"#E06666"},
                                                { "name": "Machinery", "color":"#E06666"},
                                                { "name": "Mining and Quarrying", "color":"#E06666"},
                                                { "name": "Wood and Wood Products", "color":"#E06666"},
                                                { "name": "Construction", "color":"#E06666"},
                                                { "name": "Textile and Leather", "color":"#E06666"},
                                                { "name": "Nonspecific industries", "color":"#E06666"}
                                            ]
                                    },
                                    { 
                                        "name": "Transport",
                                        "color": "#E69138",
                                        "children": [
                                            {
                                                "name": "Civil Aviation",
                                                "color": "#93C47D",
                                                "children": [
                                                    { "name": "International aviation", "color":"#E06666"},
                                                    { "name": "Domestic aviation", "color":"#E06666"}
                                                    ]
                                            },
                                            {
                                                "name": "Road Transport",
                                                "color": "#93C47D",
                                                "children": [
                                                    { 
                                                        "name": "Cars",
                                                        "color":"#E06666",
                                                        "children": [
                                                            { "name": "Passenger cars- 3-way catalysts", "color":"#E06666"},
                                                            { "name": "Passenger cars- 3-way catalysts", "color":"#E06666"}
                                                            ]
                                                    },
                                                    { 
                                                        "name": "Light duty trucks",
                                                        "color":"#E06666",
                                                        "children": [
                                                            { "name": "Light Duty Trucks - 3-way catalysts", "color":"#E06666"},
                                                            { "name": "Light Duty Trucks - 3-way catalysts", "color":"#E06666"}
                                                            ]
                                                    },
                                                    { "name": "Heavy-duty Trucks and Buses", "color":"#E06666"},
                                                    { "name": "Motorcycles", "color":"#E06666"},
                                                    { "name": "Evaporative Emissions", "color":"#E06666"},
                                                    { "name": "Urea-based catalysts", "color":"#E06666"}
                                                    ]
                                            },
                                            {"name": "Railways", "color":"#E69138"},
                                            {
                                                "name": "Water Borne Navigation",
                                                "color":"#E69138",
                                                "children": [
                                                    { "name": "International Water-borne", "color":"#E69138"},
                                                    { "name": "Domestic Water-borne", "color":"#E69138"}
                                                    ]
                                            },
                                            {
                                                "name": "Other Transportation",
                                                "color":"#E69138",
                                                "children": [
                                                    { "name": "Pipeline Transport", "color":"#E69138"},
                                                    { "name": "Off-Road", "color":"#E69138"}
                                                    ]
                                            }
                                            ]
                                    },
                                    { 
                                        "name": "Other Sectors",
                                        "color": "#E69138",
                                        "children": [
                                            { "name": "Commercial/ Institutional", "color":"#E69138"},
                                            { "name": "Residential", "color":"#E69138"},
                                            { 
                                                "name": "Agriculture/ Forestry/ Fishing",
                                                "color":"#E06666",
                                                "children": [
                                                    { "name": "Stationary", "color":"#E06666"},
                                                    { "name": "Off-Road Vehicles", "color":"#E06666"},
                                                    { "name": "Fishing (Mobile Combustion)", "color":"#E06666"}
                                                    ]
                                            }
                                            ]
                                    },
                                    { 
                                        "name": "Non Specified",
                                        "color": "#E06666",
                                        "children": [
                                            { "name": "Stationery", "color":"#E06666"},
                                            { 
                                                "name": "Mobile",
                                                "color":"#E06666",
                                                "children": [
                                                    { "name": "Mobile (Aviation Component)", "color":"#E06666"},
                                                    { "name": "Mobile (Water-borne Component)", "color":"#E06666"},
                                                    { "name": "Mobile (Other)", "color":"#E06666"}
                                                    ]
                                                
                                            },
                                            { "name": "Multilateral Operations", "color":"#E06666"}
                                            ]
                                    }
                                ]
                            },
                            {
                                "name": "Fugitive Emissions",
                                "color": "#E06666",
                                "children": [
                                    { 
                                        "name": "Solid Fuels",
                                        "color":"#E06666",
                                        "children": [
                                            { 
                                                "name": "Coal mining and handling",
                                                "color":"#E06666",
                                                "children": [
                                                    {
                                                        "name": "Underground mines",
                                                        "color":"#E06666",
                                                        "children": [
                                                            {"name": "Mining", "color":"#E06666"},
                                                            {"name": "Post-mining Seam Gas", "color":"#E06666"},
                                                            {"name": "Abandoned underground Mines", "color":"#E06666"},
                                                            {"name": "Flaring of drained methane", "color":"#E06666"}
                                                            ]
                                                    },
                                                    {
                                                        "name": "Surface mines",
                                                        "color":"#E06666",
                                                        "children": [
                                                            {"name": "Mining", "color":"#E06666"},
                                                            {"name": "Post-mining seam gas", "color":"#E06666"}
                                                            ]
                                                    }
                                                    ]
                                            },
                                            { "name": "Spontaneus combustion", "color":"#E06666"}
                                            ]
                                        
                                    },
                                    { 
                                        "name": "Oil & Natural Gas",
                                        "color":"#E06666",
                                        "children": [
                                            {
                                                "name": "Oil",
                                                "color":"#E06666",
                                                "children": [
                                                    {"name": "Venting", "color":"#E06666"},
                                                    {"name": "Flaring", "color":"#E06666"},
                                                    {
                                                        "name": "All other",
                                                        "color":"#E06666",
                                                        "children": [
                                                            {"name": "Exploration", "color":"#E06666"},
                                                            {"name": "Production and Upgrading", "color":"#E06666"},
                                                            {"name": "Transport", "color":"#E06666"},
                                                            {"name": "Refining", "color":"#E06666"},
                                                            {"name": "Distribution of Oil Products", "color":"#E06666"},
                                                            {"name": "Other", "color":"#E06666"}
                                                            ]
                                                    }
                                                    ]
                                            },
                                            {
                                                "name": "Natural Gas",
                                                "color":"#E06666",
                                                "children": [
                                                    {"name": "Venting", "color":"#E06666"},
                                                    {"name": "Flaring", "color":"#E06666"},
                                                    {
                                                        "name": "All other",
                                                        "color":"#E06666",
                                                        "children": [
                                                            {"name": "Exploration", "color":"#E06666"},
                                                            {"name": "Production and Upgrading", "color":"#E06666"},
                                                            {"name": "Transport", "color":"#E06666"},
                                                            {"name": "Refining", "color":"#E06666"},
                                                            {"name": "Distribution of Oil Products", "color":"#E06666"},
                                                            {"name": "Other", "color":"#E06666"}
                                                            ]
                                                    }
                                                    ]
                                            }
                                            ]
                                        
                                    },
                                    { "name": "Other Emissions from Energy", "color":"#E06666"}
                                ]
                            },
                            {
                                "name": "Carbon Dioxide Transport & Storage",
                                "color": "#E06666",
                                "children": [
                                    { 
                                        "name": "Transport of CO2",
                                        "color":"#E06666",
                                        "children": [
                                            {"name": "Pipelines", "color":"#E06666"},
                                            {"name": "Ships", "color":"#E06666"},
                                            {"name": "Others", "color":"#E06666"}
                                            ]
                                    },
                                    { 
                                        "name": "Injections and Storage",
                                        "color":"#E06666",
                                        "children": [
                                            {"name": "Injection", "color":"#E06666"},
                                            {"name": "Storage", "color":"#E06666"}
                                            ]
                                    },
                                    { "name": "Other", "color":"#E06666"}
                                ]
                            }
                        ]
                    },
                    {
                        "name": "IPPU",
                        "link": "/industrial-processes-product-use",
                        "color": "#E69138",
                        "children": [
                            {
                                "name": "Mineral Industry",
                                "link": "/mineral-industry",
                                "color": "#E69138",
                                "children": [
                                    {"name": "Cement production", "color": "#93C47D"},
                                    {"name": "Lime production", "color": "#93C47D"},
                                    {"name": "Glass production", "color": "#E06666"},
                                    {
                                        "name": "Other Uses of Carbonate",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "Ceramics", "color": "#E06666"},
                                            {"name": "Other Uses of Soda Ash", "color": "#E06666"},
                                            {"name": "Non Metallurgical Magnesia", "color": "#E06666"},
                                            {"name": "Others", "color": "#E06666"}
                                            ]
                                    },
                                    {"name": "Others", "color": "#E06666"}
                                    ]
                            },
                            {
                                "name": "Chemical Industry",
                                "link": "/chemical-industry",
                                "color": "#E69138",
                                "children": [
                                    {"name": "Ammonia Production", "color": "#E69138"},
                                    {"name": "Nitric Acid Production", "color": "#E06666"},
                                    {"name": "Adipic Acid Production", "color": "#E06666"},
                                    {"name": "Caprolactam, Glyoxal and Glyoxylic Acid", "color": "#E06666"},
                                    {"name": "Carbide Production", "color": "#E06666"},
                                    {"name": "Titanium Dioxide Production", "color": "#E06666"},
                                    {"name": "Soda Ash Production", "color": "#E06666"},
                                    {
                                        "name": "Petrochemical Production",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "Methanol", "color": "#E06666"},
                                            {"name": "Ethylene", "color": "#E06666"},
                                            {"name": "Ethylene Dichloride and Vinyl Chloride Monomer", "color": "#E06666"},
                                            {"name": "Ethylene Oxide", "color": "#E06666"},
                                            {"name": "Acrylonitrile", "color": "#E06666"},
                                            {"name": "Carbon Black", "color": "#E06666"}
                                            ]
                                    },
                                    {
                                        "name": "Fluorochemical Production",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "By-product emissions", "color": "#E06666"},
                                            {"name": "Fugitive Emissions", "color": "#E06666"}
                                            ]
                                    },
                                    {"name": "Other", "color": "#E06666"}
                                    ]
                            },
                            {
                                "name": "Metal Industry",
                                "link": "/metal-industry",
                                "color": "#E69138",
                                "children": [
                                    {"name": "Iron and Steel Production", "color": "#93C47D"},
                                    {"name": "Ferroalloys Production", "color": "#E06666"},
                                    {"name": "Aluminium production", "color": "#E69138"},
                                    {"name": "Magnesium production", "color": "#E06666"},
                                    {"name": "Lead Production", "color": "#E06666"},
                                    {"name": "Zinc Production", "color": "#E06666"},
                                    {"name": "Others", "color": "#E06666"}
                                    ]
                            },
                            {
                                "name": "Non-Energy Products from Fuels",
                                "color": "#E06666",
                                "children": [
                                    {"name": "Lubricant Use", "color": "#E06666"},
                                    {"name": "Paraffin Wax Use", "color": "#E06666"},
                                    {"name": "Solvent Use", "color": "#E06666"},
                                    {"name": "Others", "color": "#E06666"}
                                    ]
                            },
                            {
                                "name": "Electronics Industry",
                                "color": "#E06666",
                                "children": [
                                    {"name": "Integrated Circuit or Semiconductor", "color": "#E06666"},
                                    {"name": "TFT Flat Panel Display", "color": "#E06666"},
                                    {"name": "Photovoltaics", "color": "#E06666"},
                                    {"name": "Heat Transfer Fluid", "color": "#E06666"},
                                    {"name": "Others", "color": "#E06666"}
                                    ]
                                
                            },
                            {
                                "name": "Product Uses for Ozone Depleting Substitutes",
                                "color": "#E06666",
                                "children": [
                                    {
                                        "name": "Refrigeration and Air Conditioning",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "Refrigeration and Stationary Air Conditioning", "color": "#E06666"},
                                            {"name": "Mobile Air Conditioning", "color": "#E06666"}
                                            ]
                                    },
                                    {"name": "Foam Blowing Agents", "color": "#E06666"},
                                    {"name": "Fire Protection", "color": "#E06666"},
                                    {"name": "Aerosols", "color": "#E06666"},
                                    {"name": "Solvents", "color": "#E06666"},
                                    {"name": "Other Applications", "color": "#E06666"}
                                    ]
                            },
                            {
                                "name": "Other Manufacture and Use",
                                "color": "#E06666",
                                "children": [
                                    {
                                        "name": "Electrical Equipment",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "Manufacture of Electrical Equipment", "color": "#E06666"},
                                            {"name": "Use of Electrical Equipment", "color": "#E06666"},
                                            {"name": "Disposal of Electrical Equipment", "color": "#E06666"}
                                            ]
                                    },
                                    {
                                        "name": "SF6 and PFCs from Other Product Uses",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "Military Applications", "color": "#E06666"},
                                            {"name": "Accelerators", "color": "#E06666"},
                                            {"name": "Other", "color": "#E06666"}
                                            ]
                                    },
                                    {
                                        "name": "N2O from Product Uses",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "Medical Applications", "color": "#E06666"},
                                            {"name": "Propellant for pressure and aerosols", "color": "#E06666"},
                                            {"name": "Other", "color": "#E06666"}
                                            ]
                                    },
                                    {"name": "Other", "color": "#E06666"}
                                    
                                    ]
                            },
                            {
                                "name": "Other",
                                "color": "#E06666",
                                "children": [
                                    {"name": "Pulp and Paper", "color": "#E06666"},
                                    {"name": "Food and Beverages", "color": "#E06666"},
                                    {"name": "Others", "color": "#E06666"}
                                    ]
                            }
                        ]
                    }, 
                    {
                        "name": "AFOLU",
                        "link": "/agriculture-forestry-other-land-use",
                        "color": "#E69138",
                        "children": [
                            { 
                                "name": "Livestock",
                                "link": "/livestock",
                                "color": "#E69138",
                                "children": [
                                    {
                                        "name": "Enteric Fermentation",
                                        "color": "#E69138",
                                        "children": [
                                            {
                                                "name": "Cattle",
                                                "color": "#93C47D",
                                                "children": [
                                                    {"name": "Diary Cows", "color": "#E69138"},
                                                    {"name": "Other Cattle", "color": "#E69138"}
                                                    ]
                                            },
                                            {"name": "Buffalo", "color": "#93C47D"},
                                            {"name": "Sheep", "color": "#93C47D"},
                                            {"name": "Goats", "color": "#93C47D"},
                                            {"name": "Camels", "color": "#93C47D"},
                                            {"name": "Horses", "color": "#93C47D"},
                                            {"name": "Mules and Asses", "color": "#93C47D"},
                                            {"name": "Swine", "color": "#93C47D"},
                                            {"name": "Others", "color": "#93C47D"}
                                            ]
                                    },
                                    {
                                        "name": "Manure Management",
                                        "color": "#E69138",
                                        "children": [
                                            {
                                                "name": "Cattle",
                                                "color": "#93C47D",
                                                "children": [
                                                    {"name": "Diary Cows", "color": "#E69138"},
                                                    {"name": "Other Cattle", "color": "#E69138"}
                                                    ]
                                            },
                                            {"name": "Buffalo", "color": "#93C47D"},
                                            {"name": "Sheep", "color": "#93C47D"},
                                            {"name": "Goats", "color": "#93C47D"},
                                            {"name": "Camels", "color": "#93C47D"},
                                            {"name": "Horses", "color": "#93C47D"},
                                            {"name": "Mules and Asses", "color": "#93C47D"},
                                            {"name": "Swine", "color": "#93C47D"},
                                            {"name": "Others ", "color": "#93C47D"}
                                            ]
                                    }
                                    ]
                            },
                            { 
                                "name": "Land",
                                "link": "/land",
                                "color": "#E69138",
                                "children": [
                                    {
                                        "name": "Forest Land",
                                        "color": "#E69138",
                                        "children": [
                                            {"name": "Forest Land Remaining Forest Land", "color": "#93C47D"},
                                            {
                                                "name": "Land Converted to Forest Land",
                                                "color": "#E69138",
                                                "children": [
                                                    {"name": "Cropland to Forest Land", "color": "#E06666"},
                                                    {"name": "Grassland to Forest Land", "color": "#E06666"},
                                                    {"name": "Wetland to Forest Land", "color": "#E06666"},
                                                    {"name": "Setllements to Forest Land", "color": "#E06666"},
                                                    {"name": "Other Land to Forest Land", "color": "#E06666"}
                                                    ]
                                            }
                                            ]
                                    },
                                    {
                                        "name": "Cropland",
                                        "color": "#E69138",
                                        "children": [
                                            {"name": "Cropland Remaining Cropland", "color": "#93C47D"},
                                            {
                                                "name": "Land Converted to Cropland",
                                                "color": "#E69138",
                                                "children": [
                                                    {"name": "Forest Land to Cropland", "color": "#E06666"},
                                                    {"name": "Grassland to Cropland", "color": "#E06666"},
                                                    {"name": "Wetland to Cropland", "color": "#E06666"},
                                                    {"name": "Settlements to Cropland", "color": "#E06666"},
                                                    {"name": "Other Land to Cropland", "color": "#E06666"}
                                                    ]
                                            }
                                            ]
                                    },
                                    {
                                        "name": "Grassland",
                                        "color": "#E69138",
                                        "children": [
                                            {"name": "Grasslands Remaining Grasslands", "color": "#93C47D"},
                                            {
                                                "name": "Land to Grasslands",
                                                "color": "#E69138",
                                                "children": [
                                                    {"name": "Forest Land to Grassland", "color": "#E06666"},
                                                    {"name": "Cropland  to Grassland", "color": "#E06666"},
                                                    {"name": "Wetlands to Grassland", "color": "#E06666"},
                                                    {"name": "Settlement Land to Grassland", "color": "#E06666"},
                                                    {"name": "Other Land to Grassland", "color": "#E06666"}
                                                    ]
                                            }
                                            ]
                                    },
                                    {
                                        "name": "Wetland",
                                        "color": "#E69138",
                                        "children": [
                                            {
                                                "name": "Wetlands Remaining Wetlands",
                                                "color": "#93C47D",
                                                "children": [
                                                    {"name": "Peatlands Remaining Peatlands", "color": "#E06666"},
                                                    {"name": "Flooded Land Remaining Flooded Land", "color": "#E06666"}
                                                ]
                                            },
                                            {
                                                "name": "Land to Wetlands",
                                                "color": "#E69138",
                                                "children": [
                                                    {"name": "Land For Peat Extraction", "color": "#E06666"},
                                                    {"name": "Land to Flooded Land", "color": "#E06666"}
                                                    ]
                                            }
                                            ]
                                    },
                                    {
                                        "name": "Settlements",
                                        "color": "#E69138",
                                        "children": [
                                            {"name": "Settlements Remaining Settlements", "color": "#93C47D"},
                                            {
                                                "name": "Land to Settlements",
                                                "color": "#E69138",
                                                "children": [
                                                    {"name": "Forest Land to Settlements", "color": "#E06666"},
                                                    {"name": "Cropland to Settlements", "color": "#E06666"},
                                                    {"name": "Grassland to Settlements", "color": "#E06666"},
                                                    {"name": "Wetlands to Settlements", "color": "#E06666"},
                                                    {"name": "Other Land to Settlements", "color": "#E06666"}
                                                    ]
                                            }
                                            ]
                                    },
                                    {
                                        "name": "Other Land",
                                        "color": "#E69138",
                                        "children": [
                                            {"name": "Other Land Remaining Other Land", "color": "#93C47D"},
                                            {
                                                "name": "Land to Other Land",
                                                "color": "#E69138",
                                                "children": [
                                                    {"name": "Forest Land to Other Land", "color": "#E06666"},
                                                    {"name": "Cropland to Other Land", "color": "#E06666"},
                                                    {"name": "Grassland to Other Land", "color": "#E06666"},
                                                    {"name": "Wetland to Other Land", "color": "#E06666"},
                                                    {"name": "Settlements to Other Land", "color": "#E06666"}
                                                    ]
                                            }
                                            ]
                                    }
                                    ]
                            },
                            { 
                                "name": "Aggregate & Non-CO2 Sources",
                                "link": "/aggregate-non-co-2-sources",
                                "color": "#E69138",
                                "children": [
                                    {
                                        "name": "Biomass burning",
                                        "color": "#E06666",
                                        "children": [
                                            {"name": "Biomass burning in Forest Land", "color": "#E06666"},
                                            {"name": "Biomass burning in Cropland", "color": "#E06666"},
                                            {"name": "Biomass burning in Glassland", "color": "#E06666"},
                                            {"name": "Biomass burning in All Other Land", "color": "#E06666"}
                                            ]
                                    },
                                    {"name": "Liming", "color": "#E06666"},
                                    {"name": "Urea Application", "color": "#E06666"},
                                    {"name": "Direct N2O Emissions from Managed Soils", "color": "#E69138"},
                                    {"name": "Indirect N2O Emissions from Managed Soil", "color": "#E06666"},
                                    {"name": "Indirect N2O Emissions from MMS", "color": "#E69138"},
                                    {"name": "Rice Cultivations", "color": "#E06666"}
                                    ]
                            },
                            { 
                                "name": "Other",
                                "color": "#E06666",
                                "children": [
                                    {"name": "Harvest Wood Products", "color": "#E06666"},
                                    {"name": "Others", "color": "#E06666"}
                                    ]
                            }
                        ]
                    },
                    {
                        "name": "Waste",
                        "link": "/waste",
                        "color": "#E06666",
                        "children": [
                            { 
                                "name": "Solid Waste Disposal",
                                "color": "#E06666",
                                "children": [
                                    {"name": "Managed Waste Disposal Sites", "color": "#E06666"},
                                    {"name": "Unmanaged Waste Disposal Sites", "color": "#E06666"},
                                    {"name": "Uncategorized Waste Disposal Site", "color": "#E06666"}
                                    ]
                            },
                            { "name": "Biological Treatment of Solid Waste", "color": "#E06666"},
                            { 
                                "name": "Incineration & Open Burning",
                                "color": "#E06666",
                                "children": [
                                    {"name": "Waste Incineration", "color": "#E06666"},
                                    {"name": "Open Burning of Waste", "color": "#E06666"}
                                    ]
                            },
                            { 
                                "name": "Wastewater Treatment & Discharge",
                                "color": "#E06666",
                                "children": [
                                    {"name": "Domestic Wastewater Treatment", "color": "#E06666"},
                                    {"name": "Industrial Wastewater Treatment", "color": "#E06666"}
                                    ]
                            },
                            { "name": "Other", "color": "#E06666"}
                        ]
                    },
                    {
                        "name": "Other",
                        "color": "#B7B7B7",
                        "children": [
                            {"name": "Indirect emissions from Atmospheric N", "color": "#D9D9D9"},
                            {"name": "Other", "color": "#D9D9D9"}
                            ]
                    }
                ]
                
            };
        
            root.x0 = height / 2;
            root.y0 = 0;
        
            function collapse(d) {
                if (d.children) {
                    d._children = d.children;
                    d.children.forEach(collapse);
                    d.children = null;
                }
            }
        
            root.children.forEach(collapse);
            update(root);
        
            function update(source) {
                var nodes = tree.nodes(root).reverse(),
                    links = tree.links(nodes);
        
                nodes.forEach(function (d) {
                    d.y = d.depth * 250; // लेव्हलनुसार horizontal spacing
                    d.x = d.parent ? d.parent.x * 0 + (d.parent.children.indexOf(d) * 80) : 0;
                    
                });

                // Function to check if any node at a level OR its descendant nodes are open
                function isAnyNodeOpenAtLevel(level) {
                    let result = nodes.some(d => d.depth === level && hasAnyOpenDescendant(d));
                    console.log("Checking Level:", level, "Is Open:", result); // Debug log
                    return result;
                }
                
                // Function to check if any node is open at a level
                function isAnyNodeOpenAtLevel(level) {
                    return nodes.some(d => d.depth === level && d.children); 
                }
                
                // Remove old level labels
                svg.selectAll(".level-image").remove();
                
                // Add level images dynamically for all levels
                for (let level = 0; level < 7; level++) {
                    svg.append("image")
                        .attr("class", "level-image")
                        .attr("x", level * 245)  // Adjust horizontal position
                        .attr("y", -100)  // Adjust vertical position
                        .attr("width", 40)
                        .attr("height", 40)
                        .attr("xlink:href", `/images/L${level + 1}.svg`)  // Dynamic image path
                        .style("filter", function () {
                            // Always show L1.svg in normal color
                            if (level === 0) {
                                return "none";
                            } 
                            let isOpen = isAnyNodeOpenAtLevel(level - 1);
                            console.log(`Level ${level + 1}:`, isOpen ? "Normal Color" : "Grayscale"); // Debugging log
                            return isOpen ? "none" : "grayscale(100%)"; 
                        });
                }
                // Calculate dynamic height based on the x positions of nodes
                var xExtent = d3.extent(nodes, function (d) {
                    return d.x;
                });
                var dynamicHeight = Math.max(height, Math.abs(xExtent[1] - xExtent[0]) + margin.top + margin.bottom);
            
                // Update SVG height dynamically
                svg.attr("height", dynamicHeight);
        
                var node = svg.selectAll("g.node")
                    .data(nodes, function (d) {
                        return d.id || (d.id = ++i);
                    });
        
                var nodeEnter = node.enter().append("g")
                    .attr("class", "node")
                    .attr("transform", function (d) {
                        return "translate(" + source.y0 + "," + source.x0 + ")";
                    })
                    .on("click", click);
                
                // Add rectangle for the node
                nodeEnter.append("rect")
                    .attr("width", rectW + 20)
                    .attr("height", rectH)
                    .attr("x", -rectW / 2)
                    .attr("y", -rectH / 2)
                    .style("fill", function (d) {
                        return d.color || "lightsteelblue";
                    })
                    
                    
                    .on("click", function (d) {
                        if (d.link) {
                            d3.event.stopPropagation(); // Prevent toggle behavior
                            window.location.href = d.link; // Open link in a same tab
                        }
                    });
                
                    
                // Add text and functionality within the same group
                var labelGroup = nodeEnter.append("g").attr("class", "label-group");
                
                // Add multi-line text inside the labelGroup
                labelGroup.append("text")
                 .attr("text-anchor", "middle")
                 .attr("dominant-baseline", "middle") // Vertically center alignment
                 .each(function (d) {
                     let text = d.name;
                     let words = text.split(" ");
                     let maxChars = 15;
                     let lines = [];
                     let currentLine = [];
            
                     let textElement = d3.select(this);
            
                     words.forEach(function (word) {
                         let testLine = [...currentLine, word].join(" ");
                         if (testLine.length > maxChars) {
                             lines.push(currentLine.join(" "));
                             currentLine = [word];
                         } else {
                             currentLine.push(word);
                         }
                     });
                     if (currentLine.length > 0) {
                         lines.push(currentLine.join(" "));
                     }
            
                     let lineCount = lines.length;
                     let startOffset = (lineCount - 1) * -0.5; // Centering logic
            
                     lines.forEach((line, index) => {
                         textElement.append("tspan")
                             .attr("x", 0)
                             .attr("dx", function (d) {
                                    return (d.name === "Venting" || d.name === "Flaring" || d.name === "Exploration" || 
                                        d.name === "Production and Upgrading" || d.name === "Transport" || 
                                        d.name === "Refining" || d.name === "Distribution of Oil Products" || 
                                        d.name === "Other" || d.name === "Petroleum Refining" || 
                                        d.name === "Electricity generation" || d.name === "Combined Heat and Power" || 
                                        d.name === "Heat plants" || d.name === "Manufacture of solid fuels" || 
                                        d.name === "Other Energy Industries" || d.name === "Iron & Steel" || 
                                        d.name === "Non-Ferrous Metals" || d.name === "Chemicals" || 
                                        d.name === "Pulp, Paper and Print" || d.name === "Food Processing" || 
                                        d.name === "Non Metallic Minerals" || d.name === "Transport Equipment" || 
                                        d.name === "Machinery" || d.name === "Mining and Quarrying" || 
                                        d.name === "Wood and Wood Products" || d.name === "Construction" || 
                                        d.name === "Textile and Leather" || d.name === "Nonspecific industries" || 
                                        d.name === "Railways" || d.name === "International aviation" || 
                                        d.name === "Domestic aviation" || d.name === "Heavy-duty Trucks and Buses" || 
                                        d.name === "Motorcycles" || d.name === "Evaporative Emissions" || 
                                        d.name === "Urea-based catalysts" || d.name === "Passenger cars- 3-way catalysts" || 
                                        d.name === "Passenger cars- 3-way catalysts" || 
                                        d.name === "Light Duty Trucks - 3-way catalysts" || 
                                        d.name === "International Water-borne" || d.name === "Domestic Water-borne" || 
                                        d.name === "Pipeline Transport" || d.name === "Off-Road" || 
                                        d.name === "Commercial/ Institutional" || d.name === "Residential" || 
                                        d.name === "Stationary" || d.name === "Off-Road Vehicles" || 
                                        d.name === "Fishing (Mobile Combustion)" || d.name === "Stationery" || 
                                        d.name === "Multilateral Operations" || d.name === "Mobile (Aviation Component)" || 
                                        d.name === "Mobile (Water-borne Component)" || d.name === "Mobile (Other)" || 
                                        d.name === "Other Emissions from Energy" || d.name === "Spontaneus combustion" || 
                                        d.name === "Mining" || d.name === "Post-mining Seam Gas" || 
                                        d.name === "Abandoned underground Mines" || d.name === "Flaring of drained methane" || 
                                        d.name === "Mining" || d.name === "Post-mining seam gas" || 
                                        d.name === "Other Emissions from Energy" || d.name === "Pipelines" || 
                                        d.name === "Ships" || d.name === "Others" || d.name === "Injection" || 
                                        d.name === "Storage" || d.name === "Cement production" || d.name === "Lime production" || 
                                        d.name === "Glass production" || d.name === "Ceramics" || 
                                        d.name === "Other Uses of Soda Ash" || d.name === "Non Metallurgical Magnesia" || 
                                        d.name === "Ammonia Production" || d.name === "Nitric Acid Production" || 
                                        d.name === "Adipic Acid Production" || d.name === "Caprolactam, Glyoxal and Glyoxylic Acid" || 
                                        d.name === "Carbide Production" || d.name === "Titanium Dioxide Production" || 
                                        d.name === "Soda Ash Production" || d.name === "Methanol" || 
                                        d.name === "Ethylene" || d.name === "Ethylene Dichloride and Vinyl Chloride Monomer" || 
                                        d.name === "Ethylene Oxide" || d.name === "Acrylonitrile" || 
                                        d.name === "Carbon Black" || d.name === "By-product emissions" || 
                                        d.name === "Fugitive Emissions" || d.name === "Iron and Steel Production" || 
                                        d.name === "Ferroalloys Production" || d.name === "Aluminium production" || 
                                        d.name === "Magnesium production" || d.name === "Lead Production" || 
                                        d.name === "Zinc Production" || d.name === "Lubricant Use" || 
                                        d.name === "Paraffin Wax Use" || d.name === "Solvent Use" || 
                                        d.name === "Integrated Circuit or Semiconductor" || 
                                        d.name === "TFT Flat Panel Display" || d.name === "Photovoltaics" || 
                                        d.name === "Heat Transfer Fluid" || d.name === "Foam Blowing Agents" || 
                                        d.name === "Fire Protection" || d.name === "Aerosols" || 
                                        d.name === "Solvents" || d.name === "Other Applications" || 
                                        d.name === "Manufacture of Electrical Equipment" || 
                                        d.name === "Use of Electrical Equipment" || 
                                        d.name === "Disposal of Electrical Equipment" || 
                                        d.name === "Military Applications" || d.name === "Accelerators" || 
                                        d.name === "Medical Applications" || d.name === "Propellant for pressure and aerosols" || 
                                        d.name === "Pulp and Paper" || d.name === "Food and Beverages" || 
                                        d.name === "Buffalo" || d.name === "Sheep" || d.name === "Goats" || 
                                        d.name === "Camels" || d.name === "Horses" || d.name === "Mules and Asses" || 
                                        d.name === "Swine" || d.name === "Diary Cows" || d.name === "Other Cattle" || 
                                        d.name === "Forest Land Remaining Forest Land" || d.name === "Cropland to Forest Land" || 
                                        d.name === "Grassland to Forest Land" || d.name === "Wetland to Forest Land" || 
                                        d.name === "Settlements to Forest Land" || d.name === "Other Land to Forest Land" || 
                                        d.name === "Cropland Remaining Cropland" || d.name === "Forest Land to Cropland" || 
                                        d.name === "Grassland to Cropland" || d.name === "Wetland to Cropland" || 
                                        d.name === "Settlements to Cropland" || d.name === "Other Land to Cropland" || 
                                        d.name === "Grasslands Remaining Grasslands" || d.name === "Forest Land to Grassland" || 
                                        d.name === "Cropland to Grassland" || d.name === "Wetlands to Grassland" || 
                                        d.name === "Settlement Land to Grassland" || d.name === "Other Land to Grassland" || 
                                        d.name === "Peatlands Remaining Peatlands" || 
                                        d.name === "Flooded Land Remaining Flooded Land" || d.name === "Land For Peat Extraction" || 
                                        d.name === "Land to Flooded Land" || d.name === "Settlements Remaining Settlements" || 
                                        d.name === "Forest Land to Settlements" || d.name === "Cropland to Settlements" || 
                                        d.name === "Grassland to Settlements" || d.name === "Wetlands to Settlements" || 
                                        d.name === "Other Land to Settlements" || d.name === "Other Land Remaining Other Land" || 
                                        d.name === "Forest Land to Other Land" || d.name === "Cropland to Other Land" || 
                                        d.name === "Grassland to Other Land" || d.name === "Wetland to Other Land" || 
                                        d.name === "Settlements to Other Land" || d.name === "Liming" || d.name === "Urea Application" || d.name === "Direct N2O Emissions from Managed Soils" || d.name === "Indirect N2O Emissions from Managed Soil" || d.name === "Indirect N2O Emissions from MMS" || d.name === "Rice Cultivations" || d.name === "Biomass burning in Forest Land" || d.name === "Biomass burning in Cropland" || d.name === "Biomass burning in Glassland" || d.name === "Biomass burning in All OtherLand" || d.name === "Harvest Wood Product" || d.name === "Biological Treatment of Solid Waste" || d.name === "Managed Waste Disposal Sites" || d.name === "Unmanaged Waste Disposal Sites" || d.name === "Uncategorized Waste Disposal Site" || d.name === "Waste Incineration" || d.name === "Open Burning of Waste" || d.name === "Domestic Wastewater Treatment" || d.name === "Industrial Wastewater Treatment" || d.name === "Indirect emissions from Atmospheric N") ? 10 : 0;
                             })
                             .attr("dy", index === 0 ? `${startOffset}em` : "1.1em") // Dynamically adjust positioning
                             .text(line);
                     });
                 })
                 .style("fill", "white") // Text color
                 .style("text-decoration", "none") // Styling
                 .style("cursor", "pointer") // Clickable
                 .style("font-size", "14px")
                 .style("font-weight", "700") // Font weight
                 .style("font-family", "'Quicksand', sans-serif")
                 .on("click", function (d) {
                     if (d.link) {
                        window.location.href = d.link; // Open link in a same tab
                     }
                 });
        
                // Add plus/minus sign for parent nodes as an image
                labelGroup.append("image")
                    .attr("x", rectW / 2 - 10) // Adjust position
                    .attr("y", -10) // Adjust Y position
                    .attr("width", 20)  // Set width of the image
                    .attr("height", 20) // Set height of the image
                    .attr("xlink:href", function (d) {
                        // Show plus or minus image only if there are children or _children
                            if (d.children || d._children) {
                                return d._children ? "/images/plus.svg" : "/images/minus.svg";
                            } else {
                                return ""; // No image for nodes without children
                            }
                        })
                        .style("visibility", function (d) {
                            // Hide the image if there are no children or _children
                            return d.children || d._children ? "visible" : "hidden";
                        })

                    .on("click", function (d) {
                        d3.event.stopPropagation(); // Prevent link click
                        // Collapse all other nodes except the current one
                        if (d.parent) {
                            d.parent.children.forEach(function (sibling) {
                                if (sibling !== d) {
                                    collapse(sibling); // Collapse sibling nodes
                                }
                            });
                        }
                        
                        // Toggle the clicked node
                        if (d.children) {
                            d._children = d.children;
                            d.children = null;
                        } else {
                            d.children = d._children;
                            d._children = null;
                        }
                
                        update(d);
                    // Update plus/minus image dynamically after update
                    node.select("image")
                        .attr("xlink:href", function (d) {
                            return d._children ? "/images/plus.svg" : d.children ? "/images/minus.svg" : "/images/plus.svg";
                        });
                });
        
                
                var nodeUpdate = node.transition()
                    .duration(duration)
                    .attr("transform", function (d) {
                        return "translate(" + d.y + "," + d.x + ")";
                    });
        
                nodeUpdate.select("rect")
                    .style("fill", function (d) {
                        return d.color || "lightsteelblue"; // Maintain color on update
                    });
                    
                // // Update plus/minus symbol dynamically
                // node.select(".toggle-symbol")
                //     .text(function (d) { return d.children ? "/images/minus.svg" : d._children ? "/images/plus.svg" : ""; });
            
                var nodeExit = node.exit().transition()
                    .duration(duration)
                    .attr("transform", function (d) {
                        return "translate(" + source.y + "," + source.x + ")";
                    })
                    .remove();
        
                var link = svg.selectAll("path.link")
                    .data(links, function (d) {
                        return d.target.id;
                    });
        
                link.enter().insert("path", "g")
                    .attr("class", "link")
                    .attr("d", function (d) {
                        var o = { x: source.x0, y: source.y0 };
                        return diagonal({ source: o, target: o });
                    });
        
                link.transition()
                    .duration(duration)
                    .attr("d", diagonal);
        
                link.exit().transition()
                    .duration(duration)
                    .attr("d", function (d) {
                        var o = { x: source.x, y: source.y };
                        return diagonal({ source: o, target: o });
                    })
                    .remove();
        
                nodes.forEach(function (d) {
                    d.x0 = d.x;
                    d.y0 = d.y;
                });
            }
            function click(d) {
                // Collapse all open nodes except the clicked node
                if (d.parent) {
                    d.parent.children.forEach(function (sibling) {
                        if (sibling !== d) {
                            collapse(sibling); // Collapse all sibling nodes
                        }
                    });
                }
            
                // Collapse all child nodes of the root except the clicked node's direct parent
                if (d.parent && d.parent.parent) {
                    d.parent.parent.children.forEach(function (rootSibling) {
                        if (rootSibling !== d.parent) {
                            collapse(rootSibling); // Collapse all other main category nodes
                        }
                    });
                }
            
                // Toggle the clicked node
                if (d.children) {
                    d._children = d.children;
                    d.children = null;
                } else {
                    d.children = d._children;
                    d._children = null;
                }
                update(d);
            }
        
        
            
            function toggle(d) {
                if (d.children) {
                    d._children = d.children;
                    d.children = null;
                } else {
                    d.children = d._children;
                    d._children = null;
                }
            }
        
        </script>  
    </div>
</body>
</html>