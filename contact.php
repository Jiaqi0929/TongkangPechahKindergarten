<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline'">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=1.5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallery - Tongkang Pechah Kindergarten</title>
    <link href="https://fonts.cdnfonts.com/css/comic-sans-ms" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Header -->
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="facilities.php">Facilities</a></li>
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php" class="active">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="facilities.php">Facilities</a></li>
                    <li><a href="activities.php">Activities</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php" class="active">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" aria-labelledby="hero-heading">
        <div class="hero-content">
        <img src="https://lh3.googleusercontent.com/d/1wy4gvCplaCmiLTpk5QK2QQbU-P4_ZD9A" alt="Tongkang Pechah Kindergarten Logo">
        <h2>Let's Connect – <br> We'd Love to Hear From You!</h2>
        <p>Have questions about our programs, enrollment, or daily activities? Reach out—we're happy to help!</p>
        <a href="#contact" class="btn">Contact Us</a>
        </div>
    </section>

    <!-- Main Content -->
    <main id="contact" class="contact-section">
        <div class="container">
            <div class="contact-header">
                <h2>Ready to Enroll Your Child?</h2>
                <p>Discover the perfect program for your little one:</p>
            </div>

            <div class="enrollment-categories">
                <div class="category">
                    <img src="https://lh3.googleusercontent.com/d/1Gu4UCQtZ8KICOzY4Jg_JhyH0Yvq_NaHR" alt="Ages 3-4">
                    <h3>Ages 3 - 4</h3>
                    <p>Play-based learning to develop motor skills and creativity.</p>
                </div>
                <div class="category">
                    <img src="https://lh3.googleusercontent.com/d/1SIiNa6FRVhVZoPEyTgSV48f_-1Nl-I04" alt="Age 5">
                    <h3>Age 5</h3>
                    <p>Structured activities to build teamwork and early literacy.</p>
                </div>
                <div class="category">
                    <img src="https://lh3.googleusercontent.com/d/1lbFIRE5tdzW78DAuaG8OWglY4ggPRQQn" alt="Age 6">
                    <h3>Age 6</h3>
                    <p>Skill-building games and introductory STEM concepts.</p>
                </div>
            </div>

            <div class="contact-header">
                <h2>Contact Us</h2>
                <p>We'd love to hear from you!</p>
            </div>
            
            <div class="contact-methods">
                <!-- Phone -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>Monday-Friday, 7:30AM - 5:30PM</p>
                    <div class="social-contact">
                        <a href="https://wa.me/601111257660">+60 11-1125 7660</a>
                        <a href="https://wa.me/60127665007">+60 12-766 5007</a>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3>Connect With Us</h3>
                    <p>Follow our social media</p>
                    
                    <div class="social-contact">
                        <a href="https://www.facebook.com/tongkangpecah.tadika/" target="_blank" rel="noopener noreferrer" title="Facebook" aria-label="Visit our Facebook page">
                        <!-- Opens the link in a new browser tab/window, Prevents the new page from accessing the original page, Creates a tooltip,  Accessibility feature for screen readers-->
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="https://youtube.com/@tongkangpechahkindergarten?si=8VM1YN2Lgx9zUn8T" target="_blank" rel="noopener noreferrer" title="YouTube" aria-label="Visit our YouTube channel">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="contact-header">
                <h2>Welcome to Visit Our Kindergarten</h2>
                <p>We're located at:<br>
                No.2, Jalan Kacang, Taman Anggerik<br>
                Tongkang Pechah, 83010 Batu Pahat.<br> <br>
                Walk-in registrations are welcome!</p>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1752754240036!6m8!1m7!1sC1x4jJypIYlfZTMIvAKJ5Q!2m2!1d1.910912827843323!2d102.9529330795271!3f4.692337540924509!4f-13.916664275380427!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php" class="active">Contact</a></li>
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
