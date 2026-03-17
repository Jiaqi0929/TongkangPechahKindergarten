<?php
// Database configuration
$servername = "sql100.infinityfree.com"; // "localhost"
$username = "if0_39656443";              // "root"
$password = "TPKindergarten";            // ""
$dbname = "if0_39656443_Kindergarten";   // "Kindergarten"

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // connect to MySQL database
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //  throw exceptions when errors occur
    
    // Get all weekly activities
    $weeklyQuery = $conn->prepare("
        SELECT a.*, c.category_name, c.color_code 
        FROM activities a
        JOIN activity_categories c ON a.category_id = c.category_id
        JOIN activity_types t ON a.type_id = t.type_id
        WHERE t.type_name = 'Weekly'
        ORDER BY a.activity_id
    ");
    $weeklyQuery->execute(); // No parameters passed
    $weeklyActivities = $weeklyQuery->fetchAll(PDO::FETCH_ASSOC);
    
    // Get all annual/special activities
    $annualQuery = $conn->prepare("
        SELECT a.*, c.category_name, c.color_code 
        FROM activities a
        JOIN activity_categories c ON a.category_id = c.category_id
        JOIN activity_types t ON a.type_id = t.type_id
        WHERE t.type_name = 'Annual'
        ORDER BY a.activity_id
    ");
    $annualQuery->execute();
    $annualActivities = $annualQuery->fetchAll(PDO::FETCH_ASSOC);
    
    // Get schedules and features for each activity
    function getActivityDetails($conn, $activityId) {
        $details = ['schedules' => [], 'features' => []];
        
        // Get schedules
        $scheduleQuery = $conn->prepare("SELECT * FROM activity_schedule WHERE activity_id = ?");
        $scheduleQuery->execute([$activityId]);
        $details['schedules'] = $scheduleQuery->fetchAll(PDO::FETCH_ASSOC);
        
        // Get features
        $featureQuery = $conn->prepare("SELECT * FROM activity_features WHERE activity_id = ?");
        $featureQuery->execute([$activityId]); //Array of parameters passed
        $details['features'] = $featureQuery->fetchAll(PDO::FETCH_ASSOC);
        
        return $details;
    }
    
    // Get video URLs
    $weeklyVideo = $conn->query("SELECT video_url FROM activities WHERE type_id = 1 AND video_url IS NOT NULL LIMIT 1")->fetch(PDO::FETCH_ASSOC); // Fetches one video URL for weekly activities (type_id = 1) 
    $annualVideo = $conn->query("SELECT video_url FROM activities WHERE type_id = 2 AND video_url IS NOT NULL LIMIT 1")->fetch(PDO::FETCH_ASSOC); 
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage()); // Stops execution (die) and shows the error message if get error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline'">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=1.5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Activities - Tongkang Pechah Kindergarten</title>
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
                        <li><a href="facilities.php">Facilities</a></li>
                        <li><a href="activities.php" class="active">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="facilities.php">Facilities</a></li>
                    <li><a href="activities.php" class="active">Activities</a></li>
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
            <h2>Our Exciting Activities</h2>
            <p>Discover the fun and educational programs we offer to nurture your child's growth and creativity</p>
            <a href="#activity" class="btn">Explore Our Activities</a>
        </div>
    </section>

    <!-- Main Content -->
    <main id="activity" class="activity-section">
        <div class="container">
            <h2>Our Activities</h2>

            <div class="activity-categories" >
                <button class="active" data-filter="weekly-activities">Weekly Activities</button>
                <button data-filter="annual-special-events">Annual/Special Events</button>
            </div>
            
            <div class="activity-highlights">
                <!-- Retrieved from the database -->
                <?php foreach ($weeklyActivities as $activity): 
                    $details = getActivityDetails($conn, $activity['activity_id']);
                ?>
                <div class="activity-card" data-category="weekly-activities">
                    <div class="activity-image">
                        <img src="<?= htmlspecialchars($activity['image_url']) ?>" alt="<?= htmlspecialchars($activity['title']) ?>">
                    </div>
                    <div class="activity-details">
                        <!-- htmlspecialchars() prevents XSS attacks by escaping special characters -->
                        <h3><?= htmlspecialchars($activity['title']) ?></h3>
                        <p><?= htmlspecialchars($activity['description']) ?></p>
                        
                        <?php foreach ($details['schedules'] as $schedule): ?>
                            <p><i class="fas fa-calendar-alt"></i> Every <?= htmlspecialchars($schedule['day_of_week']) ?></p>
                            <p><i class="fas fa-clock"></i>
                                <?= date('g:i A', strtotime($schedule['start_time'])) ?> - 
                                <?= date('g:i A', strtotime($schedule['end_time'])) ?> <!--date('g:i A') formats as "3:30 PM" (12-hour format with AM/PM)-->
                            </p>
                        <?php endforeach; ?>
                        
                        <!-- Category tag (appears on hover) -->
                        <span class="category-tag" style="background: <?= $activity['color_code'] ?>25; color: <?= $activity['color_code'] ?>;">
                            <?= htmlspecialchars($activity['category_name']) ?> <!-- 25 means adds 25% opacity -->
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Video Section -->
            <div class="video-header" data-category="weekly-activities">
                <h2>Our Weekly Activities' Video</h2>
            </div>
            <!-- Video Container -->
            <div class="video-container" data-category="weekly-activities">
                <iframe 
                    src="<?= htmlspecialchars($weeklyVideo['video_url'] ?? '') ?>" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
                <p>Weekly Activities</p>
            </div>

            <div class="activity-highlights" style="margin-top:-2rem;">
                <?php foreach ($annualActivities as $activity): 
                    $details = getActivityDetails($conn, $activity['activity_id']);
                ?>
                <div class="activity-card" data-category="annual-special-events" style="display: none;">
                    <div class="activity-image">
                        <img src="<?= htmlspecialchars($activity['image_url']) ?>" alt="<?= htmlspecialchars($activity['title']) ?>">
                    </div>
                    <div class="activity-details">
                        <h3><?= htmlspecialchars($activity['title']) ?></h3>
                        <p><?= htmlspecialchars($activity['description']) ?></p>
                        
                        <?php foreach ($details['schedules'] as $schedule): ?>
                            <p><i class="fas fa-calendar-alt"></i>
                                <?= htmlspecialchars($schedule['month_of_year']) ?> of every year
                            </p>
                            <p><i class="fas fa-clock"></i>
                                <?= date('g:i A', strtotime($schedule['start_time'])) ?> - 
                                <?= date('g:i A', strtotime($schedule['end_time'])) ?>
                            </p>
                        <?php endforeach; ?>
                        
                        <!-- Category tag (appears on hover) -->
                        <span class="category-tag" style="background: <?= $activity['color_code'] ?>25; color: <?= $activity['color_code'] ?>;">
                            <?= htmlspecialchars($activity['category_name']) ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Video Section -->
            <div class="video-header" data-category="annual-special-events" style="display: none;">
                <h2>Our Annual/ Special Events' Video</h2>
            </div>
            <!-- Video Container -->
            <div class="video-container" data-category="annual-special-events" style="display: none;">
                <iframe 
                    src="<?= htmlspecialchars($annualVideo['video_url'] ?? '') ?>" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
                <p>Annual/ Special Events</p>
            </div>
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
                        <li><a href="facilities.php">Facilities</a></li>
                        <li><a href="activities.php" class="active">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Column 2 -->
                <div class="footer-column">
                    <h3>Contact Info</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> No.2, Jalan Kacang, Taman Anggerik,<br>Tongkang Pechah, 83010 Batu Pahat.</li>
                        <li><i class="fas fa-phone"></i> +60 11-1125 7660<br> +60 12-766 5007 </li>
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

<?php $conn = null; ?>
