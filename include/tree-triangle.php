
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Triangle Icon - Fixed to the right and vertically centered */
        .triangle-icon {
            position: fixed;
            top: 50%;
            left: 0;
            rotate: 180deg;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 9999;  /* Ensure it's on top */
        }
        
        .triangle-icon img {
            width: 50px; /* Adjust icon size */
            height: 50px;
        }
        
        /* Initially hide the content off-screen to the right */
        /*body {*/
            transition: transform 1s ease-out; /* Transition for the page sliding effect */
        /*}*/
        
        /* Content will slide out when navigating */
        /*.slide-out {*/
            transform: translateX(100%); /* Slide the page out */
        /*}*/
    </style>
</head>

<body>
    <div class="triangle-icon">
        <a href="/" id="triangle-link">
            <img src="/images/side-icon.svg" alt="Triangle Icon">
        </a>
    </div>
    <script>
    //     document.getElementById('triangle-link').addEventListener('click', function(event) {
    //         event.preventDefault(); // Linkचा सामान्य क्रियावली अडवणारा
            
    //         // स्लाइडिंग करण्यासाठी पृष्ठ स्लाइडिंग इफेक्ट तयार करणे
    //         const currentPage = document.body;
            
    //         // स्लाइडिंग करण्यासाठी current page चा ट्रान्झिशन सेट करा
    //         currentPage.classList.add('slide-out'); // page स्लाइड होईल
            
    //         // 1 सेकंदाच्या वेळेनंतर नवीन पृष्ठ लोड करा (स्लाइड इफेक्ट पूर्ण होईल त्यानंतर)
    //         setTimeout(() => {
    //             window.location.href = this.href; 
    //         }, 500); 
    //     });

    </script>
</body>

</html>