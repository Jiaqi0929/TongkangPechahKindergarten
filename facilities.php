<?php
// Database configuration
$dbHost = "localhost";  
$dbUser = "root";            
$dbPass = "";          
$dbName = "Kindergarten"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all facilities
$sql = "SELECT * FROM facilities ORDER BY facility_id";
$result = $conn->query($sql);
?>

<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6  minimum-scale==0.6, maximum-scale==1.5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facilities - Tongkang Pechah Kindergarten</title>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="facilities.php" class="active">Facilities</a></li>
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="facilities.php" class="active">Facilities</a></li>
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
            <h2>Our World-Class Facilities</h2>
            <p>Designed to inspire learning, creativity, and growth in a safe and nurturing environment</p>
            <a href="#facilities" class="btn">Explore Our Facilities</a>
        </div>
    </section>

    <!-- Main Content -->
    <main id="facilities" class="facilities-section">
        <div class="container">
            <div class="facilities">
                <h2>Explore Our Facilities</h2>
            </div>
            
            <div class="facilities-grid">
               <?php
                if ($result->num_rows > 0) {
                    while($facility = $result->fetch_assoc()) {
                        // Get features for this facility
                        $feature_sql = "SELECT * FROM facility_features WHERE facility_id = " . $facility['facility_id'];
                        $feature_result = $conn->query($feature_sql);
                        
                        echo '<div class="facility-card">';
                        echo '  <div class="facility-image">';
                        echo '    <img src="' . $facility['image_url'] . '" alt="' . htmlspecialchars($facility['name']) . '">';
                        echo '  </div>';
                        echo '  <div class="facility-info">';
                        echo '    <h3>' . htmlspecialchars($facility['name']) . '</h3>';
                        echo '    <p>' . htmlspecialchars($facility['description']) . '</p>';
                        
                        if ($feature_result->num_rows > 0) {
                            echo '    <div class="facility-features">';
                            while($feature = $feature_result->fetch_assoc()) {
                                echo '      <span class="facility-feature"><i class="' . htmlspecialchars($feature['icon_class']) . '"></i> ' . htmlspecialchars($feature['feature_text']) . '</span>';
                            }
                            echo '    </div>';
                        }
                        
                        echo '  </div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No facilities found.</p>";
                }
                ?> 
            </div>

            <!-- Video Section -->
            <?php
            // Get the first facility to get the video URL (assuming same for all)
            $video_sql = "SELECT video_url FROM facilities LIMIT 1";
            $video_result = $conn->query($video_sql);
            if ($video_row = $video_result->fetch_assoc() && !empty($video_row['video_url'])) {
                echo '<div class="video-header">';
                echo '  <h2>Our Facilities\' Video</h2>';
                echo '</div>';
                echo '<div class="video-container">';
                echo '  <iframe src="' . htmlspecialchars($video_row['video_url']) . '" frameborder="0" allowfullscreen></iframe>';
                echo '  <p class="caption">Facilities</p>';
                echo '</div>';
            }
            ?>
            <div class="bottom_space"></div>
        </div>
    </main>

    <!-- Back Button -->
    <div class="back-button-container">
        <a href="index.php" class="back-button">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>

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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="facilities.php" class="active">Facilities</a></li>
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
</php>

<?php
$conn->close();
?>
