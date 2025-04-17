

<footer class="footer">
    <div class="footer-logo">
        <a href="home.php">
            <img src="/images/logo.webp" alt="Logo">
            <span>Climate Dot</span>
        </a>
    </div>

    <div class="footer-menu">
        <a href="our-work.php">Our Work</a>
        <a href="about-us.php">About Us</a>
    </div>
</footer>

<style>
    .footer {
        background-color: #24577B;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 100px;
        color: white;
    }

    .footer-logo img {
        width: 50px;
    }

    .footer-logo a {
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 1.5rem;
        color: white;
        font-family:'Quicksand', sans-serif;
    }
    .footer-logo span{
        font-weight:600;
    }

    .footer-menu {
        display: flex;
        gap: 2rem;
    }

    .footer-menu a {
        text-decoration: none;
        color: white;
        font-size: 16px;
        font-family:'Quicksand', sans-serif;
    }

    @media (max-width: 768px) {
        .footer {
            padding: 20px;
            justify-content: space-between; 
        }

        .footer-logo img {
            width: 30px;
        }

        .footer-logo span {
            font-size: 16px; 
            font-weight:600;
        }

        .footer-menu {
            flex-direction: row;
            gap: 1rem; 
        }
        .footer-menu a{
            font-size:12px;
        }
    }
</style>

