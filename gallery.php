<?php
// Database configuration - USE CONSISTENT VARIABLE NAMES
$dbHost = "localhost";  
$dbUser = "root";            
$dbPass = "";          
$dbName = "Kindergarten"; 

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get filter parameters from form submission
$category = $_GET['category'] ?? 'all';
$search = $_GET['search'] ?? '';

// Build SQL query
$sql = "SELECT 
            gi.item_id,
            gi.title,
            gi.description, 
            gc.category_name, 
            GROUP_CONCAT(gt.tag_name) as tags,
            COALESCE(a.image_url, f.image_url) as image_url
        FROM gallery_items gi
        LEFT JOIN gallery_categories gc ON gi.category_id = gc.category_id
        LEFT JOIN gallery_item_tags git ON gi.item_id = git.item_id
        LEFT JOIN gallery_tags gt ON git.tag_id = gt.tag_id
        LEFT JOIN activities a ON gi.activity_id = a.activity_id
        LEFT JOIN facilities f ON gi.facility_id = f.facility_id";

$where = [];
$params = [];

if ($category !== 'all') {
    $where[] = "gc.category_name = :category";
    $params[':category'] = $category;
}

if (!empty($search)) {
    $where[] = "(gi.title LIKE :search OR gi.description LIKE :search)";
    $params[':search'] = "%$search%";
}

if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

$sql .= " GROUP BY gi.item_id ORDER BY gi.title";

// Prepare and execute query
try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $galleryItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

// Get all categories for filter dropdown
$categories = $pdo->query("SELECT * FROM gallery_categories ORDER BY category_name")->fetchAll();
?>

<!DOCTYPE php>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline'">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6  minimum-scale==0.6, maximum-scale==1.5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallery - Tongkang Pechah Kindergarten</title>
    <link href="https://fonts.cdnfonts.com/css/comic-sans-ms" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <header id="header">
        <div class="container header-container">
            <div class="logo">
                <a href="index.php" class="logo">
                    <img src="https://lh3.googleusercontent.com/d/1wy4gvCplaCmiLTpk5QK2QQbU-P4_ZD9A" alt="Tongkang Pechah Kindergarten Logo">
                    <h1>Tongkang Pechah Kindergarten</h1>
                </a>
            </div>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="facilities.php">Facilities</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="gallery.php" class="active">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <img src="https://lh3.googleusercontent.com/d/1wy4gvCplaCmiLTpk5QK2QQbU-P4_ZD9A" alt="Tongkang Pechah Kindergarten Logo">
            <h2>Our Gallery</h2>
            <p>Capturing precious moments of learning and fun at Tongkang Pechah Kindergarten</p>
            <a href="#gallery" class="btn">Explore Our Gallery</a>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id= gallery class="gallery-section">
        <div class="container">    
            <h2>Memorable Moments</h2>
            
            <div class="gallery-categories">
                <button class="active" data-filter="all">All</button>
                <button data-filter="facilities">Facilities</button>
                <button data-filter="weekly-activities">Activities</button>
                <button data-filter="annual-special-events">Annual/ Special Events</button>
            </div>

            <!-- Search box -->
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="gallerySearch" placeholder="Search photos...">
                <button id="searchButton" class="search-btn">Search</button>
            </div>
            
            <div class="gallery-grid">
                <?php if (empty($galleryItems)): ?>
                    <div class="no-results">
                        <p>No items found matching your criteria.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($galleryItems as $item): ?>
                        <?php 
                        // Convert the comma-separated tags to space-separated
                        $tags = !empty($item['tags']) ? str_replace(',', ' ', $item['tags']) : '';
                        
                        // Get the appropriate image URL
                        $imageUrl = $item['image_url'] ?? 'default-image.jpg';
                        $altText = $item['title'] ?? 'Gallery image';
                        ?>
                        <div class="gallery-item" 
                            data-category="<?= htmlspecialchars(strtolower(str_replace(' ', '-', $item['category_name']))) ?>" 
                            data-tags="<?= htmlspecialchars($tags) ?>">
                            <div class="gallery-image-container">
                                <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($altText) ?>">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="gallery-caption">
                                <h3><?= htmlspecialchars($item['title']) ?></h3>
                                <p><?= htmlspecialchars($item['description']) ?></p>  <!-- Using the original short description -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

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
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="gallery.php" class="active">Gallery</a></li>
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
