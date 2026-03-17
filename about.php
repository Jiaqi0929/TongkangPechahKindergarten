<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=1.5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us - Tongkang Pechah Kindergarten</title>
    <link href="https://fonts.cdnfonts.com/css/comic-sans-ms" rel="stylesheet"> <!-- Loads the Comic Sans MS font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Loads Font Awesome icon library -->
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>"> <!--Loads local CSS file -->
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <a href="index.php" class="logo">
                <img src="https://lh3.googleusercontent.com/d/1wy4gvCplaCmiLTpk5QK2QQbU-P4_ZD9A" alt="Tongkang Pechah Kindergarten Logo">
                <h1>Tongkang Pechah Kindergarten</h1>
            </a>
            <div class="hamburger"> <!-- Mobile View -->
                <i class="fas fa-bars"></i>
                <nav class="sidebar" id="sidebar">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php" class="active">About</a></li>
                        <li><a href="facilities.php">Facilities</a></li>
                        <li><a href="activities.php">Activities</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <nav id="nav"> <!-- Desktop View -->
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php" class="active">About</a></li>
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
            <h2>About Our Kindergarten</h2>
            <p>Discover our story, mission, and educational philosophy</p>
            <a href="#about" class="btn">Explore Our Story</a>
        </div>
    </section>

    <!-- Main Content -->
    <main id="about" class="about">
        <!-- About Section -->
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>Our Story</h2>
                    <p>Founded in 1980, Tongkang Pechah Kindergarten has been a cornerstone of early childhood education in our community for over 45 years. What began as a small neighborhood preschool has grown into a respected institution that has nurtured thousands of young learners.</p>
                    <p>Our founder, Mrs. Yong Ah Wan, envisioned a place where children could learn in a joyful, stimulating environment that respected their individual needs and developmental stages. Today, we continue her legacy by combining time-tested educational approaches with innovative teaching methods.</p>
                </div>
                <div class="about-image">
                    <img src="https://lh3.googleusercontent.com/d/1tMTXanK0rQf7SjDhCTYMTP570IMUjSRs" alt="Kindergarten building and playground">
                </div>
            </div>

            <div class="mission-vision">
                <!-- Mission Card -->
                <div class="mission">
                    <h2><i class="fas fa-bullseye"></i> Our Mission</h2>
                    <p>To create a safe, nurturing environment where children grow socially, emotionally, intellectually, and physically through play-based learning</p>
                </div>

                <!-- Vision Card -->
                <div class="vision">
                    <h2><i class="fas fa-eye"></i> Our Vision</h2>
                    <p>To lead in early childhood education by nurturing a love of learning, sparking curiosity, and preparing children for school and life.</p>
                </div>
            </div>
            
            <div class="philosophy-box" id="philosophy-box">
                <h2>Our Educational Philosophy</h2>
                <p>Click to learn about our approach to early childhood education</p>
                <div class="philosophy-btn" id="philosophy-btn">Show Philosophy</div>
                <div class="philosophy-content" id="philosophy-content">
                    <p class="style2">At Tongkang Pechah Kindergarten, we believe that:</p>
                        <p>• Children learn in their own special way</p>
                        <p>• Play drives all early childhood learning</p>
                        <p>• Safe spaces help young minds flourish</p>
                        <p>• Teachers and families grow together</p>
                        <p>• Make learning joyful and meaningful</p>
                        <p>• We honor every culture with respect</p>
                    <p class="style2">Our curriculum is designed to nurture the whole child - socially, emotionally, cognitively, and physically - while preparing them for the transition to primary school.</p>
                </div>
            </div>

            <!-- Organizational Structure Section -->
            <div class="org-tree">
                <h2>Our Leadership Team</h2>
                <div class="tree-level">
                    <!-- Principal -->
                        <div class="tree-node no-arrow">
                        <img src="https://lh3.googleusercontent.com/d/1kS9TQOOwYVopifrI7LAfWSq_npc5462e" alt="Principal">
                        <h4>Mrs. Yong Ah Wan</h4>
                        <p>Principal</p>
                    </div>
                </div>
                
                <div class="tree-level">
                    <!-- Assistant Principal -->
                    <div class="tree-node">
                        <img src="https://lh3.googleusercontent.com/d/1KaH_nSIR2pycbTRWx5DFcsrpNiH4aIhT" alt="Assistant Principal">
                        <h4>Mrs. Ng Siow Ling</h4>
                        <p>Assistant Principal</p>
                        <div class="tree-branch" style="width: 50%; left: 50%;"></div>
                    </div>
                </div>
                
                <div class="tree-level">
                    <!-- Teachers -->
                    <div class="tree-node">
                        <img src="https://lh3.googleusercontent.com/d/1KaH_nSIR2pycbTRWx5DFcsrpNiH4aIhT" alt="Teacher">
                        <h4>Mrs. Ng Siow Ling</h4>
                        <p>Kindergarten Teacher</p>
                    </div>
                    
                    <div class="tree-node">
                        <img src="https://lh3.googleusercontent.com/d/1rUdgMDt1orUQCnkR1vO3laCpozxGFA0k" alt="Teacher">
                        <h4>Mrs. Tan Lee Zing</h4>
                        <p>Kindergarten Teacher</p>
                    </div>
                    
                    <div class="tree-node">
                        <img src="https://lh3.googleusercontent.com/d/1GnJHoO17EXtE_WdHM-kMesgrXMdZRCrk" alt="Teacher">
                        <h4>Mrs. Lim Hui Lian</h4>
                        <p>Kindergarten Teacher</p>
                    </div>
                </div>
            </div>

            <!-- Video Award Section -->
            <div class="award-section">
                <h2>Teachers' Awards</h2>
                <p>Our Teacher Receives Outstanding Preschool Teacher Award 2024</p>
                
                <!-- Video Container -->
                <div class="video-container">
                    <iframe 
                    src="https://www.youtube.com/embed/FppkMvkDfKg?rel=0&modestbranding=1" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen> 
                    </iframe>
                    <p>Award ceremony highlights</p>
                </div>
                
                <div class="award-description">
                    <p>We are proud to share that Mrs. Ng Siow Ling and Mrs. Tan Lee Zing have been awarded the prestigious Outstanding Preschool Teacher Award 2024. This honor recognizes their unwavering dedication, passion for early childhood education, and innovative teaching approaches that have made a lasting impact on their students and the community.</p>
                </div>
            </div>

            <div class="testimonials-header">
                <h2>- What Parents Say -</h2>
            </div>
            
            <!-- Testimonials Section -->
            <div class="testimonials">
                <div class="testimonial-slider">
                    <div class="testimonial-slide active">
                        <p>"My daughter has blossomed since joining Tongkang Pechah Kindergarten. The teachers are caring and attentive, and she comes home every day excited to share what she's learned. The facilities are excellent, and I appreciate the focus on both academic and social development."</p>
                        <div class="testimonial-author">- Puan Aisyah, Parent</div>
                    </div>
                    <div class="testimonial-slide">
                        <p>"As an educator myself, I'm impressed by the quality of the program at Tongkang Pechah. The curriculum is well-balanced, incorporating play, creativity, and foundational skills. My son has developed confidence and a love for learning that I know will serve him well in the years ahead."</p>
                        <div class="testimonial-author">- Mr. Wong, Parent</div>
                    </div>
                    <div class="testimonial-slide">
                        <p>"We've had two children go through Tongkang Pechah Kindergarten, and both had wonderful experiences. The teachers truly care about each child as an individual, and the small class sizes allow for personalized attention. The school's values align with ours, and we've been very happy with our choice."</p>
                        <div class="testimonial-author">- Encik Ravi & Family</div>
                    </div>
                    <div class="testimonial-nav">
                        <div class="testimonial-arrow" id="prev-testimonial">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="testimonial-dots">
                            <div class="testimonial-dot active" data-slide="0"></div>
                            <div class="testimonial-dot" data-slide="1"></div>
                            <div class="testimonial-dot" data-slide="2"></div>
                        </div>
                        <div class="testimonial-arrow" id="next-testimonial">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
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
                        <li><a href="about.php" class="active">About</a></li>
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
