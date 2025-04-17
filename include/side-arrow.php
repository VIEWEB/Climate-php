
<html lang="en">
<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <style>
      .side-arrow {
          position: fixed;
          right: 0px;
          top: 50%;
          transform: translateY(-50%);
          width: 0;
          height: 0;
          border-top: 20px solid transparent;
          border-bottom: 20px solid transparent;
          border-right: 30px solid #f1f1f1;
          z-index: 10000;
          cursor: pointer;
          /*padding:10px;*/
        }
        .side-arrow:hover {
            border-left: 0px solid #005F73; /* Slightly larger triangle on hover */
        }
        
        .side-arrow .icon {
            display: block;
            position: absolute;
            top: 50%;
            left: -25px; /* Adjust as needed */
            transform: translateY(-50%);
            background-color: #F8F8F8;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            gap:10px;
        }
        
        .side-arrow .icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        .side-arrow img {
            max-width: 30px; /* इमेजला योग्य रेशोमध्ये ठेवण्यासाठी */
            height: auto;
        }
   
  </style>
</head>
<body>
    <div class="side-arrow">
      <div class="icon">
        <a href="/"><img src="/images/side-arrow-1.svg"></a>
        <!--<a href="#" id="toggle-btn">-->
        <!--    <img src="/images/side-arrow-2.svg">-->
        <!--</a>-->
        <a href="/how-to-use-this-dashboard" >
            <img src="/images/side-arrow-2.svg">
        </a>
        <a href="/ipcc-categories"><img src="/images/side-arrow-3.svg"></a>
      </div>
    </div>
  
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get current page URL
        const currentPage = window.location.pathname;

        // Select all sidebar <a> elements
        const sideLinks = document.querySelectorAll(".side-arrow .icon a");

        // Loop through each <a> and check if its href matches current page
        sideLinks.forEach(link => {
            if (link.getAttribute("href") === currentPage) {
                link.style.backgroundColor = "#F1C232"; // Set background to red
                link.style.borderRadius = "10px";  // Optional: Add rounded corners
                link.style.padding = "7px 5px 7px 7px";  // Optional: Add spacing
            }
        });

        
        // document.getElementById("toggle-btn").addEventListener("click", function () {
        //     this.style.backgroundColor = "#F1C232"; // Make it red when clicked
        //     this.style.borderRadius = "10px";
        //     this.style.padding = "7px 5px 7px 7px";
        // });
    });
</script>
</body>