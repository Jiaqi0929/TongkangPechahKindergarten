<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=1.5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tongkang Pechah Kindergarten</title>
    <link href="https://fonts.cdnfonts.com/css/comic-sans-ms" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <a href="index.php" class="logo">
                <img src="https://lh3.googleusercontent.com/d/1wy4gvCplaCmiLTpk5QK2QQbU-P4_ZD9A" alt="Tongkang Pechah Kindergarten Logo">
                <h1>Tongkang Pechah Kindergarten</h1>
            </a>
            <div class="hamburger">
                <i class="fas fa-bars"></i>
                <nav class="sidebar" id="sidebar">
                    <ul>
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="facilities.php">Facilities</a></li>
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="facilities.php">Facilities</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <img src="https://lh3.googleusercontent.com/d/1wy4gvCplaCmiLTpk5QK2QQbU-P4_ZD9A" alt="Tongkang Pechah Kindergarten Logo">
            <h2>Welcome to <br> Tongkang Pechah Kindergarten</h2>
            <p>Where young minds blossom and creativity flourishes.</p>
            <a href="#features" class="btn">Learn More</a>
        </div>
        <div class="bird-container">
            <div class="bird bird-left"></div>
            <div class="bird bird-right"></div>
        </div>
    </section>

    <!-- Features Section -->
    <main id="features" class="features-section">
        <div class="container">
            <h2>Explore Our Kindergarten</h2>
            <!-- Top Row - 3 Buttons -->
            <div class="feature-row">
                <a href="about.php" class="feature-btn">
                    <img src="https://lh3.googleusercontent.com/d/1-ivnO1dtRwkRBrcqedg3uGXRSE5xxXeA" alt="About Us">
                    <p>About Us</p>
                </a>
                
                <a href="facilities.php" class="feature-btn">
                    <img src="https://lh3.googleusercontent.com/d/1A2hN1J94EPbhTDWooVGmcrxxmPsCHKBN" alt="Facilities">
                    <p>Facilities</p>
                </a>
                
                <a href="activities.php" class="feature-btn">
                    <img src="https://lh3.googleusercontent.com/d/1pS8VTsSq2IzxfFK8A0tcqhYy6HOEafJy" alt="Activities">
                    <p>Activities</p>
                </a>
            </div>
            
            <!-- Bottom Row - 2 Buttons -->
            <div class="feature-row">
                <a href="gallery.php" class="feature-btn">
                    <img src="https://lh3.googleusercontent.com/d/1Z9RoZBQaZ5yCkQS5pmkwwBjMkyTHHdD4" alt="Gallery">
                    <p>Gallery</p>
                </a>
                
                <a href="contact.php" class="feature-btn">
                    <img src="https://lh3.googleusercontent.com/d/1kGi--IvCcPdst_xFYHFVWpHEIMTsYSBa" alt="Contact">
                    <p>Contact</p>
                </a>
            </div>
        </div>
    </main>
    <div class="feature-divider"></div>
    
    <!-- Back to Top Button -->
    <div class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <!-- Column 1 -->
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="facilities.php">Facilities</a></li>
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Column 2 -->
                <div class="footer-column">
                    <h3>Contact Info</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> No.2, Jalan Kacang, Taman Anggerik,<br>Tongkang Pechah, 83010 Batu Pahat.</li>
                        <li><i class="fas fa-phone"></i> +60 11-1125 7660 <br> +60 12-766 5007 </li>
                        <li><i class="fas fa-clock"></i> Mon-Fri: 8:00AM - 12:00PM</li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
                <div class="footer-column">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="https://www.facebook.com/tongkangpecah.tadika/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://youtube.com/@tongkangpechahkindergarten?si=8VM1YN2Lgx9zUn8T"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 1980 Tongkang Pechah Kindergarten. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    
    <script src="scripts.js"></script>
</body>
</html>
