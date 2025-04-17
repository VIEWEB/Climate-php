document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggle-btn");

    let closeBtn = document.getElementById("tooltip-close-btn");
    if (!closeBtn) {
        closeBtn = document.createElement("div");
        closeBtn.id = "tooltip-close-btn";
        closeBtn.innerHTML = "✖ Close";
        document.body.appendChild(closeBtn);
    }

    let overlay = document.getElementById("tooltip-overlay");
    if (!overlay) {
        overlay = document.createElement("div");
        overlay.id = "tooltip-overlay";
        document.body.appendChild(overlay);
    }

    // Function to show tooltips
    function showTooltips() {
        document.querySelectorAll(".menu-item-container, .page-content-2r-bottom, .page-content-2r, .level, .banner, .data-cov, .data-qua, .data-sources-img, .page-content-1r-bottom, .read-more-para a, #tooltip-close-btn, #tooltip-overlay").forEach(el => {
            el.classList.add("show-tooltip");
        });
    }
  

    // Function to hide tooltips
    function hideTooltips() {
        document.querySelectorAll(".show-tooltip").forEach(el => el.classList.remove("show-tooltip"));
    }

    // Check if current page URL matches "/feb-how-to-use-this-dashboard"
    if (window.location.pathname === "/how-to-use-this-dashboard") {
        showTooltips(); // Show all tooltips by default
    }

    // Toggle button click event
    toggleBtn.addEventListener("click", function (event) {
        event.preventDefault();
        showTooltips();
    });

    // Close button click event
    closeBtn.addEventListener("click", function () {
        hideTooltips();
    });

    // Overlay click event
    overlay.addEventListener("click", function () {
        hideTooltips();
    });
});
